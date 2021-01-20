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
                    foreach ($ddcontacts as $key => $dcontact) {
                      ?>
                      <tr>
                    <td class="text-center"><?php echo ++$key; ?></td>
                    
                    <td class="text-center"><?php echo $dcontact['dcontact_msg']; ?></td>
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