<?php
  session_start();
  require_once('db.php');
  $myid = $_GET['safa'];

  
 
    $select = "SELECT * FROM users WHERE id = '$myid' ";
    $users = mysqli_query($db,$select);
    $assoc2 = mysqli_fetch_assoc($users);

  
   // $myid = $_SESSION['safa'];
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
    <div class="col-7 m-auto">
       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><?php echo $assoc2['name']; ?>'s edit page</div>
         <div class="card-body">
           <div class="container">
                <form action="user_edit.php" method="POST">

                  <div class="form-group">
                    
                    <label for="name">Name:</label>
                    <input type="text" class="form-control namered" id="name" placeholder="Enter name" name="name" value="<?php if(isset($assoc2['name'])){echo $assoc2['name'];}else{echo '';} ?>">
                    <?php $_SESSION['hello']= $myid;?>

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
                    <input type="text" class="form-control emailred" id="email" placeholder="Enter email" name="email" value="<?php if(isset($assoc2['email'])){echo $assoc2['email'];}else{echo '';} ?>">
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
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="<?php if(isset($assoc2['phone'])){echo $assoc2['phone'];}else{echo '';} ?>">

                   
                  </div>
                  
                  <div class="row ">
                    <div class="col-2 m-auto">
                  <button type="submit"  class="btn btn-default">Update</button>

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


