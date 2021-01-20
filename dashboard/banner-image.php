    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM banner_image WHERE status= 1";
          $banners_image = mysqli_query($db,$select);
          
         

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">banner image</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">All Active banners_image</h3></div>
         <a href="add-banner_image.php" class="text-right pr-4 pt-3"><i class="fa fa-plus"></i> Add</a>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Banner image</th>
                    
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($banners_image as $key => $banner_image_single) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    <td class="text-center"><?php echo $banner_image_single['title']; ?></td>
                    
                    <td class="text-center">
                      

                      <?php 
                        if($banner_image_single['banner_image']== NULL){
                          echo "N/A";
                        }
                        else{
                          ?>
                           <img width="100" src="../assets/images/banners_image/<?php echo $banner_image_single['banner_image'];?>">

                          <?php
                        }
                      ?>
                    </td>


                   
                    

                    <td class="text-center">
                      <?php 
                        if($banner_image_single['status']==1){
                          ?>
                          <a href="banner_image_single-status.php?id=<?php echo $banner_image_single['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="banner_image_single-status.php?id=<?php echo $banner_image_single['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>  </td>
                    
                    <td class="text-center">
                      
                      <?php 
                        if($banner_image_single['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="banner_image_single_edit_form.php?safa=<?php echo $banner_image_single['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="banner_image_single-delete.php?id=<?php echo $banner_image_single['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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