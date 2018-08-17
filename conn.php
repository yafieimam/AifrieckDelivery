<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "aifrieck";
$connect    = mysqli_connect($host, $user, $password, $database);

 if(!$connect) {      
 	die('Could not connect: ' . mysql_error());
 }
?>