<?php
// User-provided plain text password
// $plainPassword = "preppoint@123";
$plainPassword = "user@123";   //$2y$10$E.n1hKEB5uf5T7IyYxuWJ.FtDDYOUbrTIZxB/RlPpgf7pdkmMV5dG


// Hash the password using the default algorithm (bcrypt)
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Output the hashed password
echo $hashedPassword;
?>
