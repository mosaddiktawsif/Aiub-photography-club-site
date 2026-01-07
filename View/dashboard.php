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
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .section { border: 1px solid #ccc; padding: 20px; margin-bottom: 20px; background: #f9f9f9; }
        h2 { margin-top: 0; }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="../controller/Logout.php" style="float:right; color:red;">Logout</a>

    <div class="section">
        <h2>Post a Notice</h2>
        <form action="../controller/AdminController.php" method="POST">
            <input type="text" name="title" placeholder="Notice Title" required><br><br>
            <textarea name="message" placeholder="Notice Details" required></textarea><br><br>
            <button type="submit" name="add_notice">Post Notice</button>
        </form>
    </div>

    <div class="section">
        <h2>Write a Blog</h2>
        <form action="../controller/AdminController.php" method="POST">
            <input type="text" name="title" placeholder="Blog Title" required><br><br>
            <textarea name="content" placeholder="Blog Content" required></textarea><br><br>
            <button type="submit" name="add_blog">Publish Blog</button>
        </form>
    </div>

    <div class="section">
        <h2>Upload to Gallery</h2>
        <form action="../controller/AdminController.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="description" placeholder="Photo Caption" required><br><br>
            <input type="file" name="image" required><br><br>
            <button type="submit" name="upload_photo">Upload</button>
        </form>
    </div>

    <div class="section">
        <h2>Publish Result</h2>
        <form action="../controller/AdminController.php" method="POST">
            <input type="text" name="name" placeholder="Participant Name" required><br><br>
            <input type="text" name="phone" placeholder="Phone Number" required><br><br>
            <input type="number" name="qty" placeholder="Selected Photos Qty" required><br><br>
            <button type="submit" name="publish_result">Publish</button>
        </form>
    </div>
</body>
</html>