<?php 
require_once('../Controllers/sessionCheck.php'); 
require_once('../Models/reviewModel.php');
$list = getPendingSubmissions();
?>
<html>
<head><link rel="stylesheet" href="../Assets/style.css"></head>
<body>
    <div class="container">
        <h2>4.2 Submission Review</h2>
        <table>
            <tr><th>Preview</th><th>Action</th></tr>
            <?php foreach($list as $item){ ?>
            <tr>
                <!-- Assuming image is stored in Assets/uploads/ -->
                <td><img src="../Assets/uploads/<?=$item['photo_path']?>" width="100"></td>
                <td>
                    <form method="post" action="../Controllers/reviewController.php">
                        <input type="hidden" name="id" value="<?=$item['id']?>">
                        <input type="submit" name="action" value="Approve" style="background:green;color:white">
                        <input type="submit" name="action" value="Reject" style="background:red;color:white">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>