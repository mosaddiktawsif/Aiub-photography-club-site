<?php 
require_once('../Controllers/sessionCheck.php'); 
require_once('../Models/userModel.php');
$users = getAllUsers();
?>
<html>
<head><link rel="stylesheet" href="../Assets/css/stylee.css"></head>
<body>
    <div class="container">
        <h2>4.3 User Management</h2>
        <table>
            <tr><th>User</th><th>Status</th><th>Action</th></tr>
            <?php foreach($users as $u){ ?>
            <tr>
                <td><?=$u['username']?></td>
                <td><?=$u['status']?></td>
                <td>
                   <a href="../Controllers/userController.php?id=<?=$u['id']?>&action=ban">Ban</a> |
                   <a href="../Controllers/userController.php?id=<?=$u['id']?>&action=unban">Unban</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>