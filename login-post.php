<?php 
	require_once('db.php');
	session_start();

	if($_SERVER["REQUEST_METHOD"]='POST'){
		
		$email=$_POST['email'];
		$password=$_POST['password'];

		$select = "SELECT COUNT(*) as total,name,email,password FROM users WHERE email='$email'";
		$query = mysqli_query($db,$select);
		$assoc = mysqli_fetch_assoc($query);

		if($assoc['total']>0){
				$hash = $assoc['password'];
		
				if(password_verify($password, $hash)){

					$_SESSION['em']=$assoc['email'];
					$_SESSION['name3']=$assoc['name'];
					header('location:dashboard/dashboard.php');
				}
				else{
					header('location:login.php');
				}
		}
		else{

			echo "email nai";
		}


		
	}
?>