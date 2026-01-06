<?php

require_once('../Controllers/adminCheck.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Exhibition</title>
</head>
<body>
    <div class = "admin_dashboard">
        <h2>Create New Exhibition</h2>
    
            <form name ="exhibitionForm" method = "post" action="../Controllers/exhibitionCheck.php" onsubmit = "return validateExhibition()">
                <fieldset>
                    <legend> Exhibition Details </legend>
                    <table>
                        <tr>
                            <td>Title</td>
                            <td><input type="text" name = "title" placeholder = "Enter exhibition Title"></td>
                        </tr>
                        <tr>
                            <td> PhotoType</td>
                            <td>
                                <select name="type">
                                    <option value = "">Please select Type of your picture</option>
                                    <option value = "Art">Art</option>
                                    <option value = "Photography">Photography</option>
                                    <option value = "Digital">Digital</option>   
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Deadline</td>
                            <td><input type = "date" name = "deadline"></td>
                        </tr>
                        <tr>
                            <td>Submit</td>
                            <td><input type = "submit" name = "submit" value = "Create Exhibition"></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
    </div>
</body>
</html>
