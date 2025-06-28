<?php

session_start();
if(!isset($_SESSION['login_user']))
{
	header("location:alogin.php");
	exit();
}

include("config.php");

$user_check = $_SESSION['login_user'];
$qry = mysqli_query($con, "SELECT * FROM tpo_portal.admin WHERE ad_username='$user_check' ");

if (!$qry) {
    die("Query Failed: " . mysqli_error($con));
}

?>