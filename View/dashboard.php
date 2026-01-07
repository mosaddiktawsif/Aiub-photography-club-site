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
    <script src="../assets/js/validation.js"></script>
</head>
<body>
    <?php include __DIR__ . '/../includes/navbar.php'; ?>
    <div class="container">>
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert-success">
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
                &nbsp;&nbsp;<a class="home-link" href="../index.php">Home</a>
            </div>
        <?php endif; ?>

        <div class="card">
            <h2>Post a Notice</h2>
            <form action="../Controller/AdminController.php" method="POST" onsubmit="return validateNoticeForm();">
                <div class="form-row"><input type="text" name="title" placeholder="Notice Title" required></div>
                <div class="form-row"><textarea name="message" placeholder="Notice Details" required></textarea></div>
                <div class="form-row"><button class="btn" type="submit" name="add_notice">Post Notice</button></div>
            </form>
        </div>

        <div class="card">
            <h2>Write a Blog</h2>
            <form action="../Controller/AdminController.php" method="POST" onsubmit="return validateBlogForm();">
                <div class="form-row"><input type="text" name="title" placeholder="Blog Title" required></div>
                <div class="form-row"><textarea name="content" placeholder="Blog Content" required></textarea></div>
                <div class="form-row"><button class="btn" type="submit" name="add_blog">Publish Blog</button></div>
            </form>
        </div>

        <div class="card">
            <h2>Upload to Gallery</h2>
            <form action="../Controller/AdminController.php" method="POST" enctype="multipart/form-data" onsubmit="return validateGalleryForm();">
                <div class="form-row"><input type="text" name="description" placeholder="Photo Caption" required></div>
                <div class="form-row"><input type="file" name="image" accept="image/*" required></div>
                <div class="form-row"><button class="btn" type="submit" name="upload_photo">Upload</button></div>
            </form>
        </div>

        <div class="card">
            <h2>Publish Result</h2>
            <form action="../Controller/AdminController.php" method="POST" onsubmit="return validateResultForm();">
                <div class="form-row"><input type="text" name="name" placeholder="Participant Name" required></div>
                <div class="form-row"><input type="text" name="phone" placeholder="Phone Number" required></div>
                <div class="form-row"><input type="number" name="qty" placeholder="Selected Photos Qty" required></div>
                <div class="form-row"><button class="btn" type="submit" name="publish_result">Publish</button></div>
            </form>
        </div>

    </div>
</body>
</html>
