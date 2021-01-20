    <?php 
          include 'include/header.php';
          require_once('../db.php');

          $select = "SELECT * FROM contact WHERE status= 1";
          $contacts = mysqli_query($db,$select);
          
          $deactivate_contact = "SELECT * FROM contact WHERE status= 2";
          $dcontacts = mysqli_query($db,$deactivate_contact);

     ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
       
        <span class="breadcrumb-item active">Contact</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="container">
   <div class="row mt-5">
    <div class="col-12 ">

       <div class="card bg-white table-bordered ">
         <div class="card-header bg-info text-center"><h3 style="color:black;">Active Contact</h3></div>
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
         <a href="add-contact.php" class="text-right pr-4 pt-3"><i class="fa fa-plus"></i> Add</a>
         <div class="card-body">
           <div class="container">
            
             <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">Contact Message</th>
                    <th class="text-center">Address</th>
                    
                    <th class="text-center">Phone</th>
                    <th class="text-center">Email</th>
                    
                    
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($contacts as $key => $contact) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    
                    <td class="text-center"><?php echo $contact['contact_msg']; ?></td>
                    <td class="text-center"><?php echo $contact['address']; ?></td>
                    <td class="text-center"><?php echo $contact['phone']; ?></td>
                    <td class="text-center"><?php echo $contact['email']; ?></td>
                    
                    <td class="text-center">
                       <?php 
                        if($contact['status']==1){
                          ?>
                          <a href="contact-status.php?id=<?php echo $contact['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="contact-status.php?id=<?php echo $contact['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>

                    </td>
                    


                   
             
                    
                    <td class="text-center">
                      
                      <?php 
                        if($contact['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="contact_edit_form.php?safa=<?php echo $contact['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="contact-delete.php?id=<?php echo $contact['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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

              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    
                    <th class="text-center">ID</th>
                    <th class="text-center">dcontact Message</th>
                    <th class="text-center">Address</th>
                    
                    <th class="text-center">Phone</th>
                    <th class="text-center">Email</th>
                    
                    
                    <th class="text-center">Status</th>
                    
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($dcontacts as $key => $dcontact) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    
                    <td class="text-center"><?php echo $dcontact['contact_msg']; ?></td>
                    <td class="text-center"><?php echo $dcontact['address']; ?></td>
                    <td class="text-center"><?php echo $dcontact['phone']; ?></td>
                    <td class="text-center"><?php echo $dcontact['email']; ?></td>
                    
                    <td class="text-center">
                       <?php 
                        if($dcontact['status']==1){
                          ?>
                          <a href="contact-status.php?id=<?php echo $dcontact['id']; ?>" class="btn btn-outline-success">Activeted</a>


                        <?php
                        }
                        else{
                          ?>
                          <a href="contact-status.php?id=<?php echo $dcontact['id']; ?>" class="btn btn-outline-danger">Deactiveted</a>
                          <?php  
                        }


                      ?>

                    </td>
                    


                   
             
                    
                    <td class="text-center">
                      
                      <?php 
                        if($dcontact['status']==1){

                          // $_SESSION['safa']= $assoc['id'];
                          ?>
                          <a href="dcontact_edit_form.php?safa=<?php echo $dcontact['id'];?>" class="btn btn-outline-info">Edit</a>
                          
                          <a href="dcontact-delete.php?id=<?php echo $dcontact['id']; ?>" class="btn btn-outline-danger">Delete</a>
 
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