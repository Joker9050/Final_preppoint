<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/css/admin_dashboard.css" />
    </head>

    <body>
        <div class="dashboard-container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="logo">
                    <h2>PrepPoint</h2>
                </div>
                <ul class="menu">
                    <li><a href="#dashboard">Dashboard</a></li>
                    <li><a href="#fields">Manage Fields</a></li>
                    <li><a href="#programming">Programming Subjects</a></li>
                    <li><a href="#core-subjects">Core Subjects</a></li>
                    <li><a href="#mcqs">Manage MCQs</a></li>
                    <li><a href="#reports">Reports</a></li>
                    <li><a href="#settings">Settings</a></li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <header class="header">
                    <h1>Welcome, Admin</h1>
                    <div class="profile-menu">
                        <img src="../assets/images/profile-icon.png" alt="Profile" class="profile-icon" id="profile-icon" />
                        <div class="dropdown-menu" id="dropdown-menu">
                            <a href="#settings" class="menu-item">Settings</a>
                            <a href="#logout" class="menu-item logout-btn">Logout</a>
                        </div>
                    </div>
                </header>
                <section class="content">
                    <h2>Dashboard Overview</h2>
                    <p>Use the sidebar to navigate through admin functionalities.</p>
                </section>
            </main>
        </div>
    </body>
</html>
