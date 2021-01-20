<?php 
	require_once('../db.php');
	$id =  $_GET['id'];



	$select = "SELECT * FROM portfolios WHERE id = $id";
	$q = mysqli_query($db,$select);
	$assoc = mysqli_fetch_assoc($q);
	$image_file = "../assets/images/portfolios/".$assoc['thumbnail'];
	$image_file_featured = "../assets/images/featured/".$assoc['featured_image'];
	if(file_exists($image_file) && file_exists($image_file_featured)){
		unlink($image_file);
		unlink($image_file_featured);
			$delete = "DELETE FROM portfolios WHERE id= $id";
			if(mysqli_query($db,$delete)){
				echo 'Deleted successfully';
			}
	}
	else{
		echo "painai";
	}

	//  


?>