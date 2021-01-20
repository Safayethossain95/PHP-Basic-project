<?php 
	session_start();

	if(!isset($_SESSION['em'])){
		header('location:../login.php');
	}
?>