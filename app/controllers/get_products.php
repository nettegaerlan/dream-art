<?php

ob_start();

require("connect.php");

$sql = "SELECT * FROM items";

$result = mysqli_query($conn, $sql);

if($result) {
	$items = mysqli_fetch_all($result, MYSQLI_ASSOC);	
}

mysqli_close($conn); 

ob_end_flush();