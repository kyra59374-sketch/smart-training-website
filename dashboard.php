<?php
include 'db.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "
    SELECT courses.title, courses.price, registrations.registered_at
    FROM registrations
    JOIN courses ON registrations.course_id = courses.id
    WHERE registrations.user_id = $user_id
");
?>
<section class="section">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?></h2>
    <p>This is your student dashboard.</p>

    <h3>Your Registered Courses</h3>
    <div class="table-box">
        <table>
            <tr>
                <th>Course</th>
                <th>Price</th>
                <th>Registration Date</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?> JOD</td>
                    <td><?php echo htmlspecialchars($row['registered_at']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>
<?php include 'footer.php'; ?>
