<?php
ob_start();
require_once("connect.php");
// print_r($_POST);
/*Retrieve first three inputs*/
$itemName = $_POST["name"];
$price = $_POST["price"];
$description= $_POST["description"];
$category = $_POST["category"];



/*Retrieve File Details*/
$file_name = $_FILES["image"]["name"];
$file_size = $_FILES["image"]["size"];
$file_tmpname = $_FILES["image"]["tmp_name"];
$file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));


$hasDetails = false;

//check if itemname price and description are not empty or equal to 0
if($itemName != "" && $price > 0 && $description != ""){
	$hasDetails = true;
}

if($file_type == "jpg" || $file_type == "png" || $file_type == "jpeg" || $file_type == "gif" ){
	$isImage = true;
}

if($isImage && $hasDetails){
	$final_file_path = "../assets/images/$file_name";
	move_uploaded_file($file_tmpname, $final_file_path);

	$sql = "INSERT INTO items(name, price, description, image, category_id) 
			VALUES('$itemName', '$price', '$description', '$file_name', '$category')";
			
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	echo "Image has been uploaded successfully";
	header("location: ../views/items.php");
}else{
	echo "Please upload the image";
}

ob_end_flush();
?>