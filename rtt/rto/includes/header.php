<?php
// session_start();
error_reporting(E_ALL & E_NOTICE);
include('includes/function.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="./Marketing_files/style1.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <input type="hidden" value="<?php echo $_SESSION['uid'] ?>" id="uid">
  <?php
  $id = $_SESSION['uid'];
  $user_data = getDataById('user', 'id', $id);

  if (empty($_SESSION['uid'])) {
    $_SESSION['error'] = ' Session Expired !!  Please login to Continue';
    header('Location:index.php');
  }
  ?>
</head>

<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <header class="main-header" style="position: fixed;width:100%">
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 40x40 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <span class="logo-lg"><b style="font-weight: 100"><?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?></b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 0 notifications</li>
                <li>
                  <ul class="menu">
                  </ul>
                </li>
              </ul>
            </li>
            <!-- <?php

            if ($user_data['profile_pic']) {
              $re = '/https/m';
              $str = $user_data['profile_pic'];
              preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
              if ($matches) {
                $img = $user_data['profile_pic'];
              } else {
                $img = "../uploads/profile_pic/" . $user_data['profile_pic'];
              }
            } else {
              $img =  "../assets/images/no_image.png";
            }
            ?> -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- <img src="<?php echo $img; ?>" class="user-image" alt="User Image"> -->
                <span class="hidden-xs" id="uname" style='text-transform: capitalize;'><?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <!-- <img src="<?php echo $img; ?>" class="img-circle" alt="User Image"> -->
                  <p id="unamed" style='text-transform: capitalize;'><?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?>

                  </p>
                </li>
                <li class="user-footer" style="text-align: center;">
                  <div style="margin:2px;display: inline;margin-right: 10%">
                    <a href="myProfile.php" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profile</a>
                  </div>
                  <div style="margin:2px;display: inline;">
                    <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Logout</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>