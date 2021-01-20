<?php 
	
	session_start();
	require_once("db.php");
	
	if($_SERVER["REQUEST_METHOD"]=='POST'){

		$id = $_POST['user_id'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];

		$select = "SELECT * FROM users WHERE id=$id";
		$query = mysqli_query($db,$select);
		$assoc = mysqli_fetch_assoc($query);

		

		if(password_verify($old_password, $assoc['password'])){
			if($new_password == $confirm_password){
				if($new_password == $old_password){
					echo "OLD and NEW password matched UPDATE failed";
				}
				else{
					$new_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$update = "UPDATE users SET password= '$new_hash' WHERE id=$id";
					$q = mysqli_query($db,$update);
					if($q){
						echo "password update successful";
					}
					else{
						echo "password update failed";
					}
				}
				
			}
			else{
				echo "nai";
			}
		}
		else{
			echo "NO MAMA";
		}
	}




	
?>