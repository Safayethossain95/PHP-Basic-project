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
              <h6 class="card-body-title">Add Social Links</h6>
             
              

              <form action='social-links-post.php' method="POST" enctype="multipart/form-data">
              
               <div class="row">
                <label class="col-sm-4 form-control-label">Title: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="title" placeholder="Enter Title">
                </div>
              </div>

                <div class="row">
                <label class="col-sm-4 form-control-label">Link: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="link" placeholder="Enter Link">
                </div>
              </div>


               <div class="row">
                <label class="col-sm-4 form-control-label">Icon: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="icon" placeholder="Enter Icon">
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