<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      $title = $_POST['title'] ;
      $count = $_POST['number'] ;
      $icon_name = $_POST['icon'] ;
      
          $insert = "INSERT INTO fact_count (title,count,icon_name) VALUES ('$title','$count','$icon_name')";
          $query = mysqli_query($db,$insert);
          
          if($query){
            header('location:fact-count.php');
          }


        }
       
      
      else{
        echo "NOt post";
      }
     

 ?>