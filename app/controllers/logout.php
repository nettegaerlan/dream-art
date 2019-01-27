<?php 
	ob_start();
	//Destroy all sessions
	
	session_start();
	session_unset();
	session_destroy();

	//Route user to the landing page
	header("Location: ../views/index.php")

	ob_end_flush();
?>