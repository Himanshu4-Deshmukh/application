<?php
  session_start(); 
  session_destroy();
  session_start(); 
   $_SESSION['success'] = 'Logout Successfully !!  Please login to Continue';

  header("location:../index.php");
?>