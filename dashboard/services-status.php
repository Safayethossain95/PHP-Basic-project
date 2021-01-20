<?php 
	require_once('../db.php');
	$id =  $_GET['id'];


	$select2 = "SELECT * FROM services WHERE id=$id";
	$services2 = mysqli_query($db,$select2);
	$assoc = mysqli_fetch_assoc($services2);
	if($assoc['status']==1){
		$update = "UPDATE services SET status=2 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:services.php');
		}
	}
	else{
		$update = "UPDATE services SET status=1 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:services.php');
		}
	}

	
?>