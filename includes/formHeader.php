<?php
// session_start();
error_reporting(E_ALL & E_NOTICE);
include('includes/function.php');
include('conn.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Form</title>
  <link rel="icon" type="image/png" href="https://vahanfin.com/vahanicon.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="bower_components/datatables.net/jquery.dataTables.min.css">
 

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--<input type="hidden" value="" id="uid">-->


  <?php 
//   $id = $_GET['id'];
  $id = $_SESSION['uid'];
  $user_data = getDataById('user','id',$id);

  if(empty($_SESSION['uid']))
  {
    $_SESSION['error'] = ' Session Expired !!  Please login to Continue';
    header('Location:index.php');
  }
?>


  <style>

    .main-header .navbar {

      margin-left: 0;
      border: none;
      min-height: 50px;
      border-radius: 0;
      position: fixed;
      width: 100%;
      text-align: center;
      background-color: #3c8dbc;
      margin-bottom: 30%;

    }


    .navbar img {
      display: inline-block;
    }
  </style>
</head>

<body >


  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="navbar">
        <img src="https://vahanfin.com/logomain.png" width="15%" alt="Logo">
      </div>
    </nav>
  </header>

</body>