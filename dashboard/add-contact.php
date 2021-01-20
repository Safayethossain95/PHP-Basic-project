<?php 
  include 'include/header.php';
  require_once('../db.php');
  
?>
<div class="sl-mainpanel" >
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        
      </nav>


      <div class="sl-pagebody">

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Add Contact</h6>
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
              

              <form action='contact-post.php' method="POST" enctype="multipart/form-data">
             
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Contact Message: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="contact_message" placeholder="Enter Contact Message">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Contact Address: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  
                  <input type="text" class="form-control" name="contact_address" placeholder="Enter Contact Address">
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Phone: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
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