<?php
    require_once('../Controllers/adminCheck.php');
    require_once('../Models/submissionModel.php');

    $submissions = getAllSubmissions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Review</title>

</head>
<body>
    <div class="admin_dashboard">
        <h1>Review Submissions</h1>

        <table class="data_table">
            <tr>
                <th>ID</th>
                <th>Exhibition</th>
                <th>User</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>

            <?php
                if(count($submissions) > 0){
                    foreach($submissions as $s){
            ?>
                <tr>
                    <td><?php echo $s['id']; ?></td>
                    <td><?php echo $s['exhibition_title']; ?></td>
                    <td><?php echo $s['username']; ?></td>
                    <td><?php echo $s['title']; ?></td>
                    <td><?php echo substr($s['description'], 0, 50); ?>...</td>
                    <td class="status-<?php echo $s['status']; ?>"><?php echo strtoupper($s['status']); ?></td>
                    <td><?php echo $s['submitted_at']; ?></td>
                    <td class="action-buttons">
                        <?php if($s['status'] == 'pending'){ ?>
                            <form method="post" action="../Controllers/submissionCheck.php" style="display:inline;" onsubmit="return confirmApprove()">
                                <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                                <button type="submit" name="approve" style="background-color: green;">Approve</button>
                            </form>
                            <form method="post" action="../Controllers/submissionCheck.php" style="display:inline;" onsubmit="return confirmReject()">
                                <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                                <button type="submit" name="reject" style="background-color: red;">Reject</button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php
                    }
                }else{
            ?>
                <tr>
                    <td colspan="8">No submissions found</td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>