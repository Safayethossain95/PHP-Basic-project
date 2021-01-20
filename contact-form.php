<?php 
	session_start();
	require_once('db.php');


	if($_SERVER["REQUEST_METHOD"]=='POST'){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];

		$insert = "INSERT INTO contact_form (name, email, message) VALUES('$name', '$email', '$message')";
		if(mysqli_query($db, $insert)){
			$_SESSION['send_msg']="Message sent successfully";
			header("location:index.php#contact");
		}
		else{
			echo "Message NOT sent";

		}
	}
?>