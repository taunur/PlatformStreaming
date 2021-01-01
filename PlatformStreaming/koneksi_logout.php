<?php  
// SESSION LOGIN
	session_start();

// SESSION LOGOUT
	$_SESSION = [];
	session_unset();
	session_destroy();

	header('location: user_login.php');
	exit

?>