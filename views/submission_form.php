<?php 
require_once 'layout_header.php'; 
?>

<div class="container">
    <h2>Photo Submission</h2>
    
    <?php if(isset($_GET['error'])) echo "<p class='error'>".htmlspecialchars($_GET['error'])."</p>"; ?>

    <form action="../controllers/SubmissionController.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label>Photo Title:</label>
        <input type="text" name="title" id="title">
        
        <label>Category:</label>
        <select name="category" id="category">
            <option value="">--Select--</option>
            <option value="Landscape">Landscape</option>
            <option value="Portrait">Portrait</option>
            <option value="Street">Street</option>
        </select>

        <label>Exhibition Type:</label>
        <select name="exhibition" id="exhibition">
            <option value="Online">Online</option>
            <option value="Gallery">Physical Gallery</option>
        </select>

        <label>Description:</label>
        <textarea name="description"></textarea>

        <label>Upload Photo (JPG/PNG):</label>
        <input type="file" name="photo" id="photo">

        <button type="submit">Submit Photo</button>
    </form>
</div>

</body>
</html>