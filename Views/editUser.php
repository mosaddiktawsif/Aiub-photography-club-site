<?php
        require_once("../Controllers/adminCheck.php");
        require_once("../Controllers/userModel.php");


    if(isset($_GET['id'])) {
        $id = $_GET ['id'];
        $user =  getUserById($id);

        if ($user)  {
            header('location: userList.php');
        }
    else  {
        header ('location: userList.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <div class = "admin_dashboard">
        <h2>Edit User</h2>

        <form name = "editUserForm" method = "post" action="../Controllers/userCheck.php" onsubmit = "return validateUserEditt()">
            <fieldset>
                <legend>Edit User Details</legend>
                <input type = "hidden" name ="id" value = "<?php echo $user['id']?>">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name = "username" value = "<?php echo $user['username']?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                         <td><input type="email" name = "email" value = "<?php echo $user['email']?>"></td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>
                            <select name="role" id="">
                                <option value="user"></option>
                                <option value="user"></option>
                                <option value="user"></option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>
    </div>
</body>
</html>