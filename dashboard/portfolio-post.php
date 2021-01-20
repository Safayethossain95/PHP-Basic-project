<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      $title = $_POST['title'];
      $summary = $_POST['summary'];
      $category = $_POST['category'];
      




      $lower = strtolower($title);
      $slug = str_replace(' ', '-', $lower);
          // this is for thumbnail image
      $uploaded_image = $_FILES['thumbnail'];

          // this is for featured image
      $uploaded_featured_image = $_FILES['featured'];

      $explode = explode('.', $uploaded_image['name']);
      $ext = end($explode);

      $explode2 = explode('.', $uploaded_featured_image['name']);
      $ext2 = end($explode2);

      $allow_files = array('jpg','JPG','jpeg','JPEG','png','PNG');

          // this is for thubnail image
      if(in_array($ext, $allow_files)){


        if($uploaded_image['size']<=10000000){
          $insert = "INSERT INTO portfolios (title,summary,category) VALUES ('$title','$summary','$category')";
            $query = mysqli_query($db,$insert);
           $last_id = mysqli_insert_id($db);

           $new_file_name = $slug.'-'.$last_id.'.'.$ext;
           $new_location = '../assets/images/portfolios/'.$new_file_name;
           move_uploaded_file($uploaded_image['tmp_name'], $new_location );
            
           $image_update = "UPDATE portfolios SET thumbnail = '$new_file_name' WHERE id= '$last_id' ";
           if(mysqli_query($db,$image_update)){
            // echo "image updated";
           }
           else{
            echo "image not updated";
           }

           if(in_array($ext2, $allow_files)){


        if($uploaded_featured_image['size']<=10000000){
      
           

           $new_file_name2 = $slug.'-'.$last_id.'.'.$ext2;
           $new_location2 = '../assets/images/featured/'.$new_file_name2;
           move_uploaded_file($uploaded_featured_image['tmp_name'], $new_location2 );
            
           $image_update_featured = "UPDATE portfolios SET featured_image = '$new_file_name2' WHERE id= '$last_id' ";
           if(mysqli_query($db,$image_update_featured)){
            $_SESSION['msg']="Portfolio added successfully";
            header('location:add-portfolio.php');
           }
           else{
            echo "image not updated";
           }
        }
        else{
          echo "featured not alloed file type";
        }
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