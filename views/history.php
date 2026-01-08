<?php
require_once '../config/db.php';
require_once '../models/SubmissionModel.php';
require_once 'layout_header.php';


if (!isset($_SESSION['user_id'])) {
    die("<p class='error'>Access Denied.</p>");
}

$model = new SubmissionModel($conn);


$submissions = $model->getSubmissionsByUser($_SESSION['user_id']);

$stories = $model->getStoriesByUser($_SESSION['user_id']);
?>

<div class="container" style="max-width: 800px;">
    <h2>My Submission History</h2>

    <h3>Single Photo Submissions</h3>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr style="background:#ddd;">
                <th>Photo</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($submissions)): ?>
                <tr><td colspan="4">No single photos submitted.</td></tr>
            <?php else: ?>
                <?php foreach($submissions as $row): ?>
                <tr>
                    <td>
                        <img src="../uploads/<?php echo htmlspecialchars($row['image_path']); ?>" width="80" style="border-radius:5px;">
                    </td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td>
                        <?php 
                            if($row['status'] == 'Accepted') echo '<span style="color:green; font-weight:bold;">Accepted</span>';
                            elseif($row['status'] == 'Rejected') echo '<span style="color:red; font-weight:bold;">Rejected</span>';
                            else echo '<span style="color:orange; font-weight:bold;">Pending</span>';
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <br><hr><br>

    <h3>Photo Stories (Collections)</h3>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr style="background:#ddd;">
                <th>Story Title</th>
                <th>Description</th>
                <th>Photos</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($stories)): ?>
                <tr><td colspan="4">No photo stories submitted.</td></tr>
            <?php else: ?>
                <?php foreach($stories as $story): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($story['title']); ?></strong></td>
                    <td><?php echo htmlspecialchars($story['description']); ?></td>
                    <td>
                        <div style="display:flex; gap:5px; flex-wrap:wrap;">
                            <?php 
                                $images = explode(',', $story['images']);
                                foreach($images as $img): 
                            ?>
                                <img src="../uploads/<?php echo htmlspecialchars($img); ?>" width="60" height="60" style="object-fit:cover; border:1px solid #ccc;">
                            <?php endforeach; ?>
                        </div>
                    </td>
                    <td><?php echo date('d M Y', strtotime($story['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</div>




</body>
</html>