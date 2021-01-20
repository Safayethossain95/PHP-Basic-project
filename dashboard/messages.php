    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM contact_form  ORDER BY id DESC";
          $contacts_form = mysqli_query($db,$select);
          
          $deactivate_message = "SELECT * FROM contact_form WHERE read_status= 2";
          $dcontacts = mysqli_query($db,$deactivate_message);

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">Messages</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">All Active Messages</h3></div>
         
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <style>
                    .bold{
                      font-weight: 700!important;
                    }
                    .normal{
                      font-weight: 400!important;
                    }
                  </style>
                  <?php 
                    foreach ($contacts_form as $key => $service) {
                      ?>
                      <tr>
                    <td class="text-center <?php if($service['read_status']==1){
                      echo 'bold';
                    }
                      else{
                        echo 'normal';
                      }
                     ?>"><?php echo ++$key; ?></td>
                    <td class="text-center 
                    <?php if($service['read_status']==1){
                      echo 'bold';
                    }
                      else{
                        echo 'normal';
                      }
                     ?>"><?php echo $service['name']; ?></td>
                    <td class="text-center <?php if($service['read_status']==1){
                      echo 'bold';
                    }
                      else{
                        echo 'normal';
                      }
                     ?>"><?php echo $service['email']; ?></td>
                    <td class="text-center <?php if($service['read_status']==1){
                      echo 'bold';
                    }
                      else{
                        echo 'normal';
                      }
                     ?>"><?php echo $service['message']; ?></td>
                    

                    <td class="text-center <?php if($service['read_status']==1){
                      echo 'bold';
                    }
                      else{
                        echo 'normal';
                      }
                     ?>">
                      <?php 
                        if($service['read_status']==1){
                          ?>
                          <a href="messages-status.php?id=<?php echo $service['id']; ?>" class="btn btn-outline-success">Read</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="messages-status.php?id=<?php echo $service['id']; ?>" class="btn btn-outline-danger">Unread</a>
                          <?php  
                        }


                      ?>  </td>
                    
                    <td class="text-center">
                      
                      <?php 
                        if($service['read_status']==1){

                          
                          ?>
                          <a href="edit_form.php?safa=<?php echo $service['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="user-delete.php?id=<?php echo $service['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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