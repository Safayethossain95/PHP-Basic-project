<?php
  session_start();
  require_once('db.php');

  $id = $_GET['id'];


 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
   <div class="row mt-5">
    <div class="col-5 m-auto">
       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center">Change Password</div>
         <div class="card-body">
           <div class="container">
                <form action="update-password.php" method="POST">
                  
                  <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                    <label for="pwd">Old Password:</label>
                    <input type="password" class="form-control passred" id="password" placeholder="Enter password" name="old_password" >
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
                 
                  <div class="form-group">
                    <label for="pwd">New Password:</label>
                    <input type="password" class="form-control passred" id="password" placeholder="Enter password" name="new_password" >
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

                  <div class="form-group">
                    <label for="pwd">Confirm New Password:</label>
                    <input type="password" class="form-control passred" id="password" placeholder="Enter password" name="confirm_password" >
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

                  <div class="row ">
                    <div class="col-8">
                  <button type="submit"  class="btn btn-success m-auto">Change password</button>

                  </div>
                  </div>
                </form>
           </div>
         </div>
       </div>
            
    </div>
  </div>
</div>



</body>
</html>


