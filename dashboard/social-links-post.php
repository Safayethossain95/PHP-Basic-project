<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      
      $title = $_POST['title'] ;
      $link =$_POST['link'];
      $icon = $_POST['icon'] ;

   
                  
         
          $insert = "INSERT INTO social_links (title,link,icon) VALUES ('$title','$link','$icon')";
          $query = mysqli_query($db,$insert);
          
          if($query){
            header('location:social-links.php');
          }
          else{
            echo "wrong";
          }
   
          


        }
       
      
      else{
        echo "NOt post";
      }
     

 ?>