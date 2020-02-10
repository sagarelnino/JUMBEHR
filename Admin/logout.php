<?php 
	require 'session_required.php';
	unset($_SESSION['message']);
	unset($_SESSION['adminId']);
	session_destroy();
	header("Location:../index.php");
	exit;
?>