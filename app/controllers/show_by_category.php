<?php

require_once("connect.php");

$catId = $_POST['catId'];

$sql = "SELECT * FROM items WHERE category_id = '$catId'";

$result = mysqli_query($conn, $sql);

$filteredByCategories = mysqli_fetch_all($result, MYSQLI_ASSOC);

if($filteredByCategories) {
	echo json_encode($filteredByCategories);
} else {
	echo "";
}

mysqli_close($conn);

