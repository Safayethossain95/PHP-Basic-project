    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM portfolios WHERE status= 1";
          $portfolios = mysqli_query($db,$select);
          
          $deactivate_service = "SELECT * FROM portfolios WHERE status= 2";
          $dservices = mysqli_query($db,$deactivate_service);

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">Portfolios</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">All Active Portfolios</h3></div>
         <a href="add-portfolio.php" class="text-right pr-4 pt-3"><i class="fa fa-plus"></i> Add</a>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Summary</th>
                    <th class="text-center">Thumbnail</th>
                    
                    <th class="text-center">Featured</th>
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($portfolios as $key => $portfolio) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    <td class="text-center"><?php echo $portfolio['title']; ?></td>
                    <td class="text-center"><?php echo $portfolio['category']; ?></td>
                    <td class="text-center"><?php echo $portfolio['summary']; ?></td>
                    <td class="text-center">
                      

                      <?php 
                        if($portfolio['thumbnail']== NULL){
                          echo "N/A";
                        }
                        else{
                          ?>
                           <img width="100" src="../assets/images/portfolios/<?php echo $portfolio['thumbnail'];?>">

                          <?php
                        }
                      ?>
                    </td>


                    <td class="text-center">

                      
                      <?php 
                        if($portfolio['featured_image']== NULL){
                          echo "N/A";
                        }
                        else{
                          ?>
                           <img width="100" src="../assets/images/featured/<?php echo $portfolio['featured_image'];?>">
                          <?php
                        }
                      ?>

                    </td>
                    

                    <td class="text-center">
                      <?php 
                        if($portfolio['status']==1){
                          ?>
                          <a href="portfolio-status.php?id=<?php echo $portfolio['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="portfolio-status.php?id=<?php echo $portfolio['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>  </td>
                    
                    <td class="text-center">
                      
                      <?php 
                        if($portfolio['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="portfolio_edit_form.php?safa=<?php echo $portfolio['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="portfolio-delete.php?id=<?php echo $portfolio['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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