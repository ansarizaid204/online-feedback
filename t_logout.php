<?php  
	session_start();
	unset($_SESSION['name']);
	session_destroy();
	
	
	header("location:teacher_login.php");
	
?>