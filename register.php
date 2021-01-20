<?php
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container ">
   <div class="row">
    <div class="col-8 m-auto">
       <h2 class="text-center";>register form</h2>
     <span style="color:red;">
            <?php
                if(isset($_SESSION['invaliderror'])){
                ?>
                <style type="text/css">
                  
                </style>
                <?php
                  echo $_SESSION['invaliderror'];
                  unset ($_SESSION['invaliderror']);
              }
            ?>
          </span>
    
          <form action="register-page.php" method="POST">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control namered" id="name" placeholder="Enter name" name="name" value="<?php  if(isset($_SESSION['name2'])){echo $_SESSION['name2'];}else{echo '';} ?>">

          <span style="color:red;">
            <?php
                if(isset($_SESSION['invalidname'])){
                ?>
                <style type="text/css">
                  .namered{
                    border: 1px solid red;
                  }
                </style>
                <?php
                  echo $_SESSION['invalidname'];
                  unset ($_SESSION['invalidname']);
              }
            ?>
          </span>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control emailred" id="email" placeholder="Enter email" name="email" value="<?php  if(isset($_SESSION['email2'])){echo $_SESSION['email2'];}else{echo '';} ?>">
         <span style="color:red;">
            <?php
                if(isset($_SESSION['invalidemail'])){
                ?>
                <style type="text/css">
                  .emailred{
                    border: 1px solid red;
                  }
                </style>
                <?php
                  echo $_SESSION['invalidemail'];
                  unset ($_SESSION['invalidemail']);
              }
            ?>
          </span>
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone">

         
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control passred" id="password" placeholder="Enter password" name="password" value="<?php  if(isset($_SESSION['pass2'])){echo $_SESSION['pass2'];}else{echo '';} ?>">
          <span style="color:red;">
            <?php
                if(isset($_SESSION['invalidpass'])){
                ?>
                <style type="text/css">
                  .passred{
                    border: 1px solid red;
                  }
                </style>
                <?php
                  echo $_SESSION['invalidpass'];
                  unset ($_SESSION['invalidpass']);
              }
            ?>
          </span>
        </div>
       
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</div>



</body>
</html>


