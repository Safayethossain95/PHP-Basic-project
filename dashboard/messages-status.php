<?php 
	require_once('../db.php');
	$id =  $_GET['id'];

	

	$select2 = "SELECT * FROM contact_form WHERE id=$id";
	$contact2 = mysqli_query($db,$select2);
	$assoc = mysqli_fetch_assoc($contact2);
	if($assoc['read_status']==1){
		$update = "UPDATE contact_form SET read_status=2 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:messages.php');
		}
	}
	else{
		$update = "UPDATE contact_form SET read_status=1 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:messages.php');
		}
	
	}

	
?>