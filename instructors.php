<?php
include 'db.php';
include 'header.php';
$result = mysqli_query($conn, "SELECT * FROM instructors");
?>
<section class="section">
    <h2>Our Instructors</h2>
    <div class="cards">
        <?php while($instructor = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <h3><?php echo htmlspecialchars($instructor['name']); ?></h3>
                <p><strong><?php echo htmlspecialchars($instructor['role']); ?></strong></p>
                <p><?php echo htmlspecialchars($instructor['details']); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php include 'footer.php'; ?>
