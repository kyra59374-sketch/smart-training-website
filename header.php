<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Training Institute</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">Smart Training Institute</div>
        <button class="menu-btn" onclick="toggleMenu()">☰</button>
        <ul id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="instructors.php">Instructors</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <?php if($_SESSION['role'] == 'admin'): ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php endif; ?>
                <li><a class="btn-link" href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a class="btn-link" href="login.php">Login</a></li>
                <li><a class="btn-link" href="signup.php">Sign Up</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
