<?php 
include 'include/header.php';
  require_once('../db.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      $title = $_POST['title'];
      $summary = $_POST['summary'];
      $icon = $_POST['icon'];

      $insert = "INSERT INTO services (title,summary,icon) VALUES ('$title','$summary','$icon')";
      $query = mysqli_query($db,$insert);

      if($query){
        $message="service added successfully";
      }
    }

 ?>
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Add Service</h6>
              <?php 
                if(isset($message)){
                  ?>
                  <div class="alert alert-success">
                <span>
                  <?php 
                    echo $message;
                    
                 ?></span>
              </div>
              <?php
                }

               ?>
              

              <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
              <div class="row">
                <label class="col-sm-4 form-control-label">Service Title: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="title" placeholder="Enter Service Title">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Service Summary: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="summary" placeholder="Enter Service Summary">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Icon: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control" name="icon">
                    <option value="fab fa-facebook">Facebook</option>
                    <option value="fab fa-twitter">Twitter</option>
                    <option value="fab fa-pinterest">pinterest</option>
                    <option value="fab fa-youtube">Youtube</option>
                    <option value="fal fa-headset">Headset</option>
                    
                  </select>
                  
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