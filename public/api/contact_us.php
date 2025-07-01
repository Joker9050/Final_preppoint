<?php

header('Content-Type: application/json');

require_once '../includes/base_api.php';
// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}



// Helper function to sanitize input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Validate and sanitize inputs
$full_name = isset($_POST['name']) ? sanitize($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$phone = isset($_POST['phone']) ? sanitize($_POST['phone']) : '';
$interest = isset($_POST['interest']) ? sanitize($_POST['interest']) : '';
$message = isset($_POST['message']) ? sanitize($_POST['message']) : '';
$consent = isset($_POST['consent']) ? filter_var($_POST['consent'], FILTER_VALIDATE_BOOLEAN) : false;
$honeypot = isset($_POST['honeypot']) ? sanitize($_POST['honeypot']) : '';

// Basic validation
$errors = [];

if (empty($full_name)) {
    $errors[] = 'Full Name is required';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Valid Email is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

if (!$consent) {
    $errors[] = 'Consent is required';
}

if (!empty($honeypot)) {
    // Bot detected
    error_log("Bot detected: " . $_SERVER['REMOTE_ADDR']);
    http_response_code(400);
    echo json_encode(['error' => 'Bot detected']);
    exit;
}

// Validate interest values according to frontend options
$valid_interests = ['general', 'website_bug', 'business_partnership', 'other'];
if (!in_array($interest, $valid_interests)) {
    $errors[] = 'Invalid interest selected';
}

// File validation
$fileErrors = [];
$fileInfo = [];

if (isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
    // File was uploaded - validate it
    $file = $_FILES['file'];
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $fileErrors[] = 'File upload error: ' . $file['error'];
    }
    
    // Validate file size (max 5MB)
    $maxFileSize = 5 * 1024 * 1024; // 5MB
    if ($file['size'] > $maxFileSize) {
        $fileErrors[] = 'File size exceeds 5MB limit';
    }
    
    // Validate file type
    $allowedTypes = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'application/pdf' => 'pdf',
        'application/msword' => 'doc',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx'
    ];
    
    $fileType = mime_content_type($file['tmp_name']);
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    
    if (!array_key_exists($fileType, $allowedTypes)) {
        $fileErrors[] = 'Invalid file type. Allowed types: jpg, png, pdf, doc, docx';
    } elseif ($allowedTypes[$fileType] !== strtolower($fileExtension)) {
        $fileErrors[] = 'File extension does not match actual file type';
    }
    
    if (empty($fileErrors)) {
        $fileInfo = [
            'tmp_name' => $file['tmp_name'],
            'name' => $file['name'],
            'size' => $file['size'],
            'type' => $fileType,
            'extension' => $allowedTypes[$fileType]
        ];
    }
}

// Combine all errors
if (!empty($errors) || !empty($fileErrors)) {
    http_response_code(400);
    $allErrors = array_merge($errors, $fileErrors);
    echo json_encode(['errors' => $allErrors]);
    exit;
}

// Get client IP address
$ip_address = $_SERVER['REMOTE_ADDR'] ?? '';

// Insert into contact_submissions
try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("INSERT INTO contact_submissions (full_name, email, phone, interest, message, consent, honeypot, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$full_name, $email, $phone, $interest, $message, $consent, $honeypot, $ip_address]);
    $submission_id = $pdo->lastInsertId();

    // Handle file upload if exists
    if (!empty($fileInfo)) {
        $uploadDir = __DIR__ . '/../uploads/contact_files/';
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                throw new Exception('Failed to create upload directory');
            }
        }

        // Generate unique filename
        $fileNameClean = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $fileInfo['name']);
        $uniqueName = $submission_id . '_' . time() . '_' . $fileNameClean;
        $destPath = $uploadDir . $uniqueName;

        if (move_uploaded_file($fileInfo['tmp_name'], $destPath)) {
            // Store relative path for better portability
            $relativePath = '/uploads/contact_files/' . $uniqueName;
            
            $stmtFile = $pdo->prepare("INSERT INTO submission_files (submission_id, file_name, file_path, file_type, file_size) VALUES (?, ?, ?, ?, ?)");
            $stmtFile->execute([$submission_id, $fileNameClean, $relativePath, $fileInfo['type'], $fileInfo['size']]);
        } else {
            // File upload failed, but submission succeeded
            error_log("File upload failed for submission: $submission_id");
            $pdo->commit();
            http_response_code(200);
            echo json_encode(['warning' => 'Message submitted but file upload failed']);
            exit;
        }
    }

    $pdo->commit();
    http_response_code(200);
    echo json_encode(['message' => 'Message submitted successfully']);
} catch (Exception $e) {
    $pdo->rollBack();
    // Log detailed error for debugging
    error_log('Database error: ' . $e->getMessage());
    // Return generic error to client
    http_response_code(500);
    echo json_encode(['error' => 'Server error occurred. Please try again later.']);
}
?>