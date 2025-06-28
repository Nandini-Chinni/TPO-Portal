<?php

define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "tpo_portal");

// Establish connection
$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
