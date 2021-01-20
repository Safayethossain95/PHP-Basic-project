<?php 
	require_once('../db.php');
	$id =  $_GET['id'];


	$select2 = "SELECT * FROM users WHERE id=$id";
	$users2 = mysqli_query($db,$select2);
	$assoc = mysqli_fetch_assoc($users2);
	if($assoc['status']==1){
		$update = "UPDATE users SET status=2 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:users.php');
		}
	}
	else{
		$update = "UPDATE users SET status=1 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:users.php');
		}
	}

	
?>