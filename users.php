<?php
  session_start();
  require_once('db.php');

  $select = "SELECT * FROM users";
  $users = mysqli_query($db,$select);
  $assoc2 = mysqli_fetch_assoc($users);
  $select2 = "SELECT COUNT(*) as total,id FROM users ORDER BY id";
  $users2 = mysqli_query($db,$select2);
  $assoc = mysqli_fetch_assoc($users2);


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
    <div class="col-12 ">
       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center">All users list (<?php echo $assoc['total']; ?>)</div>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($users as $key => $user) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    <td class="text-center"><?php echo $user['name']; ?></td>
                    <td class="text-center"><?php echo $user['email']; ?></td>
                    <td class="text-center"><?php echo $user['phone']; ?></td>

                    <td class="text-center">
                      <?php 
                        if($user['status']==1){
                          ?>
                          <a href="user-status.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="user-status.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>  </td>
                    
                    <td class="text-center">
                      
                      <?php 
                        if($user['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="edit_form.php?safa=<?php echo $user['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="user-delete.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-danger">Delete</a>

                          <a href="profile.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-danger">View Profile</a>
                           <?php
                        }
                       
                        else{
                          
                            echo '<a href="" class="btn btn-outline-danger">Not Allowed</a>';
                            
                        }
                       ?>

                    </td>
                  </tr>
                  <?php

                    }
                   ?>
                  
                  
                </tbody>
              </table>
              <a href="index.php">Go Index Page</a>
           </div>
         </div>
       </div>
            
    </div>
  </div>
</div>



</body>
</html>


