<?php
header("Content-Type: application/json");

session_start();
include '../includes/db_connect.php';

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get raw POST data (JSON)
    $input_data = json_decode(file_get_contents('php://input'), true);

    // Check if phone and password are provided
    if (isset($input_data['phone']) && isset($input_data['password'])) {
        $phone = $input_data['phone'];
        $password = $input_data['password'];

        // Check if the phone exists in the database
        $stmt = $conn->prepare("SELECT id, password, role FROM admins WHERE phone = ?");
        $stmt->bind_param("s", $phone);
        $stmt->execute(); 
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Check if the password matches
            if (password_verify($password, $row['password'])) {
                // Set session and return success response
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_role'] = $row['role'];

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'data' => [
                        'admin_id' => $row['id'],
                        'role' => $row['role']
                    ]
                ]);
            } else {
                // Invalid password
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid password'
                ]);
            }
        } else {
            // Invalid phone number
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid phone number'
            ]);
        }

        $stmt->close();
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Phone and password are required'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}

$conn->close();
?>
