<?php 
	ob_start();

	session_start();
	require_once("connect.php");

	$username_email = htmlspecialchars($_POST["username-email"]);	
	$password = htmlspecialchars($_POST["password"]);	


	$sql = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email'";
	$result = mysqli_query($conn, $sql);

	$user_info = mysqli_fetch_assoc($result);

	if (!password_verify($password, $user_info['password'])) {
		// this compares a non hashed password to the hashed value stored in the database
		die("login_failed");
	} else {
		$_SESSION['user'] = $user_info;
	}


	echo "login_success";

	mysqli_close($conn);

	ob_end_flush();

?>