<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      
      $summary = $_POST['summary'] ;
          
         $about_summary_select = "SELECT COUNT(*) as total3 FROM about_summary WHERE status=1";
         $summaries = mysqli_query($db,$about_summary_select);
         $assoc = mysqli_fetch_assoc($summaries);
                  
          if($assoc['total3']>0){
            header('location:about-summary.php');
          }
        else{
          $insert = "INSERT INTO about_summary (summary) VALUES ('$summary')";
          $query = mysqli_query($db,$insert);
          
          if($query){
            header('location:about-summary.php');
          }
        }
          


        }
       
      
      else{
        echo "NOt post";
      }
     

 ?>