<?php 
	session_start();
	session_destroy();
	setcookie("id", "");
	setcookie("pass", "");
	setcookie("color", "");
	header('location: ../../User/view/home.php');
?>