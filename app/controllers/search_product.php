<?php 

ob_start();
require_once("connect.php");

$search = $_POST["search"];

if(isset($_POST["search"])){
	
	$search = $_POST["search"];
	
	
}else{
	$search = NULL;
}

$sql = "SELECT * FROM items WHERE name LIKE '%$search%'";


$result = mysqli_query($conn, $sql);


$searchedItems = mysqli_fetch_all($result, MYSQLI_ASSOC);


if($searchedItems){
	echo json_encode($searchedItems);
}else{
	echo "";
}

mysqli_close($conn);
ob_end_flush();
?>
