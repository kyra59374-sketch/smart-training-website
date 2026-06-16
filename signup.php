<?php
include 'db.php';
include 'header.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (full_name, email, password, role) VALUES ('$name', '$email', '$password', 'student')";

    if (mysqli_query($conn, $sql)) {
        $message = "Account created successfully. You can login now.";
    } else {
        $message = "Email already exists or an error happened.";
    }
}
?>
<section class="section form-section">
    <h2>Create Account</h2>
    <p class="message"><?php echo $message; ?></p>
    <form method="post">
        <label>Full Name</label>
        <input type="text" name="full_name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Sign Up</button>
    </form>
</section>
<?php include 'footer.php'; ?>
