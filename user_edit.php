<?php 
	require_once('db.php');
	session_start();
	
	$newid = $_SESSION['hello'];
	
	
	// $select = "SELECT * FROM users WHERE id = '$newid' ";
	// $users = mysqli_query($db,$select);
	// $assoc2 = mysqli_fetch_assoc($users);
	

	
	
	//////////////////////////

	if($_SERVER["REQUEST_METHOD"]='POST'){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		
		$valid_phone = $phone;
		$number = preg_match('@[0-9]@',$name);



				// NAME VALIDATION

		if(!empty($name)){
			if(!$number){

				$valid_name = $name;
				$_SESSION['name2'] = $name ;
				
			}
			else{
				$_SESSION['invalidname']='invalid name';
				header('location:edit_form.php?safa='.$newid);
			}
		}
		else{
			$_SESSION['invalidname']='NAme lekhen';
				header('location:edit_form.php?safa='.$newid);
		}


				// EMAIL VALIDATION
		if(!empty($email)){
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/'; 
				if (preg_match($regex, $email)) {
					$valid_email = $email;
					$_SESSION['email2']=$email;
				 	// header('location:success.php');
				} else { 
				 $_SESSION['invalidemail'] = 'Invalid Email';
					header('location:edit_form.php?safa='.$newid);
				} 
		}
		else{
			$_SESSION['invalidemail']='email den';
			header('location:edit_form.php?safa='.$newid);
		}


		if($valid_name && $valid_email){
		
		$upd = "UPDATE users SET name='$name',email='$email',phone='$phone' WHERE id='$newid' ";
	 		mysqli_query($db,$upd);
			header('location:users.php');
			
	}
	else{
		$_SESSION['invaliderror']='Valid information not given';
	}
	}
	



	else{
		echo 'Not post method';
	}

?>