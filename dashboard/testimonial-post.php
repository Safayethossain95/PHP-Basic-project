<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      $test_message = $_POST['test_message'];
      $test_name = $_POST['test_name'];
      $test_post = $_POST['test_post'];
      




      $lower = strtolower($test_name);
      $slug = str_replace(' ', '-', $lower);
          // this is for thumbnail image
      $uploaded_image = $_FILES['test_profile_photo'];

     

      $explode = explode('.', $uploaded_image['name']);
      $ext = end($explode);


      $allow_files = array('jpg','JPG','jpeg','JPEG','png','PNG');

          // this is for thubnail image
      if(in_array($ext, $allow_files)){


        if($uploaded_image['size']<=10000000){
          $insert = "INSERT INTO testimonial (message,name,post) VALUES ('$test_message','$test_name','$test_post')";
            $query = mysqli_query($db,$insert);
           $last_id = mysqli_insert_id($db);

           $new_file_name = $slug.'-'.$last_id.'.'.$ext;
           $new_location = '../assets/images/testimonials/'.$new_file_name;
           move_uploaded_file($uploaded_image['tmp_name'], $new_location );
            
           $image_update = "UPDATE testimonial SET profile_image = '$new_file_name' WHERE id= '$last_id' ";
           if(mysqli_query($db,$image_update)){
            header("location:testimonial.php");
           }
           else{
            echo "image not updated";
           }

          
        }
       
      }
      else{
        echo "NOt allowed";
      }
          // this is for featured image
      
      
      // $insert = "INSERT INTO portfolios (title,summary,category) VALUES ('$title','$summary','$category')";
      // $query = mysqli_query($db,$insert);

      // if($query){
      //   $message="portfolio added successfully";
      // }
    }

    else{
      echo "not post method";
    }

 ?>