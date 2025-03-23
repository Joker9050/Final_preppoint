<?php
session_start();

// If admin is already logged in, redirect to the dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin_login.css">
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>

        <!-- Updated form: Removed 'action' -->
        <form id="admin-login-form">
            <!-- Phone Number -->
            <div class="form-group">
                <input type="text" id="phone" name="phone" placeholder="Phone Number" maxlength="10" required>
            </div>

            <!-- Password -->
            <div class="form-group password-container">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i id="toggle-password" class="toggle-password">👁</i>
            </div>

            <!-- Submit Button -->
            <button type="button" id="login-button">Login</button>

            <!-- Error message placeholder -->
            <div id="error-message" style="color: red; margin-top: 10px; display: none;"></div>
        </form>
    </div>

    <script src="../assets/js/admin_script.js"></script>
</body>

</html>
