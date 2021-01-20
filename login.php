<?php
  session_start();
  require_once('db.php');

  
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users list</title>
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
         <div class="card-header bg-info text-center">Login Form</div>
         <div class="card-body">
           <div class="container">
                <form action="login-post.php" method="POST">
                  
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control emailred" id="email" placeholder="Enter email" name="email">
                   
                  </div>
                 
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control passred" id="password" placeholder="Enter password" name="password" >
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
                    <div class="col-2 m-auto">
                  <button type="submit"  class="btn btn-success">Login</button>

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


