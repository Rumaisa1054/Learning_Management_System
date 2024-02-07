<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_indexform";
$conn =mysqli_connect($servername, $username,$password,$database );

session_start();
session_reset();
session_destroy();
header("location: log.php");


 ?>
