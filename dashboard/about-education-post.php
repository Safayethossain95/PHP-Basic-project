<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      
      $year = $_POST['year'] ;
      $degree = $_POST['degree'] ;
      $percentage = $_POST['percentage'] ;
        
          
     
          $insert = "INSERT INTO about_education (year,degree,percentage) VALUES ('$year','$degree','$percentage')";
          $query = mysqli_query($db,$insert);
          
          if($query){
            header('location:about-education.php');
          }
        
          


        }
       
      
      else{
        echo "NOt post";
      }
     

 ?>