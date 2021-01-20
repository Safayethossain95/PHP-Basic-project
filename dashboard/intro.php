    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM intro ORDER BY id DESC";
          $about_intro_all = mysqli_query($db,$select);
          
        

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">Intro</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">All Active About Summary</h3></div>
         <a href="add-intro.php" class="text-right pr-4 pt-3"><i class="fa fa-plus"></i> Add</a>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>

                    <th class="text-center">Short message</th>
                    
                    <th class="text-center">Who Am I</th>

                    <th class="text-center">Summary</th>
                    
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($about_intro_all as $key => $about_intro_all_single) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    
                    
                    <td class="text-center"><?php echo $about_intro_all_single['short_msg']; ?></td>
                    <td class="text-center"><?php echo $about_intro_all_single['who_am_i']; ?></td>

                    <td class="text-center"><?php echo $about_intro_all_single['summary']; ?></td>
                   
                    <td class="text-center">
                       <?php 
                        if($about_intro_all_single['status']==1){
                          ?>
                          <a href="about_intro_all_single-status.php?id=<?php echo $about_intro_all_single['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="about_intro_all_single-status.php?id=<?php echo $about_intro_all_single['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>

                    </td>
 
                    <td class="text-center">
                      
                      <?php 
                        if($about_intro_all_single['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="about_intro_all_single_edit_form.php?safa=<?php echo $about_intro_all_single['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="about_intro_all_single-delete.php?id=<?php echo $about_intro_all_single['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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