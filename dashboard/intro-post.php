<?php 

    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
      
      $short_message = mysqli_real_escape_string($db,$_POST['short_message']) ;
      $who_am_i = mysqli_real_escape_string($db,$_POST['who_am_i']) ;
      $summary = mysqli_real_escape_string($db,$_POST['summary']) ;

          
         $about_summary_select = "SELECT COUNT(*) as total3 FROM intro WHERE status=1";
         $summaries = mysqli_query($db,$about_summary_select);
         $assoc = mysqli_fetch_assoc($summaries);
                  
          // if($assoc['total3']>0){
          //   header('location:intro.php');
          // }
        // else{
          $insert = "INSERT INTO intro (short_msg,who_am_i,summary) VALUES ('$short_message','$who_am_i','$summary')";
          $query = mysqli_query($db,$insert);
          
          if($query){
            header('location:intro.php');
          }
          else{
            echo "wrong";
          }
        // }
          


        }
       
      
      else{
        echo "NOt post";
      }
     

 ?>