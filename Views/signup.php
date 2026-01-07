<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Exhibition System</title>
    <script src = "../Assets/validation.js"></script>
</head>
<body>
 <form name ="signupForm" method="post" action="../Controllers/signupCheck.php" onsubmit = "return validateSigup()">
<fieldset>
        <legend>Sign Up</legend>
        <table>
            <tr>
                <td>
                    Username
                </td>
                <td><input type = 'text' name = "username" value = ""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type = 'password' name = "password" value = ""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type = 'email' name = "email" value = ""></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td>
                    <input type = 'submit' name = "subbmit" value = "Login">
                    <a href="login.php">Login</a>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
</body>
</html>