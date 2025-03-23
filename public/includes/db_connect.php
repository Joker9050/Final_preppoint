<?php
// Database configuration
$host = 'localhost'; 
$dbName = 'preppoint'; 
$username = 'root'; 
$password = ''; 

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
