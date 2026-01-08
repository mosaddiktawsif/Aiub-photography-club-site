<?php
require_once('db.php');

function getMetrics(){
    $con = getConnection();
    $u = mysqli_fetch_assoc(mysqli_query($con, "SELECT count(*) as c FROM users WHERE status='active'"));
    $s = mysqli_fetch_assoc(mysqli_query($con, "SELECT count(*) as c FROM submissions"));
    return ['users' => $u['c'], 'subs' => $s['c']];
}
?>