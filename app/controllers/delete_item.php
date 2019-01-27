<?php 
	ob_start();
	require_once("connect.php");

	if(isset($_POST['delete'])){
		$prod_id = htmlspecialchars($_GET['id']);
		$sql_query = "DELETE FROM items WHERE id = '$prod_id'";
		$result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
		
		mysqli_close($conn);
		header("location: ../views/items.php");
	}else{
		// make asset permission denied 100vh
		echo "Permission denied";
	}
	
	
	ob_end_flush();
?>