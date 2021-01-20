<?php 
	session_start();
  	require_once('db.php');
  	$pid = $_GET['id'];
	$select = "SELECT * FROM users WHERE id='$pid'";
	$users = mysqli_query($db,$select);
	$assoc = mysqli_fetch_assoc($users);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>


<div class="container">
   <div class="row mt-5">

    <div class="col-6 ">
   		<div class="card" style="width:100%">
	    <div class="card-body">
	    	<img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar6.png" alt="Card image" style="width:100%">
	    </div>
	    
	  </div>
    </div>

     <div class="col-6 ">
   		<div class="card" style="width:100%">
	    
	    <div class="card-body">
	      <h2 class="card-title"><i class="fa fa-user"></i> <?php echo $assoc['name'] ?></h2>
	      <h4 class="card-title"><i class="fa fa-envelope"></i> <?php echo $assoc['email'] ?></h4>
	      <h4 class="card-title"><i class="fa fa-phone"></i> <?php echo $assoc['phone'] ?></h4>
	      <h4 class="card-title"><i class="fa fa-lock"></i> *********</h4>

	      <a href="change-password.php?id=<?php echo $assoc['id']?>" class="btn btn-success">Change password</a>
	      
	    </div>
	  </div>
    </div>
  </div>
</div>

</body>
</html>
