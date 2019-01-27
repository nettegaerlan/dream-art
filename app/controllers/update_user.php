<?php 
	ob_start();
	session_start();

	$user_id = $_POST["user_id"];
	$new_username = $_POST["username"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$oldPassword =  $_POST["oldPassword"];
	// $new_password =  password_hash(htmlspecialchars($_POST["new_password"]), PASSWORD_BCRYPT);
	
	if(!password_verify($oldPassword, $_SESSION['user']['password'])){
		echo "incorrect";
	}else{
		require_once("connect.php");
		$sql_query = "UPDATE users SET username = '$new_username', firstname = '$firstname', lastname = '$lastname',
					email = '$email', home_address = '$address'
					WHERE id = $user_id";

		$result = mysqli_query($conn, $sql_query);
		
		$sql_query2 = "SELECT * FROM users WHERE id = '$user_id'";
		$result2 = mysqli_query($conn, $sql_query2);
		$_SESSION['user'] = mysqli_fetch_assoc($result2);
		mysqli_close($conn);
		echo "success";
	}
	
	ob_end_flush();
?>