    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM services WHERE status= 1";
          $services = mysqli_query($db,$select);
          
          $deactivate_service = "SELECT * FROM services WHERE status= 2";
          $dservices = mysqli_query($db,$deactivate_service);

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">Services</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">All Active Services</h3></div>
         <a href="add-service.php" class="text-right pr-4 pt-3"><i class="fa fa-plus"></i> Add</a>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Summary</th>
                    <th class="text-center">Icon</th>
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($services as $key => $service) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    <td class="text-center"><?php echo $service['title']; ?></td>
                    <td class="text-center"><?php echo $service['summary']; ?></td>
                    <td class="text-center"><?php echo $service['icon']; ?></td>
                    

                    <td class="text-center">
                      <?php 
                        if($service['status']==1){
                          ?>
                          <a href="services-status.php?id=<?php echo $service['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="services-status.php?id=<?php echo $service['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>  </td>
                    
                    <td class="text-center">
                      
                      <?php 
                        if($service['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
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

         <div class="card-header bg-info text-center"><h3 style="color:black;">All Deactivated Services</h3></div>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Summary</th>
                    <th class="text-center">Icon</th>
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($dservices as $key => $dservice) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    <td class="text-center"><?php echo $dservice['title']; ?></td>
                    <td class="text-center"><?php echo $dservice['summary']; ?></td>
                    <td class="text-center"><?php echo $dservice['icon']; ?></td>
                    

                    <td class="text-center">
                      <?php 
                        if($dservice['status']==1){
                          ?>
                          <a href="services-status.php?id=<?php echo $dservice['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="services-status.php?id=<?php echo $dservice['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>  </td>
                    
                    <td class="text-center">
                      
                      <?php 
                        if($dservice['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="edit_form.php?safa=<?php echo $dservice['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="user-delete.php?id=<?php echo $dservice['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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