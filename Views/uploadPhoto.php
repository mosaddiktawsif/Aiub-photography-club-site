<?php require_once('../Controllers/sessionCheck.php'); ?>
<html>
<head>
    <link rel="stylesheet" href="../Assets/stylee.css">
    <script src="../Assets/validation.js"></script>
</head>
<body>
    <div class="container">
        <h2>Photo Optimization</h2>
        <div id="js-error" class="error"></div>
        <form action="../Controllers/uploadController.php" method="post" enctype="multipart/form-data" onsubmit="return validateUpload()">
            <input type="file" id="photo" name="photo" accept="image/*"><br>
            <small>Max 2MB</small><br>
            <input type="submit" name="upload" value="Upload">
        </form>
    </div>
</body>
</html>