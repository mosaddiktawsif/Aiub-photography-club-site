<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiub_photography";

mysqli_report(MYSQLI_REPORT_OFF);


$conn = @new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_errno) {

    if (mysqli_connect_errno() === 1049 || strpos($conn->connect_error, 'Unknown database') !== false) {

        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("MySQL connection failed: " . $conn->connect_error);
        }

        $createSql = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        if (!$conn->query($createSql)) {
            die("Failed creating database `$dbname`: " . $conn->error);
        }

        if (!$conn->select_db($dbname)) {
            die("Failed selecting database `$dbname`: " . $conn->error);
        }
    } else {
        die("MySQL connection failed: " . $conn->connect_error);
    }
}


?>