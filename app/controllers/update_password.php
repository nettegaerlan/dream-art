<?php 
	ob_start();
	session_start();

	$id_user = $_POST["id_user"];
	$old_password =  $_POST["old_password"];
	$new_password =  password_hash(htmlspecialchars($_POST["new_password"]), PASSWORD_BCRYPT);
	
	if(!password_verify($old_password, $_SESSION['user']['password'])){
		echo "incorrect";
	}else{
		require_once("connect.php");
		$sql_query = "UPDATE users SET password = '$new_password'
					WHERE id = '$id_user'";

		$result = mysqli_query($conn, $sql_query);
		
		$sql_query2 = "SELECT * FROM users WHERE id = '$id_user'";
		$result2 = mysqli_query($conn, $sql_query2);
		$_SESSION['user'] = mysqli_fetch_assoc($result2);
		mysqli_close($conn);
		echo "success";
	}
	ob_end_flush();
?>