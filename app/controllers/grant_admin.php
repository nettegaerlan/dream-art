<?php 

ob_start();
session_start();
require_once("connect.php");
$id = $_GET['id'];

$get_user_query = "SELECT role_id FROM users WHERE id = $id";

$user_to_edit = mysqli_query($conn, $get_user_query);
$user = mysqli_fetch_assoc($user_to_edit);

if($user['role_id'] == 2){
	$update_role_query = "UPDATE users SET role_id = 1 WHERE id = $id";
}else{
	$update_role_query = "UPDATE users SET role_id = 2 WHERE id = $id";
}

//update session var if we change the current logged in user
//*NOTE WE DO NOT NEED TO DO THIS IF WE DISABLE THE BUTTON OF THE CURRENT LOGGED IN USER
if($_SESSION['user']['id'] == $id){
	$result = mysqli_query($conn, $update_role_query);
	$user_query = "SELECT * FROM users WHERE id = $id";
	$user_result = mysqli_query($conn, $user_query);
	$updated_user = mysqli_fetch_assoc($user_result)
	$_SESSION['user'] = $updated_user;
}

mysqli_close($conn);
header("Location: ../views/users.php");

ob_end_flush();
?>