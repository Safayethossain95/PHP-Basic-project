<?php 
	require_once('db.php');
	$id =  $_GET['id'];

	$delete = "DELETE FROM users WHERE id= $id";

	if(mysqli_query($db,$delete)){
		echo 'deleted successfully';
	}
?>