<?php
	session_start();
	require_once('db.php');


	if($_SERVER["REQUEST_METHOD"]=='POST'){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
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
				header('location:register.php');
			}
		}
		else{
			$_SESSION['invalidname']='NAme lekhen';
				header('location:register.php');
		}


				// EMAIL VALIDATION
		if(!empty($email)){
			$regex = '/^[_A-Za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/'; 
				if (preg_match($regex, $email)) {
					

					$select = "SELECT COUNT(*) as total,name,password FROM users WHERE email='$email'";
					$query = mysqli_query($db,$select);
					$assoc = mysqli_fetch_assoc($query);

					if($assoc['total']>0){
						$_SESSION['invalidemail'] = 'Email Already Exists';
						header('location:register.php');
					}
					else{
						$valid_email = $email;
						$_SESSION['email2']=$email;
					}
				 	// header('location:success.php');
				} else { 
				 $_SESSION['invalidemail'] = 'Invalid Email';
					header('location:register.php');
				} 
		}
		else{
			$_SESSION['invalidemail']='email den';
			header('location:register.php');
		}

				// PASSWORD VALIDATION

		$uppercase = preg_match('@[A-Z]@',$password);
		$lowercase = preg_match('@[a-z]@',$password);
		$specialcharacter = preg_match('@[^\w]@',$password);

		if(!empty($password)){
			if(!$uppercase || !$lowercase || !$specialcharacter || !strlen($password)>8){
			$_SESSION['invalidpass']='Weak password';
			header('location:register.php');
			}
			else{
				$valid_password = password_hash($password, PASSWORD_BCRYPT);
				$_SESSION['pass2']= $password;
			}
		}
		else{
			$_SESSION['invalidpass']='Doya kore password den';
				header('location:register.php');
		}

		if($valid_name && $valid_email && $valid_password){
			echo 'insert';
		$insert = "INSERT INTO users(name, email, phone, password) VALUES ('$valid_name','$valid_email','$valid_phone','$valid_password')";
		mysqli_query($db,$insert);
			
			
	}
	else{
		$_SESSION['invaliderror']='Insert problem';
	}
	}
	



	else{
		echo 'Not post method';
	}
?>