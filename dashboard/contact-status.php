<?php 
	require_once('../db.php');
	$id =  $_GET['id'];

	

	$select2 = "SELECT * FROM contact WHERE id=$id";
	$contact2 = mysqli_query($db,$select2);
	$assoc = mysqli_fetch_assoc($contact2);
	if($assoc['status']==1){
		$update = "UPDATE contact SET status=2 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:contact.php');
		}
	}
	else{

		$select = "SELECT COUNT(*) as total FROM contact WHERE status= 1";
        $contacts = mysqli_query($db,$select);
        $assoc4 = mysqli_fetch_assoc($contacts);

        if($assoc4['total']==1){
        	header('location:contact.php');
        }
        else{
        	$update = "UPDATE contact SET status=1 WHERE id= $id";
		if(mysqli_query($db,$update)){
			header('location:contact.php');
		}
        }
		
			
		
		
	}

	
?>