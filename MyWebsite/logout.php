<?php
	session_start();
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
	exit();
    $_SESSION = array(); // Destroy the variables
	$params = session_get_cookie_params();
	// Destroy the cookie
	setcookie(session_name(), '', time()-42000,
	$params["path"], $params["domain"],
	$params["secure"], $params["httponly"]);
?>
