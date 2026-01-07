<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src = "../Assets/validation.js"></script>
</head>
<body>
    <form name ="LoginForm" method="post" action="../Controllers/loginCheck.php" onsubmit = "return validateLogin()">
    <fieldset>
        <legend>Sign In</legend>
        <table>
            <tr>
                <td>
                    username
                </td>
                <td><input type = 'text' name = "username" value = ""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type = 'password' name = "password" value = ""></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td>
                    <input type = 'submit' name = "subbmit" value = "Login">
                    <a href="signup.php">Signup</a>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
</body>
</html>