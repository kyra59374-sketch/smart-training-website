<?php
include 'db.php';
include 'header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_course'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $price = floatval($_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query($conn, "INSERT INTO courses (title, category, duration, price, description)
    VALUES ('$title', '$category', '$duration', $price, '$description')");
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM courses WHERE id=$id");
    header("Location: admin.php");
    exit();
}

$courses = mysqli_query($conn, "SELECT * FROM courses ORDER BY id DESC");
?>
<section class="section">
    <h2>Admin Dashboard</h2>

    <div class="form-section">
        <h3>Add New Course</h3>
        <form method="post">
            <label>Course Title</label>
            <input type="text" name="title" required>

            <label>Category</label>
            <input type="text" name="category" required>

            <label>Duration</label>
            <input type="text" name="duration" required>

            <label>Price</label>
            <input type="number" name="price" required>

            <label>Description</label>
            <textarea name="description" required></textarea>

            <button type="submit" name="add_course">Add Course</button>
        </form>
    </div>

    <h3>Manage Courses</h3>
    <div class="table-box">
        <table>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php while($course = mysqli_fetch_assoc($courses)): ?>
            <tr>
                <td><?php echo htmlspecialchars($course['title']); ?></td>
                <td><?php echo htmlspecialchars($course['category']); ?></td>
                <td><?php echo htmlspecialchars($course['price']); ?> JOD</td>
                <td><a class="delete" href="admin.php?delete=<?php echo $course['id']; ?>" onclick="return confirm('Delete this course?')">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>
<?php include 'footer.php'; ?>
