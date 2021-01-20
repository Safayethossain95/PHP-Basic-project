<?php 
  include 'include/header.php';
  require_once('../db.php');
  // session_start();
?>
<div class="sl-mainpanel" >
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        
      </nav>


      <div class="sl-pagebody">

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Add Banner Image</h6>
              <?php 
                if(isset($_SESSION['msg'])){
                  ?>
                  <div class="alert alert-success">
                <span>
                  <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                 ?></span>
              </div>
              <?php
                }

               ?>
              

              <form action='banner-image-post.php' method="POST" enctype="multipart/form-data">
              <div class="row">
                <label class="col-sm-4 form-control-label">Banner Title: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="title" placeholder="Enter Portfolio Title">
                </div>
              </div>
              

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Banner Image: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  
                  <input type="file" class="form-control" name="banner_image">
                </div>
              </div>

             
              <div class="form-layout-footer mg-t-30">
                <button style="cursor:pointer;" type="submit" class="btn btn-info  text-center">Submit Form</button>
                
              </div>
              </form>
            </div>
          </div>
          
        </div>


      </div>

    </div>

    <?php 

    include 'include/footer.php';

    


    ?>