<?php 

	ob_end_flush();
	require("connect.php");

	$username = htmlspecialchars($_POST["username"]);
	$password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT);
	$firstname = htmlspecialchars($_POST["firstname"]);
	$lastname = htmlspecialchars($_POST["lastname"]);
	$email = htmlspecialchars($_POST["email"]);
	$address = htmlspecialchars($_POST["address"]);
	$role_id = 2;

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$sql_email = "SELECT * FROM users WHERE email = '$email'";
	
	$result = mysqli_query($conn, $sql);
	$result_email = mysqli_query($conn, $sql_email);

	if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result_email) > 0){
		die("user_and_email_exists");
	}else if(mysqli_num_rows($result) > 0) {
		die("user_exists");
	}else if(mysqli_num_rows($result_email) > 0) {
		die("email_exists");
	}else{
		$insert_query = "INSERT INTO users(username, password, firstname, lastname, email, home_address,role_id)
		VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$address', '$role_id')";
		$result = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));

	}

	ob_end_flush();
?>