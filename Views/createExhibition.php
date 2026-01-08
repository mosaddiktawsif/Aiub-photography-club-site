<?php require_once('../Controllers/sessionCheck.php'); ?>
<html>
<head>
    <link rel="stylesheet" href="../Assets/style.css">
    <script src="../Assets/validation.js"></script>
</head>
<body>
    <div class="container">
        <h2>4.1 Create Exhibition</h2>
        <div id="js-error" class="error"></div>
        <form method="post" action="../Controllers/exhibitionController.php" onsubmit="return validateExhibition()">
            Title: <input type="text" id="title" name="title"><br>
            Type: <select id="type" name="type">
                <option value="">Select</option><option>Modern</option><option>Classic</option>
            </select><br>
            Deadline: <input type="date" id="deadline" name="deadline"><br>
            <input type="submit" name="create" value="Create">
        </form>
    </div>
</body>
</html>
