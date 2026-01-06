<?php
    require_once('../Controllers/adminCheck.php');
    require_once('../Models/userModel.php');

    $users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Exhibition System</title>
</head>
<body>
    <div class="admin_dashboard">
        <h1>User Management</h1>

        <table class="data_table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>

            <?php
                if(count($users) > 0){
                    foreach($users as $u){
            ?>
                <tr>
                    <td><?php echo $u['id']; ?></td>
                    <td><?php echo $u['username']; ?></td>
                    <td><?php echo $u['email']; ?></td>
                    <td><?php echo $u['role']; ?></td>
                    <td class="action-buttons">
                        <a href="edit_user.php?id=<?php echo $u['id']; ?>">Edit</a> |
                        <?php if($u['role'] != 'blocked'){ ?>
                            <a href="../Controllers/userCheck.php?block=<?php echo $u['id']; ?>" onclick="return confirmBlock('<?php echo $u['username']; ?>')">Block</a> |
                        <?php } ?>
                        <a href="../Controllers/userCheck.php?delete=<?php echo $u['id']; ?>" onclick="return confirmDelete('<?php echo $u['username']; ?>')">Delete</a>
                    </td>
                </tr>
            <?php
                    }
                }else{
            ?>
                <tr>
                    <td colspan="5">No users found</td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>