<?php
// Set the response headers
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Allow-Origin: *");
session_start();
// Include database connection file
// require_once '../db_connect.php';
include '../includes/db_connect.php';

// Initialize the response array
$response = [
    "success" => false,
    "message" => "Invalid request",
    "duplicate" => 0  // 0 = no duplicate entry of phone or email 
];

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input from the request body
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if 'email' or 'phone' fields are provided
    if (isset($input['email']) || isset($input['phone'])) {
        // Prepare the SQL queries for email and phone
        $queries = [
            'email' => "SELECT id FROM users WHERE email = ?",
            'phone' => "SELECT id FROM users WHERE phone = ?"
        ];

        // Loop through each provided field (email or phone)
        foreach (['email', 'phone'] as $field) {
            if (isset($input[$field])) {
                $value = trim($input[$field]);
                $stmt = $conn->prepare($queries[$field]);
                $stmt->bind_param("s", $value);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    // Set response for duplicate field
                    $response['duplicate'] = $field;
                    $response['message'] = ucfirst($field) . " is already registered.";
                    echo json_encode($response);
                    $stmt->close();
                    $conn->close();
                    exit;
                }
                $stmt->close();
            }
        }

        // If no duplicates found, return success response
        $response['success'] = true;
        $response['message'] = "No duplicates found.";
    } else {
        $response['message'] = "Please provide at least an email or phone for validation.";
    }
} else {
    $response['message'] = "Invalid request method. Only POST is allowed.";
}

// Send the response as JSON
echo json_encode($response);

// Close the database connection
$conn->close();
?>
