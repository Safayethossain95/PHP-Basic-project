<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      $title = $_POST['title'] ;
      

      $lower = strtolower($title);
      $slug = str_replace(' ', '-', $lower);
          // this is for thumbnail image
      $uploaded_image = $_FILES['brand_logo'];

         

      $explode = explode('.', $uploaded_image['name']);
      $ext = end($explode);

     
      
      $allow_files = array('jpg','JPG','jpeg','JPEG','png','PNG');

          // this is for thubnail image
      if(in_array($ext, $allow_files)){


        if($uploaded_image['size']<=10000000){
          $insert = "INSERT INTO brands (title) VALUES ('$title')";
            $query = mysqli_query($db,$insert);
           $last_id = mysqli_insert_id($db);

           $new_file_name = $slug.'-'.$last_id.'.'.$ext;
           
           $new_location = '../assets/images/brands/'.$new_file_name;
           move_uploaded_file($uploaded_image['tmp_name'], $new_location );
            
           $image_update = "UPDATE brands SET logo = '$new_file_name' WHERE id = '$last_id' ";
           if(mysqli_query($db,$image_update)){
            header("location:brands.php");
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
      }
      
      // $insert = "INSERT INTO portfolios (title,summary,category) VALUES ('$title','$summary','$category')";
      // $query = mysqli_query($db,$insert);

      // if($query){
      //   $message="portfolio added successfully";
      // }
    

    else{
      echo "not post method";
    }

 ?>