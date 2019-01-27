<?php
ob_start();
require("connect.php");

$sql = "SELECT * FROM categories";

$result = mysqli_query($conn, $sql);

if($result) {
	$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);	
}

mysqli_close($conn);

ob_end_flush();
?>