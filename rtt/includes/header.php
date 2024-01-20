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
  <title>Dashboard</title>
  <link rel="icon" type="image/png" href="https://vahanfin.com/vahanicon.png"/>
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
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--<input type="hidden" value="" id="uid">-->

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    var id = $('#uid').val();
      $.ajax({
        url : 'includes/function.php',
        type : 'post',
        data : {action:'getAllDataById' ,table:'user' , id:id},
        success:function(data)
        {
          var obj = jQuery.parseJSON(data);
          $('#uname').text(obj.firstname + ' ' + obj.lastname);
          $('#unamed').text(obj.firstname + ' ' + obj.lastname);
        }
      })
    })
 
</script> -->

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
  .main-header{
    position: fixed;
    width: 100%;
  }
</style>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo" style="background-color: #1b1674">
      <!-- mini logo for sidebar mini 40x40 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b style="font-weight: 300"><?php echo $user_data['firstname']." ".$user_data['lastname']; ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #1b1674">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
  
       <a href="https://wa.me/918051208051"  target="_blank"> <li><span class="fa fa-whatsapp my-floa" > &nbsp; Support</span></li></a>
           
     
            <ul class="dropdown-menu">
              <li class="header"></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all </a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <?php 
                
            if($user_data['profile_pic'])
            {
                $re = '/https/m';
                $str = $user_data['profile_pic'];
                preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
                if($matches)
                {
                  $img = $user_data['profile_pic'];
                }
                else
                {
                  $img = "uploads/profile_pic/".$user_data['profile_pic'];

                }
            }
            else
            {
                $img =  "assets/images/no_image.png";
            }
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $img; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" id="uname" style='text-transform: capitalize;'><?php echo $user_data['firstname']." ".$user_data['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $img; ?>" class="img-circle" alt="User Image">

                <p id="unamed" style='text-transform: capitalize;'><?php echo $user_data['firstname']." ".$user_data['lastname']; ?>
                 <!--  Alexander Pierce - Web Developer -->
                  <!--<small>Member since Nov. 2012</small>-->
                </p>
              </li>
              <!-- Menu Body -->
              <!--  -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="myProfile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                
                <div class="pull-right" style="margin-left:2px;">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>

                <div class="pull-right" style="margin-left:2px;">
                  <a href="changePassword.php" class="btn btn-default btn-flat">Change Pass</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  