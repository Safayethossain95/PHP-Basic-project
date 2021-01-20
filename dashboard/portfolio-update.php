<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      $portfolio_id = $_POST['portfolio_id'];
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

          $select = "SELECT * FROM portfolios WHERE id = $portfolio_id";
          $q = mysqli_query($db,$select);
          $assoc = mysqli_fetch_assoc($q);
          $image_file_thumbnail = "../assets/images/portfolios/".$assoc['thumbnail'];

          if(file_exists($image_file_thumbnail)){
            unlink($image_file_thumbnail);


           $new_file_name = $slug.'-'.$portfolio_id.'.'.$ext;
           $new_location = '../assets/images/portfolios/'.$new_file_name;
           move_uploaded_file($uploaded_image['tmp_name'], $new_location );
            
           $image_update = "UPDATE portfolios SET thumbnail = '$new_file_name' , title = '$title' , summary = '$summary', category = '$category' WHERE id= '$portfolio_id' ";
           if(mysqli_query($db,$image_update)){
            // echo "thumbnail image updated"."<br>";
           }
           else{
            $_SESSION['msg']= "image not updated";
           }
          }

          // $insert = "INSERT INTO portfolios (title,summary,category) VALUES ('$title','$summary','$category')";
          //   $query = mysqli_query($db,$insert);
          //  $last_id = mysqli_insert_id($db);


           if(in_array($ext2, $allow_files)){


        if($uploaded_featured_image['size']<=10000000){
          
          $image_file_featured = "../assets/images/featured/".$assoc['featured_image'];

          if(file_exists($image_file_featured)){
            unlink($image_file_featured);

             $new_file_name2 = $slug.'-'.$portfolio_id.'.'.$ext2;
             $new_location2 = '../assets/images/featured/'.$new_file_name2;
             move_uploaded_file($uploaded_featured_image['tmp_name'], $new_location2 );
       
             $image_update_featured = "UPDATE portfolios SET featured_image = '$new_file_name2' WHERE id= '$portfolio_id' ";
             if(mysqli_query($db,$image_update_featured)){
              $_SESSION['msg']="Portfolio Updated successfully";
              header('location:add-portfolio.php');
             }
             else{
              $_SESSION['msg']= "image not updated";
             }

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