    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM testimonial WHERE status= 1";
          $testimonials = mysqli_query($db,$select);
          
          $deactivate_service = "SELECT * FROM testimonial WHERE status= 2";
          $dservices = mysqli_query($db,$deactivate_service);

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">Brands</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">All Active Brands</h3></div>
         <a href="add-testimonial.php" class="text-right pr-4 pt-3"><i class="fa fa-plus"></i> Add</a>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Profile Image</th>
                    
                    
                    <th class="text-center">Message</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Post</th>
                    
                    
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($testimonials as $key => $testimonial) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    <td class="text-center">
                        <?php 
                        if($testimonial['profile_image']== NULL){
                          echo "N/A";
                        }
                        else{
                          ?>
                           <img width="100" src="../assets/images/testimonials/<?php echo $testimonial['profile_image'];?>">

                          <?php
                        }
                      ?>
                    </td>
                    <td class="text-center"><?php echo $testimonial['message']; ?></td>
                    <td class="text-center"><?php echo $testimonial['name']; ?></td>
                    <td class="text-center"><?php echo $testimonial['post']; ?></td>
                    
                    <td class="text-center">
                       <?php 
                        if($testimonial['status']==1){
                          ?>
                          <a href="testimonial-status.php?id=<?php echo $testimonial['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="testimonial-status.php?id=<?php echo $testimonial['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>

                    </td>
                    


                   
             
                    
                    <td class="text-center">
                      
                      <?php 
                        if($testimonial['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="testimonial_edit_form.php?safa=<?php echo $testimonial['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="testimonial-delete.php?id=<?php echo $testimonial['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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