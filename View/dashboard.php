<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="../Controller/Logout.php">Logout</a>

    <?php if (isset($_GET['success'])): ?>
        <div>
            <?php
            $msg = '';
            switch ($_GET['success']) {
                case 'notice': $msg = 'Notice posted successfully.'; break;
                case 'blog': $msg = 'Blog published successfully.'; break;
                case 'gallery': $msg = 'Photo uploaded successfully.'; break;
                case 'result': $msg = 'Result published successfully.'; break;
                default: $msg = 'Action completed successfully.'; break;
            }
            echo htmlspecialchars($msg);
            ?>
            &nbsp;&nbsp;<a href="../index.php">Home</a>
        </div>
    <?php endif; ?>

    <div class="section">
        <h2>Post a Notice</h2>
        <form action="../Controller/AdminController.php" method="POST">
            <input type="text" name="title" placeholder="Notice Title" required><br><br>
            <textarea name="message" placeholder="Notice Details" required></textarea><br><br>
            <button type="submit" name="add_notice">Post Notice</button>
        </form>
    </div>

    <div class="section">
        <h2>Write a Blog</h2>
        <form action="../Controller/AdminController.php" method="POST">
            <input type="text" name="title" placeholder="Blog Title" required><br><br>
            <textarea name="content" placeholder="Blog Content" required></textarea><br><br>
            <button type="submit" name="add_blog">Publish Blog</button>
        </form>
    </div>

    <div class="section">
        <h2>Upload to Gallery</h2>
        <form action="../Controller/AdminController.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="description" placeholder="Photo Caption" required><br><br>
            <input type="file" name="image" required><br><br>
            <button type="submit" name="upload_photo">Upload</button>
        </form>
    </div>

    <div class="section">
        <h2>Publish Result</h2>
        <form action="../Controller/AdminController.php" method="POST">
            <input type="text" name="name" placeholder="Participant Name" required><br><br>
            <input type="text" name="phone" placeholder="Phone Number" required><br><br>
            <input type="number" name="qty" placeholder="Selected Photos Qty" required><br><br>
            <button type="submit" name="publish_result">Publish</button>
        </form>
    </div>
</body>
</html>