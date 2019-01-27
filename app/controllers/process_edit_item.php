<?php
ob_start();
require_once("connect.php");


/*Retrieve first three inputs*/
$itemName = $_POST["item_name"];
$price = $_POST["item_price"];
$description= $_POST["item_description"];
$category = $_POST["item_category"];

/*Retrieve File Details*/
$file_name = $_FILES["image"]["name"];
$file_size = $_FILES["image"]["size"];
$file_tmpname = $_FILES["image"]["tmp_name"];
$file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));


if($_FILES["image"]["size"] != 0){
	move_uploaded_file($file_tmpname, $final_file_path);
	$sql = "UPDATE items SET name = '$itemName', price = '$price', description = '$description', 
			category_id = '$category', image = '$file_name' WHERE id = $_GET[id]";
	
}else{
	$sql = "UPDATE items SET name = '$itemName', price = '$price', description = '$description', 
			category_id = '$category' WHERE id = $_GET[id]";
	
}

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	header("location: ../views/items.php");

ob_end_flush();
?>