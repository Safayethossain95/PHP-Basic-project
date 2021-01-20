<?php 
    require_once('../db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      

      $contact_select = "SELECT COUNT(*) as total FROM contact WHERE status=1";
      $contacts = mysqli_query($db,$contact_select);
      $assoc_contacts = mysqli_fetch_assoc($contacts);

      $contact_message = $_POST['contact_message'];
      $contact_address = $_POST['contact_address'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      
      if($assoc_contacts['total']>0){
        $_SESSION['msg']="Cannot Insert more than one entry";
        header("location:contact.php");
      }
      else{
        $insert = "INSERT INTO contact (contact_msg,address,phone,email) VALUES ('$contact_message','$contact_address','$phone','$email')";
          $query = mysqli_query($db,$insert);

          if($query){
            header("location:contact.php");
          }
      }
      
    }
?>
