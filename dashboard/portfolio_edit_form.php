<?php 
  include 'include/header.php';
  require_once('../db.php');
  $id = $_GET['safa'];
  $select = "SELECT * FROM portfolios WHERE id = $id";
  $q = mysqli_query($db,$select);
  $assoc = mysqli_fetch_assoc($q);
?>
<div class="sl-mainpanel" >
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        
      </nav>


      <div class="sl-pagebody">

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Edit Portfolio <?php echo $id ?></h6>
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
              

              <form action='portfolio-update.php' method="POST" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" name="portfolio_id" value="<?php echo $assoc['id'] ?>">
                <label class="col-sm-4 form-control-label">Portfolio Title: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" value="<?php echo $assoc['title'] ?>" name="title" placeholder="Enter Portfolio Title">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Portfolio Summary: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" value="<?php echo $assoc['summary'] ?>" name="summary" placeholder="Enter Portfolio Summary">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Portfolio Category: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  
                  <input type="text" class="form-control" value="<?php echo $assoc['category'] ?>" name="category" placeholder="Enter Portfolio Category">
                </div>
              </div>

               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Portfolio Thumbnail: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  
                  <input onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="thumbnail">
                </div>
              </div>

               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Portfolio Featured: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  
                  <input onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="featured">
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Preview Thumbnail: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  
                  <img id="blah"  width="100" src="../assets/images/portfolios/<?php echo $assoc['thumbnail']?>">
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Preview Featured Image: <span class="tx-danger"></span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  
                  <img id="blah2" width="100" src="../assets/images/featured/<?php echo $assoc['featured_image']?>">
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