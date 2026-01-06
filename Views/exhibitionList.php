<?php
    require_once('../Controllers/adminCheck.php');
    require_once('../Models/exhibitionModel.php');

    $exhibitions = getAllExhibitions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exhibition List</title>
   
</head>
<body>
    <div class="admin_dashboard">
        <h1>Exhibition List</h1>

        <table class="data_table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>

            <?php
                if(count($exhibitions) > 0){
                    foreach($exhibitions as $e){
            ?>
                <tr>
                    <td><?php echo $e['id']; ?></td>
                    <td><?php echo $e['title']; ?></td>
                    <td><?php echo $e['type']; ?></td>
                    <td><?php echo $e['deadline']; ?></td>
                    <td><?php echo $e['status']; ?></td>
                    <td><?php echo $e['created_at']; ?></td>
                </tr>
            <?php
                    }
                }else{
            ?>
                <tr>
                    <td colspan="6">No exhibitions found</td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>