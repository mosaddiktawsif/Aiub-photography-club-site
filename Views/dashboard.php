<?php
require_once('../Controllers/sessionCheck.php');
require_once('../Models/analyticsModel.php');
$data = getMetrics();
?>
<html>
<head>
    <link rel="stylesheet" href="../Assets/stylee.css">
    <script src="../Assets/chart.js"></script> 
</head>
<body>
    <div class="container">
        <h2>4.5 Admin Dashboard</h2>
        <p>Active Users: <?=$data['users']?></p>
        <p>Submissions: <?=$data['subs']?></p>
        
        <div style="border-left:2px solid #000; border-bottom:2px solid #000; height:150px; display:flex; align-items:flex-end; gap:20px; padding:10px;">
            <div style="background:blue; width:50px; height:<?=$data['users']*20?>px; color:white; text-align:center;">User</div>
            <div style="background:orange; width:50px; height:<?=$data['subs']*20?>px; color:white; text-align:center;">Sub</div>
        </div>
    </div>
</body>
</html>