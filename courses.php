<?php
include 'db.php';
include 'header.php';
$result = mysqli_query($conn, "SELECT * FROM courses ORDER BY id DESC");
?>
<section class="section">
    <h2>Available Courses and Packages</h2>
    <div class="cards">
        <?php while($course = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                <p><strong>Category:</strong> <?php echo htmlspecialchars($course['category']); ?></p>
                <p><strong>Duration:</strong> <?php echo htmlspecialchars($course['duration']); ?></p>
                <p><strong>Price:</strong> <?php echo htmlspecialchars($course['price']); ?> JOD</p>
                <p><?php echo htmlspecialchars($course['description']); ?></p>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a class="main-btn" href="register_course.php?id=<?php echo $course['id']; ?>">Register</a>
                <?php else: ?>
                    <a class="main-btn" href="login.php">Login to Register</a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php include 'footer.php'; ?>
