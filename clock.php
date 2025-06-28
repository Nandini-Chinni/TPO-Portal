<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:clogin.php");
}
include("config.php"); // This will include the correct connection

$user_check = $_SESSION['login_user'];
$user_check = mysqli_real_escape_string($con, $user_check);  // Use $con from config.php

$qry = mysqli_query($con, "SELECT * FROM tpo_portal.company WHERE c_name='$user_check'");

if ($qry) {
    $row = mysqli_fetch_array($qry);
    echo "<h1><center><b>  " . $row['c_name'] . "</b></center></h1>";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
