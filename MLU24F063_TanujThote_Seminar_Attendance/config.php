<?php
$host = "sql310.infinityfree.com";
$user = "if0_42854369";
$pass = "Vjt8VXjMALMJ"; // Replace with your actual InfinityFree account password
$dbname = "if0_42854369_attendance"; // Full database name from your panel

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>