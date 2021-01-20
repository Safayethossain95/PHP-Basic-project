    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM users WHERE status= 1";
          $users = mysqli_query($db,$select);
          

          $deactivate_user = "SELECT * FROM users WHERE status= 2";
          $dusers = mysqli_query($db,$deactivate_user);


          $select2 = "SELECT COUNT(*)  as total,id  FROM users WHERE status=1";
          $users2 = mysqli_query($db,$select2);
          $assoc = mysqli_fetch_assoc($users2);

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">Users</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">
       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">All Active users list (<?php echo $assoc['total']; ?>)</h3></div>
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
              
           </div>
         </div>
       </div>
           

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h2 style="color:black;">Deactivated users list</h2></div>
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
                    foreach ($dusers as $key => $duser) {
                      

                      ?>

                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    <td class="text-center"><?php echo $duser['name']; ?></td>
                    <td class="text-center"><?php echo $duser['email']; ?></td>
                    <td class="text-center"><?php echo $duser['phone']; ?></td>

                    <td class="text-center">
                      <?php 
                        if($duser['status']==1){
                          ?>
                          <a href="user-status.php?id=<?php echo $duser['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="user-status.php?id=<?php echo $duser['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>  </td>
                    
                    <td class="text-center">
                      
                      <?php 
                        if($duser['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="edit_form.php?safa=<?php echo $duser['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="user-delete.php?id=<?php echo $duser['id']; ?>" class="btn btn-outline-danger">Delete</a>

                          <a href="profile.php?id=<?php echo $duser['id']; ?>" class="btn btn-outline-danger">View Profile</a>
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
              
           </div>
         </div>
       </div>     
    </div>
  </div>
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   <?php include 'include/footer.php' ?>