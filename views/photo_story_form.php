<?php require_once 'layout_header.php'; ?>

<div class="container">
    <h2>Photo Story</h2>
    
    <?php if(isset($_GET['error'])) echo "<p class='error'>".htmlspecialchars($_GET['error'])."</p>"; ?>
    <?php if(isset($_GET['success'])) echo "<p class='success'>".htmlspecialchars($_GET['success'])."</p>"; ?>

    <form action="../controllers/StoryController.php" method="POST" enctype="multipart/form-data">
        <label>Story Title:</label>
        <input type="text" name="title" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <label>Upload Photos (Select 3 to 10 images):</label>
        <input type="file" name="photos[]" multiple required>

        <button type="submit">Upload Story</button>
    </form>
</div>
</body>
</html>