<?php 

$host = "localhost";
$username = "root";
$password = "";
// $dbname = "dream_art";
$dbname = "dreamart";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
	die("Connection Failed: " . mysqli_error($conn));
}