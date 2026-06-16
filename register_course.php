<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$course_id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

$check = mysqli_query($conn, "SELECT * FROM registrations WHERE user_id=$user_id AND course_id=$course_id");

if (mysqli_num_rows($check) == 0) {
    mysqli_query($conn, "INSERT INTO registrations (user_id, course_id) VALUES ($user_id, $course_id)");
}

header("Location: dashboard.php");
exit();
?>
