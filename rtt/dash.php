<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	
	$id = $_SESSION['uid'];
	$vdata = getAllVehicleDataByUid($id);
	$udata = getAllUser();

	
	// for company name purpose jass
	$sql = "SELECT * FROM user WHERE id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$customer = $row["customer"];
	// echo $customer;

	// end
	if($_POST)
    {
    	if(isset($_POST['add']))
		{

			if(isset($_FILES['rc_upload']))
			{
				$rc_upd = '';
				$errors= array();
				$file_name = $_FILES['rc_upload']['name'];
				$file_size =$_FILES['rc_upload']['size'];
				$file_tmp =$_FILES['rc_upload']['tmp_name'];
				$file_type=$_FILES['rc_upload']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/rc_upload/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['rc_upload']['tmp_name'], $path))
					{
						$rc_upd = time().".". $file_ext;
					}
					else
					{
						$rc_upd = '';
						$msg = "Failed to upload ";
					}
					
				}

				$rc_upload = $rc_upd;
			}

			if(isset($_FILES['fitness_document']))
			{
				$f_doc = '';
				$errors= array();
				$file_name = $_FILES['fitness_document']['name'];
				$file_size =$_FILES['fitness_document']['size'];
				$file_tmp =$_FILES['fitness_document']['tmp_name'];
				$file_type=$_FILES['fitness_document']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/fitness/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['fitness_document']['tmp_name'], $path))
					{
						$f_doc = time().".". $file_ext;
					}
					else
					{
						$f_doc = '';
						$msg = "Failed to upload ";
					}
				}

				$f_docs = $f_doc;
			}

			if(isset($_FILES['permit_document']))
			{
				$p_doc = '';
				$errors= array();
				$file_name = $_FILES['permit_document']['name'];
				$file_size =$_FILES['permit_document']['size'];
				$file_tmp =$_FILES['permit_document']['tmp_name'];
				$file_type=$_FILES['permit_document']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/permit/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['permit_document']['tmp_name'], $path))
					{
						$p_doc = time().".". $file_ext;
					}
					else
					{
						$p_doc = '';
						$msg = "Failed to upload ";
					}
				}

				$p_docs = $p_doc;
			}

			if(isset($_FILES['insurence_document']))
			{
				$i_doc = '';
				$errors= array();
				$file_name = $_FILES['insurence_document']['name'];
				$file_size =$_FILES['insurence_document']['size'];
				$file_tmp =$_FILES['insurence_document']['tmp_name'];
				$file_type=$_FILES['insurence_document']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/insurence/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['insurence_document']['tmp_name'], $path))
					{
						$i_doc = time().".". $file_ext;
					}
					else
					{
						$i_doc = '';
						$msg = "Failed to upload ";
					}
				}

				$i_docs = $i_doc;
			}

			if(isset($_FILES['sld_document']))
			{
				$sld_doc = '';
				$errors= array();
				$file_name = $_FILES['sld_document']['name'];
				$file_size =$_FILES['sld_document']['size'];
				$file_tmp =$_FILES['sld_document']['tmp_name'];
				$file_type=$_FILES['sld_document']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/speed_limit_device/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['sld_document']['tmp_name'], $path))
					{
						$sld_doc = time().".". $file_ext;
					}
					else
					{
						$sld_doc = '';
						$msg = "Failed to upload ";
					}
				}

				$sld_docs = $sld_doc;
			}

			if(isset($_FILES['rt_document']))
			{
				$rt_doc = '';
				$errors= array();
				$file_name = $_FILES['rt_document']['name'];
				$file_size =$_FILES['rt_document']['size'];
				$file_tmp =$_FILES['rt_document']['tmp_name'];
				$file_type=$_FILES['rt_document']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/reflective_tape/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['rt_document']['tmp_name'], $path))
					{
						$rt_doc = time().".". $file_ext;
					}
					else
					{
						$rt_doc = '';
						$msg = "Failed to upload ";
					}
				}

				$rt_docs = $rt_doc;
			}

			if(isset($_FILES['tt_document']))
			{
				$tt_doc = '';
				$errors= array();
				$file_name = $_FILES['tt_document']['name'];
				$file_size =$_FILES['tt_document']['size'];
				$file_tmp =$_FILES['tt_document']['tmp_name'];
				$file_type=$_FILES['tt_document']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/tax_token/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['tt_document']['tmp_name'], $path))
					{
						$tt_doc = time().".". $file_ext;
					}
					else
					{
						$tt_doc = '';
						$msg = "Failed to upload ";
					}
				}

				$tt_docs = $tt_doc;
			}

			if(isset($_FILES['pollution_document']))
			{
				$pt_doc = '';
				$errors= array();
				$file_name = $_FILES['pollution_document']['name'];
				$file_size =$_FILES['pollution_document']['size'];
				$file_tmp =$_FILES['pollution_document']['tmp_name'];
				$file_type=$_FILES['pollution_document']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					$path = "uploads/vehicle_documents/pollution/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['pollution_document']['tmp_name'], $path))
					{
						$pt_doc = time().".". $file_ext;
					}
					else
					{
						$pt_doc = '';
						$msg = "Failed to upload ";
					}
				}

				$pt_docs = $pt_doc;
			}

			
			$data['user_id'] = $_SESSION['uid'];
			$data['reg_no'] = $_POST['reg_no'];
			$data['model'] = $_POST['model'];
			$data['mfg_by'] = $_POST['mfg_by'];
			$data['mfg_date'] = $_POST['mfg_date'];
			$data['reg_date'] = $_POST['reg_date'];
		    if(!empty($rc_upload))
		    {
		    	$data['rc_upload'] =$rc_upload;
		    }
		    $data['customer_id'] =$_POST['customer'];
		    // --------------------------------------------------------
		    if(!empty($_POST['fitness_issue_date']))
		    {
		    	$data['fitness_issue_date'] =date('Y-m-d',strtotime($_POST['fitness_issue_date']));
		    }

		    if(!empty($_POST['fitness_expiry_date']))
		    {
		    	$data['fitness_expiry_date'] =date('Y-m-d',strtotime($_POST['fitness_expiry_date']));
		    }

		    if(!empty($f_docs))
		    {
		    	$data['fitness_document'] =$f_docs;
		    }
		    // ----------------------------------------------------

		    if(!empty($_POST['permit_issue_date']))
		    {
		    	$data['permit_issue_date'] =date('Y-m-d',strtotime($_POST['permit_issue_date']));
		    }

		    if(!empty($_POST['permit_expiry_date']))
		    {
		    	$data['permit_expiry_date'] =date('Y-m-d',strtotime($_POST['permit_expiry_date']));
		    }

		    if(!empty($p_docs))
		    {
		    	$data['permit_document'] =$p_docs;
		    }

		    // -------------------------------------------------------------
		    if(!empty($_POST['insurence_issue_date']))
		    {
		    	$data['insurence_issue_date'] =date('Y-m-d',strtotime($_POST['insurence_issue_date']));
		    }

		    if(!empty($_POST['insurence_expiry_date']))
		    {
		    	$data['insurence_expiry_date'] =date('Y-m-d',strtotime($_POST['insurence_expiry_date']));
		    }

		    if(!empty($i_docs))
		    {
		    	$data['insurence_document'] =$i_docs;
		    }
		    // --------------------------------------------------------------------
		    if(!empty($_POST['sld_issue_date']))
		    {
		    	$data['sld_issue_date'] =date('Y-m-d',strtotime($_POST['sld_issue_date']));
		    }

		    if(!empty($_POST['sld_expiry_date']))
		    {
		    	$data['sld_expiry_date'] =date('Y-m-d',strtotime($_POST['sld_expiry_date']));
		    }
		    if(!empty($sld_docs))
		    {
		    	$data['sld_document'] =$sld_docs;
		    }
		    
		    // ---------------------------------------------------------------------
		    if(!empty($_POST['rt_issue_date']))
		    {
		    	$data['rt_issue_date'] =date('Y-m-d',strtotime($_POST['rt_issue_date']));
		    }

		    if(!empty($_POST['rt_expiry_date']))
		    {
		    	$data['rt_expiry_date'] =date('Y-m-d',strtotime($_POST['rt_expiry_date']));
		    }
		    if(!empty($rt_docs))
		    {
		    	$data['rt_document'] =$rt_docs;
		    }
		    // --------------------------------------------------------------------------
		    if(!empty($_POST['tt_issue_date']))
		    {
		    	$data['tt_issue_date'] =date('Y-m-d',strtotime($_POST['tt_issue_date']));
		    }

		    if(!empty($_POST['tt_expiry_date']))
		    {
		    	$data['tt_expiry_date'] =date('Y-m-d',strtotime($_POST['tt_expiry_date']));
		    }
		    if(!empty($tt_docs))
		    {
		    	$data['tt_document'] =$tt_docs;
		    }
		    // ---------------------------------------------------------------------------

		    if(!empty($_POST['pollution_issue_date']))
		    {
		    	$data['pollution_issue_date'] =date('Y-m-d',strtotime($_POST['pollution_issue_date']));
		    }

		    if(!empty($_POST['pollution_expiry_date']))
		    {
		    	$data['pollution_expiry_date'] =date('Y-m-d',strtotime($_POST['pollution_expiry_date']));
		    }
		    if(!empty($pt_docs))
		    {
		    	$data['pollution_document'] =$pt_docs;
		    }

			// print_r($data);die();
			$ins = insertData('vehicle', $data);
			// print_R($ins);die();
			if($ins['res'] == 1)
			{
				$_SESSION['success'] = $ins['msg'];
				echo '<meta http-equiv="refresh" content="1">';
			}
		}
    }
	


 ?>  


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Marketing</title>
<link rel="icon" href="./Marketing_files/logo.png" type="image/png">

<link rel="stylesheet" href="./Marketing_files/bootstrap1.min.css">

<link rel="stylesheet" href="./Marketing_files/themify-icons.css">

<link rel="stylesheet" href="./Marketing_files/nice-select.css">

<link rel="stylesheet" href="./Marketing_files/owl.carousel.css">

<link rel="stylesheet" href="./Marketing_files/gijgo.min.css">

<link rel="stylesheet" href="./Marketing_files/all.min.css">
<link rel="stylesheet" href="./Marketing_files/tagsinput.css">

<link rel="stylesheet" href="./Marketing_files/date-picker.css">

<link rel="stylesheet" href="./Marketing_files/scrollable.css">

<link rel="stylesheet" href="./Marketing_files/jquery.dataTables.min.css">
<link rel="stylesheet" href="./Marketing_files/responsive.dataTables.min.css">
<link rel="stylesheet" href="./Marketing_files/buttons.dataTables.min.css">

<link rel="stylesheet" href="./Marketing_files/summernote-bs4.css">

<link rel="stylesheet" href="./Marketing_files/morris.css">

<link rel="stylesheet" href="./Marketing_files/material-icons.css">

<link rel="stylesheet" href="./Marketing_files/metisMenu.css">

<link rel="stylesheet" href="./Marketing_files/style1.css">
<link rel="stylesheet" href="./Marketing_files/default.css" id="colorSkinCSS">
<style type="text/css">
@font-face {
  font-weight: 400;
  font-style:  normal;
  font-family: circular;

  src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Book.woff2') format('woff2');
}

@font-face {
  font-weight: 700;
  font-style:  normal;
  font-family: circular;

  src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Bold.woff2') format('woff2');
}</style></head>
<body class="crm_body_bg">



<nav class="sidebar vertical-scroll ps-container ps-theme-default ps-active-y" data-ps-id="e0695495-dbfa-ddfe-707e-4437db595868">
<div class="logo d-flex justify-content-between">
<a href="https://demo.dashboardpack.com/marketing-html/index.html"><img src="./Marketing_files/logo.png" alt=""></a>
<div class="sidebar_close_icon d-lg-none">
<i class="ti-close"></i>
</div>
</div>
<ul id="sidebar_menu" class="metismenu">
<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">

<div class="icon_menu">
<img src="./Marketing_files/dashboard.svg" alt="">
</div>
<span>Dashboard</span>
</a>
<ul class="mm-collapse" style="height: 5px;">
<li><a class="" href="https://demo.dashboardpack.com/marketing-html/index.html">Marketing</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/index_2.html">Default</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/index_3.html">Dark Menu</a></li>
</ul>
</li>
<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">
<div class="icon_menu">
<img src="./Marketing_files/2.svg" alt="">
</div>
<span>App</span>
</a>
<ul class="mm-collapse">
<li><a href="https://demo.dashboardpack.com/marketing-html/calender.html">calender</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/editor.html">editor</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/mail_box.html">Mail Box</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/chat.html">Chat</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/faq.html">FAQ</a></li>
</ul>
</li>

<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">
<div class="icon_menu">
<img src="./Marketing_files/8.svg" alt="">
</div>
<span>Table</span>
</a>
<ul class="mm-collapse">
<li><a href="https://demo.dashboardpack.com/marketing-html/data_table.html">Data Tables</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/bootstrap_table.html">Bootstrap</a></li>
</ul>
</li>
<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">
<div class="icon_menu">
<img src="./Marketing_files/9.svg" alt="">
</div>
<span>Cards</span>
</a>
<ul class="mm-collapse">
<li><a href="https://demo.dashboardpack.com/marketing-html/basic_card.html">Basic Card</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/theme_card.html">Theme Card</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/dargable_card.html">Draggable Card</a></li>
</ul>
</li>
<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">
<div class="icon_menu">
<img src="./Marketing_files/11.svg" alt="">
</div>
<span>Charts</span>
</a>
<ul class="mm-collapse">
<li><a href="https://demo.dashboardpack.com/marketing-html/chartjs.html">ChartJS</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/apex_chart.html">Apex Charts</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/chart_sparkline.html">Chart sparkline</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/am_chart.html">am-charts</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/nvd3_charts.html">nvd3 charts.</a></li>
</ul>
</li>
<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">
<div class="icon_menu">
<img src="./Marketing_files/cubes.svg" alt="">
</div>
<span>Widgets</span>
</a>
<ul class="mm-collapse">
<li><a href="https://demo.dashboardpack.com/marketing-html/chart_box_1.html">Chart Boxes 1</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/profilebox.html">Profile Box</a></li>
</ul>
</li>
<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">
<div class="icon_menu">
<img src="./Marketing_files/map.svg" alt="">
</div>
<span>Maps</span>
</a>
<ul class="mm-collapse">
<li><a href="https://demo.dashboardpack.com/marketing-html/mapjs.html">Maps JS</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/vector_map.html">Vector Maps</a></li>
</ul>
</li>
<li class="">
<a class="has-arrow" href="https://demo.dashboardpack.com/marketing-html/#" aria-expanded="false">
<div class="icon_menu">
<img src="./Marketing_files/10.svg" alt="">
</div>
<span>Pages</span>
</a>
<ul class="mm-collapse">
<li><a href="https://demo.dashboardpack.com/marketing-html/login.html">Login</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/resister.html">Register</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/error_400.html">Error 404</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/error_500.html">Error 500</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/forgot_pass.html">Forgot Password</a></li>
<li><a href="https://demo.dashboardpack.com/marketing-html/gallery.html">Gallery</a></li>
</ul>
</li>
</ul>
<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 738px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 174px;"></div></div></nav>


<section class="main_content dashboard_part large_header_bg">

<div class="container-fluid g-0">
<div class="row">
<div class="col-lg-12 p-0 ">
<div class="header_iner d-flex justify-content-between align-items-center">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<div class="serach_field-area d-flex align-items-center">
<div class="search_inner">
<form action="https://demo.dashboardpack.com/marketing-html/#">
<div class="search_field">
<input type="text" placeholder="Search here...">
</div>
<button type="submit"> <img src="./Marketing_files/icon_search.svg" alt=""> </button>
</form>
</div>
<span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
</div>
<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">
<li>
<a class="bell_notification_clicker nav-link-notify" href="https://demo.dashboardpack.com/marketing-html/#"> <img src="./Marketing_files/bell.svg" alt="">
</a>

<div class="Menu_NOtification_Wrap">
<div class="notification_Header">
<h4>Notifications</h4>
</div>
<div class="Notification_body">

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="https://demo.dashboardpack.com/marketing-html/#"><img src="./Marketing_files/2.png" alt=""></a>
</div>
<div class="notify_content">
<a href="https://demo.dashboardpack.com/marketing-html/#"><h5>Cool Marketing </h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="https://demo.dashboardpack.com/marketing-html/#"><img src="./Marketing_files/4.png" alt=""></a>
</div>
<div class="notify_content">
<a href="https://demo.dashboardpack.com/marketing-html/#"><h5>Awesome packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="https://demo.dashboardpack.com/marketing-html/#"><img src="./Marketing_files/3.png" alt=""></a>
</div>
<div class="notify_content">
<a href="https://demo.dashboardpack.com/marketing-html/#"><h5>what a packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="https://demo.dashboardpack.com/marketing-html/#"><img src="./Marketing_files/2.png" alt=""></a>
</div>
<div class="notify_content">
<a href="https://demo.dashboardpack.com/marketing-html/#"><h5>Cool Marketing </h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="https://demo.dashboardpack.com/marketing-html/#"><img src="./Marketing_files/4.png" alt=""></a>
</div>
<div class="notify_content">
<a href="https://demo.dashboardpack.com/marketing-html/#"><h5>Awesome packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="https://demo.dashboardpack.com/marketing-html/#"><img src="./Marketing_files/3.png" alt=""></a>
</div>
<div class="notify_content">
<a href="https://demo.dashboardpack.com/marketing-html/#"><h5>what a packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>
</div>
<div class="nofity_footer">
<div class="submit_button text-center pt_20">
<a href="https://demo.dashboardpack.com/marketing-html/#" class="btn_1">See More</a>
</div>
</div>
</div>

</li>
<li>
<a class="CHATBOX_open nav-link-notify" href="https://demo.dashboardpack.com/marketing-html/#"> <img src="./Marketing_files/msg.svg" alt=""> </a>
</li>
</div>
<div class="profile_info">
<img src="./Marketing_files/client_img.png" alt="#">
<div class="profile_info_iner">
<div class="profile_author_name">
<p>Neurologist </p>
<h5>Dr. Robar Smith</h5>
</div>
<div class="profile_info_details">
<a href="https://demo.dashboardpack.com/marketing-html/#">My Profile </a>
<a href="https://demo.dashboardpack.com/marketing-html/#">Settings</a>
<a href="https://demo.dashboardpack.com/marketing-html/#">Log Out </a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="main_content_iner ">
<div class="container-fluid p-0 ">
<div class="row ">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
<div class="quick_activity_wrap">

<div class="single_quick_activity">
<div class="count_content">
<p>Revenue</p>
<h3><?php echo date('d-m-Y',strtotime($val['mfg_date'])); ?> </h3>
</div>
<a href="https://demo.dashboardpack.com/marketing-html/#" class="notification_btn">Today</a>
<div id="bar1" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 187.7px; transition: left 2s ease-in-out 0s;">95%</span>
</div>
<span class="fill" data-percentage="95" style="background: rgb(80, 143, 244); width: 210.9px; transition: width 2s ease-in-out 0s;"></span>
</div>
</div>

<div class="single_quick_activity">
<div class="count_content">
<p>Orders</p>
<h3><span class="counter">35000</span> </h3>
</div>
<a href="https://demo.dashboardpack.com/marketing-html/#" class="notification_btn yellow_btn">This Week</a>
<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div>

<div class="single_quick_activity">
<div class="count_content">
<p>Leads</p>
<h3>$<span class="counter">50000</span> </h3>
</div>
<a href="https://demo.dashboardpack.com/marketing-html/#" class="notification_btn green_btn">This Month</a>
<div id="bar3" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 143.3px; transition: left 3s ease-in-out 0s;">75%</span>
</div>
<span class="fill" data-percentage="75" style="background: rgb(75, 230, 157); width: 166.5px; transition: width 3s ease-in-out 0s;"></span>
</div>
</div>

<div class="single_quick_activity">
<div class="count_content">
<p>Lead Conversion Rate</p>
<h3><span class="counter">50</span> %</h3>
</div>
<a href="https://demo.dashboardpack.com/marketing-html/#" class="notification_btn violate_btn">Anual</a>
<div id="bar4" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 165.5px; transition: left 3.5s ease-in-out 0s;">85%</span>
</div>
<span class="fill" data-percentage="85" style="background: rgb(146, 103, 255); width: 188.7px; transition: width 3.5s ease-in-out 0s;"></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-8">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Payment History</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body p-0">
<div id="iq-chart-order" style="height: 400px; position: relative;"><div dir="ltr" class="resize-sensor" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div class="resize-sensor-expand" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 761px; height: 410px;"></div></div><div class="resize-sensor-shrink" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 200%; height: 200%;"></div></div></div><div style="width: 100%; height: 100%; position: relative; top: -0.199982px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="group" style="width: 100%; height: 100%; overflow: visible;"><desc>JavaScript chart by amCharts</desc><defs><clippath id="id-46"><rect width="751" height="400"></rect></clippath><lineargradient id="gradient-id-69" x1="1%" x2="99%" y1="59%" y2="41%"><stop stop-color="#474758" offset="0"></stop><stop stop-color="#474758" stop-opacity="1" offset="0.75"></stop><stop stop-color="#3cabff" stop-opacity="1" offset="0.755"></stop></lineargradient><filter id="filter-id-78" width="200%" height="200%" x="-50%" y="-50%"></filter><filter id="filter-id-99" width="200%" height="200%" x="-50%" y="-50%"></filter><clippath id="id-132"><path d="M0,0 L619,0 L619,286 L0,286 L0,0"></path></clippath><clippath id="id-345"><rect width="619" height="286"></rect></clippath><filter id="filter-id-51" width="200%" height="200%" x="-50%" y="-50%"><fegaussianblur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></fegaussianblur><feoffset result="offsetBlur" dx="1" dy="1"></feoffset><feflood flood-color="#000000" flood-opacity="0.5"></feflood><fecomposite in2="offsetBlur" operator="in"></fecomposite><femerge><femergenode></femergenode><femergenode in="SourceGraphic"></femergenode></femerge></filter><filter id="filter-id-66" width="120%" height="120%" x="-10%" y="-10%"><fecolormatrix type="saturate" values="0"></fecolormatrix></filter><filter id="filter-id-137" width="200%" height="200%" x="-50%" y="-50%"><fegaussianblur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></fegaussianblur><feoffset result="offsetBlur" dx="1" dy="1"></feoffset><feflood flood-color="#000000" flood-opacity="0.5"></feflood><fecomposite in2="offsetBlur" operator="in"></fecomposite><femerge><femergenode></femergenode><femergenode in="SourceGraphic"></femergenode></femerge></filter></defs><g><g fill="#ffffff" fill-opacity="0"><rect width="751" height="400"></rect></g><g><g role="region" clip-path="url(&quot;#id-46&quot;)" opacity="1" aria-describedby="id-22-description"><g transform="translate(40,40)"><g><g><g><g><g><g><g transform="translate(52,0)"><g fill="#ffffff" fill-opacity="0"><rect width="619" height="286"></rect></g><g><g><g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,400)" display="none"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,343)" display="none"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,286)"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,229)"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,172)"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,114)"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,57)"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(0,-57)" display="none"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g></g></g><g><g></g></g><g><g><g role="menu" stroke-opacity="0" fill-opacity="1" fill="#1e3d73" stroke="#1e3d73" aria-describedby="id-127-description" id="id-127"><g><g clip-path="url(&quot;#id-132&quot;)"><g><g><g><g stroke-opacity="0" fill="#1e3d73" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(520.994,105.7)"><g><g><path d="M10,0 L31.262999999999998,0 a10,10 0 0 1 10,10 L41.263,180.3 a0,0 0 0 1 -0,0 L0,180.3 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#fe517e" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(263.075,180.5)"><g><g><path d="M10,0 L31.269,0 a10,10 0 0 1 10,10 L41.269,105.5 a0,0 0 0 1 -0,0 L0,105.5 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#99f6ca" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(572.575,58.6)"><g><g><path d="M10,0 L31.269,0 a10,10 0 0 1 10,10 L41.269,227.4 a0,0 0 0 1 -0,0 L0,227.4 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#ffbf43" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(366.244,131.7)"><g><g><path d="M10,0 L31.262999999999998,0 a10,10 0 0 1 10,10 L41.263,154.3 a0,0 0 0 1 -0,0 L0,154.3 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#9267ff" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(417.825,128.2)"><g><g><path d="M10,0 L31.269,0 a10,10 0 0 1 10,10 L41.269,157.8 a0,0 0 0 1 -0,0 L0,157.8 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#1e3d73" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(314.656,143.1)"><g><g><path d="M10,0 L31.269,0 a10,10 0 0 1 10,10 L41.269,142.9 a0,0 0 0 1 -0,0 L0,142.9 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#fe517e" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(469.406,113.3)"><g><g><path d="M10,0 L31.269,0 a10,10 0 0 1 10,10 L41.269,172.7 a0,0 0 0 1 -0,0 L0,172.7 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#99f6ca" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(159.906,223.2)"><g><g><path d="M10,0 L31.269,0 a10,10 0 0 1 10,10 L41.269,62.8 a0,0 0 0 1 -0,0 L0,62.8 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#ffbf43" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(211.494,199.3)"><g><g><path d="M10,0 L31.262999999999998,0 a10,10 0 0 1 10,10 L41.263,86.7 a0,0 0 0 1 -0,0 L0,86.7 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#9267ff" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(108.325,246.3)"><g><g><path d="M10,0 L31.269,0 a10,10 0 0 1 10,10 L41.269,39.7 a0,0 0 0 1 -0,0 L0,39.7 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g><g stroke-opacity="0" fill="#1e3d73" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(5.156,277.9)"><g><g><path d="M4.05,0 L37.219,0 a4.05,4.05 0 0 1 4.05,4.05 L41.269,8.1 a0,0 0 0 1 -0,0 L0,8.1 a0,0 0 0 1 -0,-0 L0,4.05 a4.05,4.05 0 0 1 4.05,-4.05 Z"></path></g></g></g><g stroke-opacity="0" fill="#fe517e" fill-opacity="1" stroke="#1e3d73" role="menuitem" focusable="true" tabindex="0" transform="translate(56.744,253.7)"><g><g><path d="M10,0 L31.262999999999998,0 a10,10 0 0 1 10,10 L41.263,32.3 a0,0 0 0 1 -0,0 L0,32.3 a0,0 0 0 1 -0,-0 L0,10 a10,10 0 0 1 10,-10 Z"></path></g></g></g></g></g></g></g><g></g></g><desc id="id-127-description">Series</desc></g></g></g><g clip-path="url(&quot;#id-345&quot;)"><g><g fill="#1e3d73" stroke="#1e3d73"><g><g opacity="1" transform="translate(541.625,105.7)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-13,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>1576</tspan></text></g></g></g></g><g opacity="1" transform="translate(283.706,180.5)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-11,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>922</tspan></text></g></g></g></g><g opacity="1" transform="translate(593.206,58.6)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-14,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>1988</tspan></text></g></g></g></g><g opacity="1" transform="translate(386.875,131.7)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-14,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>1349</tspan></text></g></g></g></g><g opacity="1" transform="translate(438.456,128.2)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-13,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>1379</tspan></text></g></g></g></g><g opacity="1" transform="translate(335.294,143.1)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-14,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>1249</tspan></text></g></g></g></g><g opacity="1" transform="translate(490.044,113.3)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-12.5,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>1510</tspan></text></g></g></g></g><g opacity="1" transform="translate(180.544,223.2)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-12,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>549</tspan></text></g></g></g></g><g opacity="1" transform="translate(232.125,199.3)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-12,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>758</tspan></text></g></g></g></g><g opacity="1" transform="translate(128.956,246.3)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-11.5,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>347</tspan></text></g></g></g></g><g opacity="1" transform="translate(25.794,277.9)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-6,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>71</tspan></text></g></g></g></g><g opacity="1" transform="translate(77.375,253.7)" focusable="true" tabindex="0"><g><g fill="#000000" stroke-opacity="0" transform="translate(0,-10)"><g transform="translate(-11.5,-14)" style="user-select: none;"><text x="0" y="14.40000057220459" overflow="hidden" dy="-3.888"><tspan>282</tspan></text></g></g></g></g></g></g></g></g><g><g><g><g></g></g><g><g></g></g></g></g><g><g></g></g><g><g></g></g><g role="button" focusable="true" tabindex="0" opacity="0" visibility="hidden" aria-hidden="true" display="none"><g fill="#6794dc" stroke="#ffffff" fill-opacity="1" stroke-opacity="0"><path></path></g><g transform="translate(9,9)"><g stroke="#ffffff" style="pointer-events: none;"><path d=" M0,0  L11,0 " transform="translate(2.5,7.5)"></path></g><g fill="#000000" style="pointer-events: none;"><g></g></g></g></g></g></g><g><g><g aria-hidden="true"><g><g fill="#000000" transform="translate(0,143) rotate(-90)"><g display="none"></g></g><g stroke="#000000" stroke-opacity="0.15" fill="none" transform="translate(52,286)" opacity="1"><path transform="translate(-0.5,-0.5)" d=" M0,0  L619,0 "></path></g><g><g><g fill="#000000" fill-opacity="0" opacity="0" stroke-opacity="0" style="pointer-events: none;" transform="translate(52,143)"><g transform="translate(-42,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>2,500</tspan></text></g></g><g fill="#000000" transform="translate(52,400.4)" display="none"><g transform="translate(-43,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>-1,000</tspan></text></g></g><g fill="#000000" transform="translate(52,343.2)" display="none"><g transform="translate(-38,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>-500</tspan></text></g></g><g fill="#000000" transform="translate(52,286)"><g transform="translate(-18,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>0</tspan></text></g></g><g fill="#000000" transform="translate(52,228.8)"><g transform="translate(-33,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>500</tspan></text></g></g><g fill="#000000" transform="translate(52,171.6)"><g transform="translate(-38,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>1,000</tspan></text></g></g><g fill="#000000" transform="translate(52,114.4)"><g transform="translate(-40,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>1,500</tspan></text></g></g><g fill="#000000" transform="translate(52,57.2)"><g transform="translate(-41,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>2,000</tspan></text></g></g><g fill="#000000" transform="translate(52,0)"><g transform="translate(-42,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>2,500</tspan></text></g></g><g fill="#000000" transform="translate(52,-57.2)" display="none"><g transform="translate(-41,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>3,000</tspan></text></g></g></g></g><g stroke="#000000" stroke-opacity="0" fill="none" style="pointer-events: none;" transform="translate(52,0)"><path d=" M0,0  L0,286 " transform="translate(-0.5,-0.5)"></path></g></g></g></g></g><g transform="translate(671,0)"><g></g></g></g></g><g><g transform="translate(52,0)"></g></g><g transform="translate(0,286)"><g transform="translate(52,0)"><g aria-hidden="true"><g><g stroke="#000000" stroke-opacity="0" fill="none" style="pointer-events: none;"><path d=" M0,0  L619,0 " transform="translate(-0.5,-0.5)"></path></g><g><g><g fill="#000000" fill-opacity="0" opacity="0" stroke-opacity="0" style="pointer-events: none;" transform="translate(309.5,0)"><g transform="translate(-4,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>L</tspan></text></g></g><g fill="#000000" transform="translate(490.041,0)" display="none"><g transform="translate(-14,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>USA</tspan></text></g></g><g fill="#000000" transform="translate(283.709,0)"><g transform="translate(-20,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>China</tspan></text></g></g><g fill="#000000" transform="translate(593.209,0)"><g transform="translate(-22,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>Japan</tspan></text></g></g><g fill="#000000" transform="translate(386.875,0)"><g transform="translate(-30,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>Germany</tspan></text></g></g><g fill="#000000" transform="translate(386.875,0)" display="none"><g transform="translate(-9.5,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>UK</tspan></text></g></g><g fill="#000000" transform="translate(283.709,0)" display="none"><g transform="translate(-23,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>France</tspan></text></g></g><g fill="#000000" transform="translate(490.041,0)"><g transform="translate(-16.5,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>India</tspan></text></g></g><g fill="#000000" transform="translate(180.541,0)"><g transform="translate(-19,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>Spain</tspan></text></g></g><g fill="#000000" transform="translate(283.709,0)" display="none"><g transform="translate(-41.5,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>Netherlands</tspan></text></g></g><g fill="#000000" transform="translate(72.308,0)" display="none"><g transform="translate(-22,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>Russia</tspan></text></g></g><g fill="#000000" transform="translate(77.375,0)" display="none"><g transform="translate(-40.5,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>South Korea</tspan></text></g></g><g fill="#000000" transform="translate(77.375,0)"><g transform="translate(-26.5,10)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>Canada</tspan></text></g></g><g fill="#000000" display="none" transform="translate(-25.791,0)"><g transform="translate(0,10)" display="none"></g></g></g></g><g stroke="#000000" stroke-opacity="0.15" fill="none" display="none" transform="translate(0,-286)"><path transform="translate(-0.5,-0.5)" d=" M0,0  L0,286 "></path></g><g fill="#000000" transform="translate(309.5,34)"><g display="none"></g></g></g></g></g></g></g></g></g></g></g><desc id="id-22-description">Chart</desc></g><g><g><g role="tooltip" visibility="hidden" opacity="0"><g fill="#ffffff" fill-opacity="0.9" stroke-width="1" stroke-opacity="1" stroke="#ffffff" filter="url(&quot;#filter-id-51&quot;)" style="pointer-events: none;" transform="translate(0,6)"><path d="M3,0 L3,0 L0,-6 L13,0 L21,0 a3,3 0 0 1 3,3 L24,8 a3,3 0 0 1 -3,3 L3,11 a3,3 0 0 1 -3,-3 L0,3 a3,3 0 0 1 3,-3"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(12,6)"><g transform="translate(0,7)" display="none"></g></g></g></g><g visibility="hidden" display="none" style="pointer-events: none;"><g fill="#ffffff" opacity="1"><rect width="751" height="400"></rect></g><g><g transform="translate(375.5,200)"><g><g stroke-opacity="1" fill="#f3f3f3" fill-opacity="0.8"><g><g><path d=" M53,0  a53,53,0,0,1,-106,0 a53,53,0,0,1,106,0 M42,0  a42,42,0,0,0,-84,0 a42,42,0,0,0,84,0 L42,0 "></path></g></g></g><g stroke-opacity="1" fill="#000000" fill-opacity="0.2"><g><g><path d=" M50,0  a50,50,0,0,1,-100,0 a50,50,0,0,1,100,0 M45,0  a45,45,0,0,0,-90,0 a45,45,0,0,0,90,0 L45,0 "></path></g></g></g><g fill="#000000" fill-opacity="0.4"><g transform="translate(-15.5,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>100%</tspan></text></g></g></g></g></g></g><g opacity="0.3" aria-labelledby="id-66-title" filter="url(&quot;#filter-id-66&quot;)" style="cursor: pointer;" transform="translate(0,379)"><g fill="#ffffff" opacity="0"><rect width="66" height="21"></rect></g><g><g shape-rendering="auto" fill="none" stroke-opacity="1" stroke-width="1.7999999999999998" stroke="#3cabff"><path d=" M15,15  C17.4001,15 22.7998,15.0001 27,15 C31.2002,14.9999 33.2999,6 36,6 C38.7001,6 38.6999,10.5 40.5,10.5 C42.3001,10.5 42.2999,6 45,6 C47.7001,6 50.9999,14.9999 54,15 C57.0002,15.0001 58.7999,15 60,15"></path></g><g shape-rendering="auto" fill="none" stroke-opacity="1" stroke-width="1.7999999999999998" stroke="url(&quot;#gradient-id-69&quot;)"><path d=" M6,15  C8.2501,15 9.7498,15.0001 15,15 C20.2502,14.9999 20.7748,3.6 27,3.6 C33.2252,3.6 33.8998,14.9999 39.9,15 C45.9002,15.0001 45.9748,15 51,15 C56.0252,15 57.7499,15 60,15"></path></g></g><title id="id-66-title">Chart created using amCharts library</title></g><g role="tooltip" visibility="hidden" opacity="0"><g fill="#000000" fill-opacity="1" stroke-width="1" stroke-opacity="1" stroke="#000000" style="pointer-events: none;" transform="translate(92,326)"><path d="M0,0 L20,0 a0,0 0 0 1 0,0 L20,10 a0,0 0 0 1 -0,0 L0,10 a0,0 0 0 1 -0,-0 L0,0 a0,0 0 0 1 0,-0"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(102,326)"><g transform="translate(0,5)" display="none"></g></g></g></g><g role="tooltip" visibility="hidden" opacity="0"><g fill="#000000" fill-opacity="1" stroke-width="1" stroke-opacity="1" stroke="#000000" style="pointer-events: none;" transform="translate(-25,40)"><path d="M0,0 L20,0 a0,0 0 0 1 0,0 L20,0 L20,0 L25,0 L20,10 L20,10 a0,0 0 0 1 -0,0 L0,10 a0,0 0 0 1 -0,-0 L0,0 a0,0 0 0 1 0,-0"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(-15,40)"><g transform="translate(0,5)" display="none"></g></g></g></g><g role="tooltip" visibility="hidden" opacity="0" aria-describedby="id-127" transform="translate(401.5,183)"><g fill="#1e3d73" fill-opacity="0.9" stroke-width="1" stroke-opacity="1" stroke="#ffffff" filter="url(&quot;#filter-id-137&quot;)" style="pointer-events: none;" transform="translate(-30,-5.5)"><path d="M3,0 L21,0 a3,3 0 0 1 3,3 L24,3 L24,0.5 L30,5.5 L24,10.5 L24,8 a3,3 0 0 1 -3,3 L3,11 a3,3 0 0 1 -3,-3 L0,3 a3,3 0 0 1 3,-3"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(-18,-5.5)"><g transform="translate(0,7)" display="none"></g></g></g></g></g></g></g></g></svg></div></div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">1 United States Dollar Equals</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body">
<div class="equal_hdr mb_15 d-flex justify-content-between align-items-center flex-wrap">
<h4 class="f_s_28 f_w_700">0.50 Euro</h4>
<a href="https://demo.dashboardpack.com/marketing-html/#" class="Euro_btn">Euro</a>
</div>
<p class="color_gray f_s_14 f_w_700 mb_15 ">24 Apr 6.00 am UTC Declaration</p>
<div class="grid_4rap">
<div class="single_wrap_input">
<div class="common_input">
<input type="text" placeholder="1">
</div>
</div>
<div class="single_wrap_input">
<select class="nice_Select2 wide" name="" id="" style="display: none;">
<option value="1">United State</option>
<option value="1">United State</option>
</select><div class="nice-select nice_Select2 wide" tabindex="0"><span class="current">United State</span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div><ul class="list"><li data-value="1" class="option selected">United State</li><li data-value="1" class="option">United State</li></ul></div>
</div>
<div class="single_wrap_input">
<div class="common_input">
<input type="text" placeholder="1">
</div>
</div>
<div class="single_wrap_input">
<select class="nice_Select2 wide" name="" id="" style="display: none;">
<option value="1">Euro</option>
<option value="1">Euro</option>
</select><div class="nice-select nice_Select2 wide" tabindex="0"><span class="current">Euro</span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div><ul class="list"><li data-value="1" class="option selected">Euro</li><li data-value="1" class="option">Euro</li></ul></div>
</div>
</div>
<div id="area-spaline"></div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="white_card  mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Payment History</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body">
<div class="table-responsive">
<table class="table bayer_table m-0">
<tbody>
<tr style="border: hidden;">
<td>
<img class="byder_thumb" src="./Marketing_files/1.png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit PayPal</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr style="border: hidden;">
<td>
<img class="byder_thumb" src="./Marketing_files/2(1).png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit PayPal</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr style="border: hidden;">
<td>
<img class="byder_thumb" src="./Marketing_files/3(1).png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit from Bank</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr style="border: hidden;">
<td>
<img class="byder_thumb" src="./Marketing_files/4(1).png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Cancelled</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr style="border: hidden;">
<td>
<img class="byder_thumb" src="./Marketing_files/5.png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit from Bank</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<div class="white_card  mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Monthly Invoices</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body">
<div class="table-responsive">
<table class="table bayer_table2 m-0">
<tbody>
<tr>
<td class="w_70">
<img class="byder_thumb wh_56" src="./Marketing_files/check_1.png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit PayPal</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr>
<td>
<img class="byder_thumb wh_56" src="./Marketing_files/check_2.png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit PayPal</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr>
<td>
<img class="byder_thumb wh_56" src="./Marketing_files/check_3.png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit from Bank</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr>
<td>
<img class="byder_thumb wh_56" src="./Marketing_files/check_4.png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Cancelled</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
<tr>
<td>
<img class="byder_thumb wh_56" src="./Marketing_files/check_5.png" alt="">
</td>
<td>
<div class="payment_gatway">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> Deposit from Bank</h5>
<p class="color_gray f_s_12 f_w_700 ">5 march, 18:33</p>
</div>
</td>
<td>
<div class="payment_gatway text-end">
<h5 class="byer_name  f_s_16 f_w_700 color_theme"> +2000</h5>
<p class="color_gray f_s_12 f_w_700 ">EUR</p>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="white_card mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Social Media</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body">
<div class="row">
<div class="col-xl-6">
<div class="single_social_media d-flex align-items-center">
<div class="icon_media">
<i class="fab fa-facebook-f"></i>
</div>
<div class="media_contet">
<span>Folower</span>
<h4>35000</h4>
</div>
</div>
<div class="single_social_media d-flex align-items-center">
<div class="icon_media twitter_bg">
<i class="fab fa-twitter"></i>
</div>
<div class="media_contet">
<span>Folower</span>
<h4>2500</h4>
</div>
</div>
<div class="single_social_media d-flex align-items-center">
<div class="icon_media youtube_bg">
<i class="fab fa-youtube"></i>
</div>
<div class="media_contet">
<span>Folower</span>
<h4>1.7M</h4>
</div>
</div>
</div>
<div class="col-xl-6">
<div class="single_social_media d-flex align-items-center">
<div class="icon_media insta_bg">
<i class="fab fa-instagram"></i>
</div>
<div class="media_contet">
<span>Folower</span>
<h4>35000</h4>
</div>
</div>
<div class="single_social_media d-flex align-items-center">
<img class="img-fluid" src="./Marketing_files/plane.png" alt="">
</div>
</div>
</div>
</div>
</div>
<div class="white_card mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Recent Activity</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body">
<div id="iq-chart-efficient" style="height: 250px; position: relative;"><div dir="ltr" class="resize-sensor" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div class="resize-sensor-expand" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 487px; height: 260px;"></div></div><div class="resize-sensor-shrink" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 200%; height: 200%;"></div></div></div><div style="width: 100%; height: 100%; position: relative; top: 0.400024px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="group" style="width: 100%; height: 100%; overflow: visible;"><desc>JavaScript chart by amCharts</desc><defs><clippath id="id-174"><rect width="477" height="250"></rect></clippath><lineargradient id="gradient-id-197" x1="1%" x2="99%" y1="59%" y2="41%"><stop stop-color="#474758" offset="0"></stop><stop stop-color="#474758" stop-opacity="1" offset="0.75"></stop><stop stop-color="#3cabff" stop-opacity="1" offset="0.755"></stop></lineargradient><clippath id="id-206"></clippath><filter id="filter-id-179" width="200%" height="200%" x="-50%" y="-50%"><fegaussianblur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></fegaussianblur><feoffset result="offsetBlur" dx="1" dy="1"></feoffset><feflood flood-color="#000000" flood-opacity="0.5"></feflood><fecomposite in2="offsetBlur" operator="in"></fecomposite><femerge><femergenode></femergenode><femergenode in="SourceGraphic"></femergenode></femerge></filter><filter id="filter-id-194" width="120%" height="120%" x="-10%" y="-10%"><fecolormatrix type="saturate" values="0"></fecolormatrix></filter><filter id="filter-id-211" width="200%" height="200%" x="-50%" y="-50%"><fegaussianblur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></fegaussianblur><feoffset result="offsetBlur" dx="1" dy="1"></feoffset><feflood flood-color="#000000" flood-opacity="0.5"></feflood><fecomposite in2="offsetBlur" operator="in"></fecomposite><femerge><femergenode></femergenode><femergenode in="SourceGraphic"></femergenode></femerge></filter></defs><g><g fill="#ffffff" fill-opacity="0"><rect width="477" height="250"></rect></g><g><g role="region" clip-path="url(&quot;#id-174&quot;)" opacity="1" aria-describedby="id-150-description"><g><g><g><g><g><g transform="translate(238.5,125)"><g><g role="menu" opacity="1" aria-describedby="id-201-description"><g><g clip-path="url(&quot;#id-206&quot;)"><g></g></g><g></g><g><g><g stroke-opacity="1" role="menuitem" focusable="true" tabindex="0" fill="#1e3d73" stroke="#1e3d73"><g><g><path d=" M0,0  L0,-94  A6,6,0,0,1,5.9973,-99.82 a99.99999999999999,99.99999999999999,0,0,1,92.4787,82.428 A6,6,0,0,1,93.3813,-10.7675 L0,0 "></path></g><g></g></g></g><g stroke-opacity="1" role="menuitem" focusable="true" tabindex="0" fill="#99f6ca" stroke="#99f6ca"><g><g><path d=" M0,0  L81.9188,-9.4458  A6,6,0,0,1,88.364,-4.1527 a88.46153846153847,88.46153846153847,0,0,1,-48.6612,83.2041 A6,6,0,0,1,31.9296,76.029 L0,0 "></path></g><g></g></g></g><g stroke-opacity="1" role="menuitem" focusable="true" tabindex="0" fill="#ff786f" stroke="#ff786f"><g><g><path d=" M0,0  L27.4618,65.3906  A6,6,0,0,1,24.1667,73.0283 a76.92307692307692,76.92307692307692,0,0,1,-70.3745,-11.5303 A6,6,0,0,1,-46.8933,53.2081 L0,0 "></path></g><g></g></g></g><g stroke-opacity="1" role="menuitem" focusable="true" tabindex="0" fill="#fffa6f" stroke="#fffa6f"><g><g><path d=" M0,0  L-37.9928,43.1089  A6,6,0,0,1,-46.2686,43.4348 a63.46153846153847,63.46153846153847,0,0,1,-17.1815,-42.2303 A6,6,0,0,1,-57.2974,-4.3399 L0,0 "></path></g><g></g></g></g><g stroke-opacity="1" role="menuitem" focusable="true" tabindex="0" fill="#83ff6f" stroke="#83ff6f"><g><g><path d=" M0,0  L-47.326,-3.5847  A6,6,0,0,1,-52.5207,-9.9858 a53.46153846153846,53.46153846153846,0,0,1,13.1026,-26.13 A6,6,0,0,1,-31.181,-35.7819 L0,0 "></path></g><g></g></g></g><g stroke-opacity="1" role="menuitem" focusable="true" tabindex="0" fill="#6fffdd" stroke="#6fffdd"><g><g><path d=" M0,0  L-28.4015,-32.5922  A6,6,0,0,1,-27.5881,-40.7746 a49.23076923076923,49.23076923076923,0,0,1,21.5992,-8.0906 A6,6,0,0,1,0,-43.2308 L0,0 "></path></g><g></g></g></g></g></g><g><g></g></g><g><g></g></g></g><desc id="id-201-description">Series</desc></g></g></g><g transform="translate(238.5,125)"><g><g><g></g></g></g></g></g></g></g></g></g><desc id="id-150-description">Chart</desc></g><g><g><g role="tooltip" visibility="hidden" opacity="0"><g fill="#ffffff" fill-opacity="0.9" stroke-width="1" stroke-opacity="1" stroke="#ffffff" filter="url(&quot;#filter-id-179&quot;)" style="pointer-events: none;" transform="translate(0,6)"><path d="M3,0 L3,0 L0,-6 L13,0 L21,0 a3,3 0 0 1 3,3 L24,8 a3,3 0 0 1 -3,3 L3,11 a3,3 0 0 1 -3,-3 L0,3 a3,3 0 0 1 3,-3"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(12,6)"><g transform="translate(0,7)" display="none"></g></g></g></g><g visibility="hidden" display="none" style="pointer-events: none;"><g fill="#ffffff" opacity="1"><rect width="477" height="250"></rect></g><g><g transform="translate(238.5,125)"><g><g stroke-opacity="1" fill="#f3f3f3" fill-opacity="0.8"><g><g><path d=" M53,0  a53,53,0,0,1,-106,0 a53,53,0,0,1,106,0 M42,0  a42,42,0,0,0,-84,0 a42,42,0,0,0,84,0 L42,0 "></path></g></g></g><g stroke-opacity="1" fill="#000000" fill-opacity="0.2"><g><g><path d=" M50,0  a50,50,0,0,1,-100,0 a50,50,0,0,1,100,0 M45,0  a45,45,0,0,0,-90,0 a45,45,0,0,0,90,0 L45,0 "></path></g></g></g><g fill="#000000" fill-opacity="0.4"><g transform="translate(-15.5,-7)" style="user-select: none;"><text x="0" y="14.40000057220459" dy="-3.888"><tspan>100%</tspan></text></g></g></g></g></g></g><g opacity="0.3" aria-labelledby="id-194-title" filter="url(&quot;#filter-id-194&quot;)" style="cursor: pointer;" transform="translate(0,229)"><g fill="#ffffff" opacity="0"><rect width="66" height="21"></rect></g><g><g shape-rendering="auto" fill="none" stroke-opacity="1" stroke-width="1.7999999999999998" stroke="#3cabff"><path d=" M15,15  C17.4001,15 22.7998,15.0001 27,15 C31.2002,14.9999 33.2999,6 36,6 C38.7001,6 38.6999,10.5 40.5,10.5 C42.3001,10.5 42.2999,6 45,6 C47.7001,6 50.9999,14.9999 54,15 C57.0002,15.0001 58.7999,15 60,15"></path></g><g shape-rendering="auto" fill="none" stroke-opacity="1" stroke-width="1.7999999999999998" stroke="url(&quot;#gradient-id-197&quot;)"><path d=" M6,15  C8.2501,15 9.7498,15.0001 15,15 C20.2502,14.9999 20.7748,3.6 27,3.6 C33.2252,3.6 33.8998,14.9999 39.9,15 C45.9002,15.0001 45.9748,15 51,15 C56.0252,15 57.7499,15 60,15"></path></g></g><title id="id-194-title">Chart created using amCharts library</title></g><g role="tooltip" visibility="hidden" opacity="0"><g fill="#ffffff" fill-opacity="0.9" stroke-width="1" stroke-opacity="1" stroke="#ffffff" filter="url(&quot;#filter-id-211&quot;)" style="pointer-events: none;" transform="translate(0,6)"><path d="M3,0 L3,0 L0,-6 L13,0 L21,0 a3,3 0 0 1 3,3 L24,8 a3,3 0 0 1 -3,3 L3,11 a3,3 0 0 1 -3,-3 L0,3 a3,3 0 0 1 3,-3"></path></g><g><g fill="#ffffff" style="pointer-events: none;" transform="translate(12,6)"><g transform="translate(0,7)" display="none"></g></g></g></g></g></g></g></g></svg></div></div>
</div>
</div>
<div class="white_card mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Recent Activity</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body">
<div class="Activity_timeline">
<ul>
<li>
<div class="activity_bell"></div>
<div class="timeLine_inner d-flex align-items-center">
<div class="activity_wrap d-flex ">
<h6 class="nowrap">5 min ago</h6>
<p>Lorem ipsum dolor sit amet, consectetur </p>
</div>
</div>
</li>
<li>
<div class="activity_bell"></div>
<div class="timeLine_inner d-flex align-items-center">
<div class="activity_wrap d-flex ">
<h6 class="nowrap">5 min ago</h6>
<p>Lorem ipsum dolor sit amet, consectetur </p>
</div>
</div>
</li>
<li>
<div class="activity_bell"></div>
<div class="timeLine_inner d-flex align-items-center">
<div class="activity_wrap d-flex ">
<h6 class="nowrap">5 min ago</h6>
<p>Lorem ipsum dolor sit amet, consectetur </p>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="white_card card_height_100 mb_30 QA_section">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Monthly Invoices</h3>
</div>
<div class="header_more_tool">
<div class="dropdown">
<span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
<i class="ti-more-alt"></i>
</span>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-eye"></i> Action</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-trash"></i> Delete</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-printer"></i> Print</a>
<a class="dropdown-item" href="https://demo.dashboardpack.com/marketing-html/#"> <i class="fa fa-download"></i> Download</a>
</div>
</div>
</div>
</div>
</div>
<div class="white_card_body">
<div class="QA_table table-responsive ">

<table class="table pt-0">
<thead>
<tr>
<th scope="col">Profile</th>
<th scope="col">Activity Type</th>
<th scope="col">Owner</th>
<th scope="col">Task</th>
<th scope="col">Budget</th>
<th scope="col">Priority</th>
<th scope="col">Period</th>
<th scope="col">Status</th>
<th scope="col">Deadline</th>
<th scope="col">Attachment</th>
</tr>
</thead>
<tbody>
<tr>
<td> <img class="user_thumb" src="./Marketing_files/man_1.png" alt=""> </td>
<td>Product</td>
<td class="nowrap">Tom Smitn</td>
<td class="nowrap">Client data test</td>
<td>$125000</td>
<td>High</td>
<td>Oct</td>
<td><img class="check_status" src="./Marketing_files/check.png" alt=""> </td>
<td> 25/10/2020</td>
<td> <button class="btn_1">PDF</button> </td>
</tr>
<tr>
<td> <img class="user_thumb" src="./Marketing_files/man_2.png" alt=""> </td>
<td>Product</td>
<td class="nowrap">Tom Smitn</td>
<td class="nowrap">Client data test</td>
<td>$125000</td>
<td>High</td>
<td>Oct</td>
<td><img class="check_status" src="./Marketing_files/check.png" alt=""> </td>
<td> 25/10/2020</td>
<td> <button class="btn_1">PDF</button> </td>
</tr>
<tr>
<td> <img class="user_thumb" src="./Marketing_files/man_3.png" alt=""> </td>
<td>Product</td>
<td class="nowrap">Tom Smitn</td>
<td class="nowrap">Client data test</td>
<td>$125000</td>
<td>High</td>
<td>Oct</td>
<td><img class="check_status" src="./Marketing_files/check.png" alt=""> </td>
<td> 25/10/2020</td>
<td> <button class="btn_1">PDF</button> </td>
</tr>
<tr>
<td> <img class="user_thumb" src="./Marketing_files/man_4.png" alt=""> </td>
<td>Product</td>
<td class="nowrap">Tom Smitn</td>
<td class="nowrap">Client data test</td>
<td>$125000</td>
<td>High</td>
<td>Oct</td>
<td><img class="check_status" src="./Marketing_files/close.png" alt=""> </td>
<td> 25/10/2020</td>
<td> <button class="btn_1">PDF</button> </td>
</tr>
<tr>
<td> <img class="user_thumb" src="./Marketing_files/man_5.png" alt=""> </td>
<td>Product</td>
<td class="nowrap">Tom Smitn</td>
<td class="nowrap">Client data test</td>
<td>$125000</td>
<td>High</td>
<td>Oct</td>
<td><img class="check_status" src="./Marketing_files/close.png" alt=""> </td>
<td> 25/10/2020</td>
<td> <button class="btn_1">PDF</button> </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="footer_part">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
<p>2020 © Influence - Designed by <a href="https://demo.dashboardpack.com/marketing-html/#"> <i class="ti-heart"></i> </a><a href="https://demo.dashboardpack.com/marketing-html/#"> Dashboard</a></p>
</div>
</div>
</div>
</div>
</div>
</section>


<div class="CHAT_MESSAGE_POPUPBOX">
<div class="CHAT_POPUP_HEADER">
<div class="MSEESAGE_CHATBOX_CLOSE">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.09939 5.98831L11.772 10.661C12.076 10.965 12.076 11.4564 11.772 11.7603C11.468 12.0643 10.9766 12.0643 10.6726 11.7603L5.99994 7.08762L1.32737 11.7603C1.02329 12.0643 0.532002 12.0643 0.228062 11.7603C-0.0760207 11.4564 -0.0760207 10.965 0.228062 10.661L4.90063 5.98831L0.228062 1.3156C-0.0760207 1.01166 -0.0760207 0.520226 0.228062 0.216286C0.379534 0.0646715 0.578697 -0.0114918 0.777717 -0.0114918C0.976738 -0.0114918 1.17576 0.0646715 1.32737 0.216286L5.99994 4.889L10.6726 0.216286C10.8243 0.0646715 11.0233 -0.0114918 11.2223 -0.0114918C11.4213 -0.0114918 11.6203 0.0646715 11.772 0.216286C12.076 0.520226 12.076 1.01166 11.772 1.3156L7.09939 5.98831Z" fill="white"></path>
</svg>
</div>
<h3>Chat with us</h3>
<div class="Chat_Listed_member">
<ul>
<li>
<a href="https://demo.dashboardpack.com/marketing-html/#">
<div class="member_thumb">
<img src="./Marketing_files/1(1).png" alt="">
</div>
</a>
</li>
<li>
<a href="https://demo.dashboardpack.com/marketing-html/#">
<div class="member_thumb">
<img src="./Marketing_files/2.png" alt="">
</div>
</a>
</li>
<li>
<a href="https://demo.dashboardpack.com/marketing-html/#">
<div class="member_thumb">
<img src="./Marketing_files/3.png" alt="">
</div>
</a>
</li>
<li>
<a href="https://demo.dashboardpack.com/marketing-html/#">
<div class="member_thumb">
<img src="./Marketing_files/4.png" alt="">
</div>
</a>
</li>
<li>
<a href="https://demo.dashboardpack.com/marketing-html/#">
<div class="member_thumb">
<img src="./Marketing_files/5(1).png" alt="">
</div>
</a>
</li>
<li>
<a href="https://demo.dashboardpack.com/marketing-html/#">
<div class="member_thumb">
<div class="more_member_count">
<span>90+</span>
</div>
</div>
</a>
</li>
</ul>
</div>
</div>
<div class="CHAT_POPUP_BODY">
<p class="mesaged_send_date">
Sunday, 12 January
</p>
<div class="CHATING_SENDER">
<div class="SMS_thumb">
<img src="./Marketing_files/1(1).png" alt="">
</div>
<div class="SEND_SMS_VIEW">
<p>Hi! Welcome .
How can I help you?</p>
</div>
</div>
<div class="CHATING_SENDER CHATING_RECEIVEr">
<div class="SEND_SMS_VIEW">
<p>Hello</p>
</div>
<div class="SMS_thumb">
<img src="./Marketing_files/1(1).png" alt="">
</div>
</div>
</div>
<div class="CHAT_POPUP_BOTTOM">
<div class="chat_input_box d-flex align-items-center">
<div class="input-group">
<input type="text" class="form-control" placeholder="Write your message" aria-label="Recipient&#39;s username" aria-describedby="basic-addon2">
<div class="input-group-append">
<button class="btn " type="button">

<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.7821 3.21895C14.4908 -1.07281 7.50882 -1.07281 3.2183 3.21792C-1.07304 7.50864 -1.07263 14.4908 3.21872 18.7824C7.50882 23.0729 14.4908 23.0729 18.7817 18.7815C23.0726 14.4908 23.0724 7.50906 18.7821 3.21895ZM17.5813 17.5815C13.9525 21.2103 8.04773 21.2108 4.41871 17.5819C0.78907 13.9525 0.789485 8.04714 4.41871 4.41832C8.04752 0.789719 13.9521 0.789304 17.5817 4.41874C21.2105 8.04755 21.2101 13.9529 17.5813 17.5815ZM6.89503 8.02162C6.89503 7.31138 7.47107 6.73534 8.18131 6.73534C8.89135 6.73534 9.46739 7.31117 9.46739 8.02162C9.46739 8.73228 8.89135 9.30811 8.18131 9.30811C7.47107 9.30811 6.89503 8.73228 6.89503 8.02162ZM12.7274 8.02162C12.7274 7.31138 13.3038 6.73534 14.0141 6.73534C14.7241 6.73534 15.3002 7.31117 15.3002 8.02162C15.3002 8.73228 14.7243 9.30811 14.0141 9.30811C13.3038 9.30811 12.7274 8.73228 12.7274 8.02162ZM15.7683 13.2898C14.9712 15.1332 13.1043 16.3243 11.0126 16.3243C8.8758 16.3243 6.99792 15.1272 6.22834 13.2744C6.09642 12.9573 6.24681 12.593 6.56438 12.4611C6.64238 12.4289 6.72328 12.4136 6.80293 12.4136C7.04687 12.4136 7.27836 12.5577 7.37772 12.7973C7.95376 14.1842 9.38048 15.0799 11.0126 15.0799C12.6077 15.0799 14.0261 14.1836 14.626 12.7959C14.7625 12.4804 15.1288 12.335 15.4441 12.4717C15.7594 12.6084 15.9048 12.9745 15.7683 13.2898Z" fill="#707DB7"></path>
</svg>

</button>
<button class="btn" type="button">

<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11 0.289062C4.92455 0.289062 0 5.08402 0 10.9996C0 16.9152 4.92455 21.7101 11 21.7101C17.0755 21.7101 22 16.9145 22 10.9996C22 5.08472 17.0755 0.289062 11 0.289062ZM11 20.3713C5.68423 20.3713 1.375 16.1755 1.375 10.9996C1.375 5.82371 5.68423 1.62788 11 1.62788C16.3158 1.62788 20.625 5.82371 20.625 10.9996C20.625 16.1755 16.3158 20.3713 11 20.3713ZM15.125 10.3302H11.6875V6.98314C11.6875 6.61363 11.3795 6.31373 11 6.31373C10.6205 6.31373 10.3125 6.61363 10.3125 6.98314V10.3302H6.875C6.4955 10.3302 6.1875 10.6301 6.1875 10.9996C6.1875 11.3691 6.4955 11.669 6.875 11.669H10.3125V15.016C10.3125 15.3855 10.6205 15.6854 11 15.6854C11.3795 15.6854 11.6875 15.3855 11.6875 15.016V11.669H15.125C15.5045 11.669 15.8125 11.3691 15.8125 10.9996C15.8125 10.6301 15.5045 10.3302 15.125 10.3302Z" fill="#707DB7"></path>
</svg>

<input type="file">
</button>
</div>
</div>
</div>
</div>
</div>

<div id="back-top" style="display: none;">
<a title="Go to Top" href="https://demo.dashboardpack.com/marketing-html/#">
<i class="ti-angle-up"></i>
</a>
</div>

<script src="./Marketing_files/jquery1-3.4.1.min.js.download"></script>

<script src="./Marketing_files/popper1.min.js.download"></script>

<script src="./Marketing_files/bootstrap1.min.js.download"></script>

<script src="./Marketing_files/metisMenu.js.download"></script>

<script src="./Marketing_files/jquery.waypoints.min.js.download"></script>

<script src="./Marketing_files/Chart.min.js.download"></script>

<script src="./Marketing_files/jquery.counterup.min.js.download"></script>

<script src="./Marketing_files/jquery.nice-select.min.js.download"></script>

<script src="./Marketing_files/owl.carousel.min.js.download"></script>

<script src="./Marketing_files/jquery.dataTables.min.js.download"></script>
<script src="./Marketing_files/dataTables.responsive.min.js.download"></script>
<script src="./Marketing_files/dataTables.buttons.min.js.download"></script>
<script src="./Marketing_files/buttons.flash.min.js.download"></script>
<script src="./Marketing_files/jszip.min.js.download"></script>
<script src="./Marketing_files/pdfmake.min.js.download"></script>
<script src="./Marketing_files/vfs_fonts.js.download"></script>
<script src="./Marketing_files/buttons.html5.min.js.download"></script>
<script src="./Marketing_files/buttons.print.min.js.download"></script>
<script src="./Marketing_files/Chart.min(1).js.download"></script>

<script src="./Marketing_files/jquery.barfiller.js.download"></script>

<script src="./Marketing_files/tagsinput.js.download"></script>

<script src="./Marketing_files/summernote-bs4.js.download"></script>
<script src="./Marketing_files/amcharts.js.download"></script>

<script src="./Marketing_files/perfect-scrollbar.min.js.download"></script>
<script src="./Marketing_files/scrollable-custom.js.download"></script>
<script src="./Marketing_files/core.js.download"></script>
<script src="./Marketing_files/charts.js.download"></script>
<script src="./Marketing_files/animated.js.download"></script>
<script src="./Marketing_files/kelly.js.download"></script>
<script src="./Marketing_files/chart-custom.js.download"></script>

<script src="./Marketing_files/custom.js.download"></script>


<div hidden=""><div style="width: 100%; height: 100%; position: relative;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="group" style="width: 100%; height: 100%; overflow: visible;"><desc>JavaScript chart by amCharts</desc><defs><clippath id="id-119"><path></path></clippath><clippath id="id-163"></clippath><filter id="filter-id-168" width="200%" height="200%" x="-50%" y="-50%"><fegaussianblur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></fegaussianblur><feoffset result="offsetBlur" dx="1" dy="1"></feoffset><feflood flood-color="#000000" flood-opacity="0.5"></feflood><fecomposite in2="offsetBlur" operator="in"></fecomposite><femerge><femergenode></femergenode><femergenode in="SourceGraphic"></femergenode></femerge></filter><filter id="filter-id-124" width="200%" height="200%" x="-50%" y="-50%"><fegaussianblur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></fegaussianblur><feoffset result="offsetBlur" dx="1" dy="1"></feoffset><feflood flood-color="#000000" flood-opacity="0.5"></feflood><fecomposite in2="offsetBlur" operator="in"></fecomposite><femerge><femergenode></femergenode><femergenode in="SourceGraphic"></femergenode></femerge></filter></defs></svg></div></div><div id="loom-companion-mv3" ext-id="liecbddmkiiihnedobmlmillhodjkdmb"><section id="shadow-host-companion"><template shadowrootmode="open"><div id="inner-shadow-companion"><div class="css-0" id="tooltip-mount-layer-companion"></div><style data-emotion="companion-global"></style><style data-emotion="companion" data-s=""></style><style>
            
    #inner-shadow-companion {
      font-size: 100%;
    }
    #inner-shadow-companion {
      font-family: circular, -apple-system, BlinkMacSystemFont, Segoe UI,
        sans-serif;
      color: var(--lns-color-body);
      
  font-size: var(--lns-fontSize-medium);
  line-height: var(--lns-lineHeight-medium);
;
      font-feature-settings: 'ss08' on;
    }

    #inner-shadow-companion *,
    #inner-shadow-companion *:before,
    #inner-shadow-companion *:after {
      box-sizing: border-box;
    }

    #inner-shadow-companion * {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      letter-spacing: calc(0.6px - 0.05em);
    }

    
    #inner-shadow-companion,
    .theme-light,
    [data-lens-theme="light"] {
      --lns-color-primary: var(--lns-themeLight-color-primary);--lns-color-primaryHover: var(--lns-themeLight-color-primaryHover);--lns-color-primaryActive: var(--lns-themeLight-color-primaryActive);--lns-color-body: var(--lns-themeLight-color-body);--lns-color-bodyDimmed: var(--lns-themeLight-color-bodyDimmed);--lns-color-background: var(--lns-themeLight-color-background);--lns-color-backgroundHover: var(--lns-themeLight-color-backgroundHover);--lns-color-backgroundActive: var(--lns-themeLight-color-backgroundActive);--lns-color-backgroundSecondary: var(--lns-themeLight-color-backgroundSecondary);--lns-color-backgroundSecondary2: var(--lns-themeLight-color-backgroundSecondary2);--lns-color-overlay: var(--lns-themeLight-color-overlay);--lns-color-border: var(--lns-themeLight-color-border);--lns-color-focusRing: var(--lns-themeLight-color-focusRing);--lns-color-record: var(--lns-themeLight-color-record);--lns-color-recordHover: var(--lns-themeLight-color-recordHover);--lns-color-recordActive: var(--lns-themeLight-color-recordActive);--lns-color-info: var(--lns-themeLight-color-info);--lns-color-success: var(--lns-themeLight-color-success);--lns-color-warning: var(--lns-themeLight-color-warning);--lns-color-danger: var(--lns-themeLight-color-danger);--lns-color-dangerHover: var(--lns-themeLight-color-dangerHover);--lns-color-dangerActive: var(--lns-themeLight-color-dangerActive);--lns-color-backdrop: var(--lns-themeLight-color-backdrop);--lns-color-backdropDark: var(--lns-themeLight-color-backdropDark);--lns-color-backdropTwilight: var(--lns-themeLight-color-backdropTwilight);--lns-color-disabledContent: var(--lns-themeLight-color-disabledContent);--lns-color-highlight: var(--lns-themeLight-color-highlight);--lns-color-disabledBackground: var(--lns-themeLight-color-disabledBackground);--lns-color-formFieldBorder: var(--lns-themeLight-color-formFieldBorder);--lns-color-formFieldBackground: var(--lns-themeLight-color-formFieldBackground);--lns-color-buttonBorder: var(--lns-themeLight-color-buttonBorder);--lns-color-upgrade: var(--lns-themeLight-color-upgrade);--lns-color-upgradeHover: var(--lns-themeLight-color-upgradeHover);--lns-color-upgradeActive: var(--lns-themeLight-color-upgradeActive);--lns-color-tabBackground: var(--lns-themeLight-color-tabBackground);--lns-color-discoveryBackground: var(--lns-themeLight-color-discoveryBackground);--lns-color-discoveryLightBackground: var(--lns-themeLight-color-discoveryLightBackground);--lns-color-discoveryTitle: var(--lns-themeLight-color-discoveryTitle);--lns-color-discoveryHighlight: var(--lns-themeLight-color-discoveryHighlight);
    }

    .theme-dark,
    [data-lens-theme="dark"] {
      --lns-color-primary: var(--lns-themeDark-color-primary);--lns-color-primaryHover: var(--lns-themeDark-color-primaryHover);--lns-color-primaryActive: var(--lns-themeDark-color-primaryActive);--lns-color-body: var(--lns-themeDark-color-body);--lns-color-bodyDimmed: var(--lns-themeDark-color-bodyDimmed);--lns-color-background: var(--lns-themeDark-color-background);--lns-color-backgroundHover: var(--lns-themeDark-color-backgroundHover);--lns-color-backgroundActive: var(--lns-themeDark-color-backgroundActive);--lns-color-backgroundSecondary: var(--lns-themeDark-color-backgroundSecondary);--lns-color-backgroundSecondary2: var(--lns-themeDark-color-backgroundSecondary2);--lns-color-overlay: var(--lns-themeDark-color-overlay);--lns-color-border: var(--lns-themeDark-color-border);--lns-color-focusRing: var(--lns-themeDark-color-focusRing);--lns-color-record: var(--lns-themeDark-color-record);--lns-color-recordHover: var(--lns-themeDark-color-recordHover);--lns-color-recordActive: var(--lns-themeDark-color-recordActive);--lns-color-info: var(--lns-themeDark-color-info);--lns-color-success: var(--lns-themeDark-color-success);--lns-color-warning: var(--lns-themeDark-color-warning);--lns-color-danger: var(--lns-themeDark-color-danger);--lns-color-dangerHover: var(--lns-themeDark-color-dangerHover);--lns-color-dangerActive: var(--lns-themeDark-color-dangerActive);--lns-color-backdrop: var(--lns-themeDark-color-backdrop);--lns-color-backdropDark: var(--lns-themeDark-color-backdropDark);--lns-color-backdropTwilight: var(--lns-themeDark-color-backdropTwilight);--lns-color-disabledContent: var(--lns-themeDark-color-disabledContent);--lns-color-highlight: var(--lns-themeDark-color-highlight);--lns-color-disabledBackground: var(--lns-themeDark-color-disabledBackground);--lns-color-formFieldBorder: var(--lns-themeDark-color-formFieldBorder);--lns-color-formFieldBackground: var(--lns-themeDark-color-formFieldBackground);--lns-color-buttonBorder: var(--lns-themeDark-color-buttonBorder);--lns-color-upgrade: var(--lns-themeDark-color-upgrade);--lns-color-upgradeHover: var(--lns-themeDark-color-upgradeHover);--lns-color-upgradeActive: var(--lns-themeDark-color-upgradeActive);--lns-color-tabBackground: var(--lns-themeDark-color-tabBackground);--lns-color-discoveryBackground: var(--lns-themeDark-color-discoveryBackground);--lns-color-discoveryLightBackground: var(--lns-themeDark-color-discoveryLightBackground);--lns-color-discoveryTitle: var(--lns-themeDark-color-discoveryTitle);--lns-color-discoveryHighlight: var(--lns-themeDark-color-discoveryHighlight);
    }
  

    
    #inner-shadow-companion {
      --lns-fontWeight-book:400;--lns-fontWeight-bold:700;--lns-unit:0.5rem;--lns-fontSize-small:calc(1.5 * var(--lns-unit, 8px));--lns-lineHeight-small:1.5;--lns-fontSize-body-sm:calc(1.5 * var(--lns-unit, 8px));--lns-lineHeight-body-sm:1.5;--lns-fontSize-medium:calc(1.75 * var(--lns-unit, 8px));--lns-lineHeight-medium:1.6;--lns-fontSize-body-md:calc(1.75 * var(--lns-unit, 8px));--lns-lineHeight-body-md:1.6;--lns-fontSize-large:calc(2.25 * var(--lns-unit, 8px));--lns-lineHeight-large:1.45;--lns-fontSize-body-lg:calc(2.25 * var(--lns-unit, 8px));--lns-lineHeight-body-lg:1.45;--lns-fontSize-xlarge:calc(3 * var(--lns-unit, 8px));--lns-lineHeight-xlarge:1.35;--lns-fontSize-heading-sm:calc(3 * var(--lns-unit, 8px));--lns-lineHeight-heading-sm:1.35;--lns-fontSize-xxlarge:calc(4 * var(--lns-unit, 8px));--lns-lineHeight-xxlarge:1.2;--lns-fontSize-heading-md:calc(4 * var(--lns-unit, 8px));--lns-lineHeight-heading-md:1.2;--lns-fontSize-xxxlarge:calc(6 * var(--lns-unit, 8px));--lns-lineHeight-xxxlarge:1.15;--lns-fontSize-heading-lg:calc(6 * var(--lns-unit, 8px));--lns-lineHeight-heading-lg:1.15;--lns-radius-medium:calc(1 * var(--lns-unit, 8px));--lns-radius-large:calc(2 * var(--lns-unit, 8px));--lns-radius-xlarge:calc(3 * var(--lns-unit, 8px));--lns-radius-full:calc(999 * var(--lns-unit, 8px));--lns-shadow-small:0 calc(0.5 * var(--lns-unit, 8px)) calc(1.25 * var(--lns-unit, 8px)) hsla(0, 0%, 0%, 0.05);--lns-shadow-medium:0 calc(0.5 * var(--lns-unit, 8px)) calc(1.25 * var(--lns-unit, 8px)) hsla(0, 0%, 0%, 0.1);--lns-shadow-large:0 calc(0.75 * var(--lns-unit, 8px)) calc(3 * var(--lns-unit, 8px)) hsla(0, 0%, 0%, 0.1);--lns-space-xsmall:calc(0.5 * var(--lns-unit, 8px));--lns-space-small:calc(1 * var(--lns-unit, 8px));--lns-space-medium:calc(2 * var(--lns-unit, 8px));--lns-space-large:calc(3 * var(--lns-unit, 8px));--lns-space-xlarge:calc(5 * var(--lns-unit, 8px));--lns-space-xxlarge:calc(8 * var(--lns-unit, 8px));--lns-formFieldBorderWidth:1px;--lns-formFieldBorderWidthFocus:2px;--lns-formFieldHeight:calc(4.5 * var(--lns-unit, 8px));--lns-formFieldRadius:calc(2.25 * var(--lns-unit, 8px));--lns-formFieldHorizontalPadding:calc(2 * var(--lns-unit, 8px));--lns-formFieldBorderShadow:
    inset 0 0 0 var(--lns-formFieldBorderWidth) var(--lns-color-formFieldBorder)
  ;--lns-formFieldBorderShadowFocus:
    inset 0 0 0 var(--lns-formFieldBorderWidthFocus) var(--lns-color-blurple),
    0 0 0 var(--lns-formFieldBorderWidthFocus) var(--lns-color-focusRing)
  ;--lns-color-red:hsla(11,80%,45%,1);--lns-color-blurpleLight:hsla(240,83.3%,95.3%,1);--lns-color-blurpleMedium:hsla(242,81%,87.6%,1);--lns-color-blurple:hsla(242,88.4%,66.3%,1);--lns-color-blurpleDark:hsla(242,87.6%,62%,1);--lns-color-offWhite:hsla(45,36.4%,95.7%,1);--lns-color-blueLight:hsla(206,58.3%,85.9%,1);--lns-color-blue:hsla(206,100%,73.3%,1);--lns-color-blueDark:hsla(206,29.5%,33.9%,1);--lns-color-orangeLight:hsla(6,100%,89.6%,1);--lns-color-orange:hsla(11,100%,62.2%,1);--lns-color-orangeDark:hsla(11,79.9%,64.9%,1);--lns-color-tealLight:hsla(180,20%,67.6%,1);--lns-color-teal:hsla(180,51.4%,51.6%,1);--lns-color-tealDark:hsla(180,16.2%,22.9%,1);--lns-color-yellowLight:hsla(39,100%,87.8%,1);--lns-color-yellow:hsla(50,100%,57.3%,1);--lns-color-yellowDark:hsla(39,100%,68%,1);--lns-color-grey8:hsla(0,0%,13%,1);--lns-color-grey7:hsla(246,16%,26%,1);--lns-color-grey6:hsla(252,13%,46%,1);--lns-color-grey5:hsla(240,7%,62%,1);--lns-color-grey4:hsla(259,12%,75%,1);--lns-color-grey3:hsla(260,11%,85%,1);--lns-color-grey2:hsla(260,11%,95%,1);--lns-color-grey1:hsla(240,7%,97%,1);--lns-color-white:hsla(0,0%,100%,1);--lns-themeLight-color-primary:hsla(242,88.4%,66.3%,1);--lns-themeLight-color-primaryHover:hsla(242,88.4%,56.3%,1);--lns-themeLight-color-primaryActive:hsla(242,88.4%,45.3%,1);--lns-themeLight-color-body:hsla(0,0%,13%,1);--lns-themeLight-color-bodyDimmed:hsla(252,13%,46%,1);--lns-themeLight-color-background:hsla(0,0%,100%,1);--lns-themeLight-color-backgroundHover:hsla(246,16%,26%,0.1);--lns-themeLight-color-backgroundActive:hsla(246,16%,26%,0.3);--lns-themeLight-color-backgroundSecondary:hsla(246,16%,26%,0.04);--lns-themeLight-color-backgroundSecondary2:hsla(45,34%,78%,0.2);--lns-themeLight-color-overlay:hsla(0,0%,100%,1);--lns-themeLight-color-border:hsla(252,13%,46%,0.2);--lns-themeLight-color-focusRing:hsla(242,88.4%,66.3%,0.5);--lns-themeLight-color-record:hsla(11,100%,62.2%,1);--lns-themeLight-color-recordHover:hsla(11,100%,52.2%,1);--lns-themeLight-color-recordActive:hsla(11,100%,42.2%,1);--lns-themeLight-color-info:hsla(206,100%,73.3%,1);--lns-themeLight-color-success:hsla(180,51.4%,51.6%,1);--lns-themeLight-color-warning:hsla(39,100%,68%,1);--lns-themeLight-color-danger:hsla(11,80%,45%,1);--lns-themeLight-color-dangerHover:hsla(11,80%,38%,1);--lns-themeLight-color-dangerActive:hsla(11,80%,31%,1);--lns-themeLight-color-backdrop:hsla(0,0%,13%,0.5);--lns-themeLight-color-backdropDark:hsla(0,0%,13%,0.9);--lns-themeLight-color-backdropTwilight:hsla(245,44.8%,46.9%,0.8);--lns-themeLight-color-disabledContent:hsla(240,7%,62%,1);--lns-themeLight-color-highlight:hsla(240,83.3%,66.3%,0.15);--lns-themeLight-color-disabledBackground:hsla(260,11%,95%,1);--lns-themeLight-color-formFieldBorder:hsla(260,11%,85%,1);--lns-themeLight-color-formFieldBackground:hsla(0,0%,100%,1);--lns-themeLight-color-buttonBorder:hsla(252,13%,46%,0.25);--lns-themeLight-color-upgrade:hsla(206,100%,93%,1);--lns-themeLight-color-upgradeHover:hsla(206,100%,85%,1);--lns-themeLight-color-upgradeActive:hsla(206,100%,77%,1);--lns-themeLight-color-tabBackground:hsla(252,13%,46%,0.15);--lns-themeLight-color-discoveryBackground:hsla(206,100%,93%,1);--lns-themeLight-color-discoveryLightBackground:hsla(206,100%,97%,1);--lns-themeLight-color-discoveryTitle:hsla(0,0%,13%,1);--lns-themeLight-color-discoveryHighlight:hsla(206,100%,77%,0.3);--lns-themeDark-color-primary:hsla(242,87%,73%,1);--lns-themeDark-color-primaryHover:hsla(242,88.4%,56.3%,1);--lns-themeDark-color-primaryActive:hsla(242,88.4%,45.3%,1);--lns-themeDark-color-body:hsla(240,7%,97%,1);--lns-themeDark-color-bodyDimmed:hsla(240,7%,62%,1);--lns-themeDark-color-background:hsla(0,0%,13%,1);--lns-themeDark-color-backgroundHover:hsla(0,0%,100%,0.1);--lns-themeDark-color-backgroundActive:hsla(0,0%,100%,0.2);--lns-themeDark-color-backgroundSecondary:hsla(0,0%,100%,0.04);--lns-themeDark-color-backgroundSecondary2:hsla(45,13%,44%,0.2);--lns-themeDark-color-overlay:hsla(0,0%,20%,1);--lns-themeDark-color-border:hsla(259,12%,75%,0.2);--lns-themeDark-color-focusRing:hsla(242,88.4%,66.3%,0.5);--lns-themeDark-color-record:hsla(11,100%,62.2%,1);--lns-themeDark-color-recordHover:hsla(11,100%,52.2%,1);--lns-themeDark-color-recordActive:hsla(11,100%,42.2%,1);--lns-themeDark-color-info:hsla(206,100%,73.3%,1);--lns-themeDark-color-success:hsla(180,51.4%,51.6%,1);--lns-themeDark-color-warning:hsla(39,100%,68%,1);--lns-themeDark-color-danger:hsla(11,80%,45%,1);--lns-themeDark-color-dangerHover:hsla(11,80%,38%,1);--lns-themeDark-color-dangerActive:hsla(11,80%,31%,1);--lns-themeDark-color-backdrop:hsla(0,0%,13%,0.5);--lns-themeDark-color-backdropDark:hsla(0,0%,13%,0.9);--lns-themeDark-color-backdropTwilight:hsla(245,44.8%,46.9%,0.8);--lns-themeDark-color-disabledContent:hsla(240,7%,62%,1);--lns-themeDark-color-highlight:hsla(240,83.3%,66.3%,0.15);--lns-themeDark-color-disabledBackground:hsla(252,13%,23%,1);--lns-themeDark-color-formFieldBorder:hsla(252,13%,46%,1);--lns-themeDark-color-formFieldBackground:hsla(0,0%,13%,1);--lns-themeDark-color-buttonBorder:hsla(0,0%,100%,0.25);--lns-themeDark-color-upgrade:hsla(206,92%,81%,1);--lns-themeDark-color-upgradeHover:hsla(206,92%,74%,1);--lns-themeDark-color-upgradeActive:hsla(206,92%,67%,1);--lns-themeDark-color-tabBackground:hsla(0,0%,100%,0.15);--lns-themeDark-color-discoveryBackground:hsla(206,92%,81%,1);--lns-themeDark-color-discoveryLightBackground:hsla(0,0%,13%,1);--lns-themeDark-color-discoveryTitle:hsla(206,100%,73.3%,1);--lns-themeDark-color-discoveryHighlight:hsla(206,100%,77%,0.3);
    }
  

    .c\:red{color:var(--lns-color-red)}.c\:blurpleLight{color:var(--lns-color-blurpleLight)}.c\:blurpleMedium{color:var(--lns-color-blurpleMedium)}.c\:blurple{color:var(--lns-color-blurple)}.c\:blurpleDark{color:var(--lns-color-blurpleDark)}.c\:offWhite{color:var(--lns-color-offWhite)}.c\:blueLight{color:var(--lns-color-blueLight)}.c\:blue{color:var(--lns-color-blue)}.c\:blueDark{color:var(--lns-color-blueDark)}.c\:orangeLight{color:var(--lns-color-orangeLight)}.c\:orange{color:var(--lns-color-orange)}.c\:orangeDark{color:var(--lns-color-orangeDark)}.c\:tealLight{color:var(--lns-color-tealLight)}.c\:teal{color:var(--lns-color-teal)}.c\:tealDark{color:var(--lns-color-tealDark)}.c\:yellowLight{color:var(--lns-color-yellowLight)}.c\:yellow{color:var(--lns-color-yellow)}.c\:yellowDark{color:var(--lns-color-yellowDark)}.c\:grey8{color:var(--lns-color-grey8)}.c\:grey7{color:var(--lns-color-grey7)}.c\:grey6{color:var(--lns-color-grey6)}.c\:grey5{color:var(--lns-color-grey5)}.c\:grey4{color:var(--lns-color-grey4)}.c\:grey3{color:var(--lns-color-grey3)}.c\:grey2{color:var(--lns-color-grey2)}.c\:grey1{color:var(--lns-color-grey1)}.c\:white{color:var(--lns-color-white)}.c\:primary{color:var(--lns-color-primary)}.c\:primaryHover{color:var(--lns-color-primaryHover)}.c\:primaryActive{color:var(--lns-color-primaryActive)}.c\:body{color:var(--lns-color-body)}.c\:bodyDimmed{color:var(--lns-color-bodyDimmed)}.c\:background{color:var(--lns-color-background)}.c\:backgroundHover{color:var(--lns-color-backgroundHover)}.c\:backgroundActive{color:var(--lns-color-backgroundActive)}.c\:backgroundSecondary{color:var(--lns-color-backgroundSecondary)}.c\:backgroundSecondary2{color:var(--lns-color-backgroundSecondary2)}.c\:overlay{color:var(--lns-color-overlay)}.c\:border{color:var(--lns-color-border)}.c\:focusRing{color:var(--lns-color-focusRing)}.c\:record{color:var(--lns-color-record)}.c\:recordHover{color:var(--lns-color-recordHover)}.c\:recordActive{color:var(--lns-color-recordActive)}.c\:info{color:var(--lns-color-info)}.c\:success{color:var(--lns-color-success)}.c\:warning{color:var(--lns-color-warning)}.c\:danger{color:var(--lns-color-danger)}.c\:dangerHover{color:var(--lns-color-dangerHover)}.c\:dangerActive{color:var(--lns-color-dangerActive)}.c\:backdrop{color:var(--lns-color-backdrop)}.c\:backdropDark{color:var(--lns-color-backdropDark)}.c\:backdropTwilight{color:var(--lns-color-backdropTwilight)}.c\:disabledContent{color:var(--lns-color-disabledContent)}.c\:highlight{color:var(--lns-color-highlight)}.c\:disabledBackground{color:var(--lns-color-disabledBackground)}.c\:formFieldBorder{color:var(--lns-color-formFieldBorder)}.c\:formFieldBackground{color:var(--lns-color-formFieldBackground)}.c\:buttonBorder{color:var(--lns-color-buttonBorder)}.c\:upgrade{color:var(--lns-color-upgrade)}.c\:upgradeHover{color:var(--lns-color-upgradeHover)}.c\:upgradeActive{color:var(--lns-color-upgradeActive)}.c\:tabBackground{color:var(--lns-color-tabBackground)}.c\:discoveryBackground{color:var(--lns-color-discoveryBackground)}.c\:discoveryLightBackground{color:var(--lns-color-discoveryLightBackground)}.c\:discoveryTitle{color:var(--lns-color-discoveryTitle)}.c\:discoveryHighlight{color:var(--lns-color-discoveryHighlight)}.shadow\:small{box-shadow:var(--lns-shadow-small)}.shadow\:medium{box-shadow:var(--lns-shadow-medium)}.shadow\:large{box-shadow:var(--lns-shadow-large)}.radius\:medium{border-radius:var(--lns-radius-medium)}.radius\:large{border-radius:var(--lns-radius-large)}.radius\:xlarge{border-radius:var(--lns-radius-xlarge)}.radius\:full{border-radius:var(--lns-radius-full)}.bgc\:red{background-color:var(--lns-color-red)}.bgc\:blurpleLight{background-color:var(--lns-color-blurpleLight)}.bgc\:blurpleMedium{background-color:var(--lns-color-blurpleMedium)}.bgc\:blurple{background-color:var(--lns-color-blurple)}.bgc\:blurpleDark{background-color:var(--lns-color-blurpleDark)}.bgc\:offWhite{background-color:var(--lns-color-offWhite)}.bgc\:blueLight{background-color:var(--lns-color-blueLight)}.bgc\:blue{background-color:var(--lns-color-blue)}.bgc\:blueDark{background-color:var(--lns-color-blueDark)}.bgc\:orangeLight{background-color:var(--lns-color-orangeLight)}.bgc\:orange{background-color:var(--lns-color-orange)}.bgc\:orangeDark{background-color:var(--lns-color-orangeDark)}.bgc\:tealLight{background-color:var(--lns-color-tealLight)}.bgc\:teal{background-color:var(--lns-color-teal)}.bgc\:tealDark{background-color:var(--lns-color-tealDark)}.bgc\:yellowLight{background-color:var(--lns-color-yellowLight)}.bgc\:yellow{background-color:var(--lns-color-yellow)}.bgc\:yellowDark{background-color:var(--lns-color-yellowDark)}.bgc\:grey8{background-color:var(--lns-color-grey8)}.bgc\:grey7{background-color:var(--lns-color-grey7)}.bgc\:grey6{background-color:var(--lns-color-grey6)}.bgc\:grey5{background-color:var(--lns-color-grey5)}.bgc\:grey4{background-color:var(--lns-color-grey4)}.bgc\:grey3{background-color:var(--lns-color-grey3)}.bgc\:grey2{background-color:var(--lns-color-grey2)}.bgc\:grey1{background-color:var(--lns-color-grey1)}.bgc\:white{background-color:var(--lns-color-white)}.bgc\:primary{background-color:var(--lns-color-primary)}.bgc\:primaryHover{background-color:var(--lns-color-primaryHover)}.bgc\:primaryActive{background-color:var(--lns-color-primaryActive)}.bgc\:body{background-color:var(--lns-color-body)}.bgc\:bodyDimmed{background-color:var(--lns-color-bodyDimmed)}.bgc\:background{background-color:var(--lns-color-background)}.bgc\:backgroundHover{background-color:var(--lns-color-backgroundHover)}.bgc\:backgroundActive{background-color:var(--lns-color-backgroundActive)}.bgc\:backgroundSecondary{background-color:var(--lns-color-backgroundSecondary)}.bgc\:backgroundSecondary2{background-color:var(--lns-color-backgroundSecondary2)}.bgc\:overlay{background-color:var(--lns-color-overlay)}.bgc\:border{background-color:var(--lns-color-border)}.bgc\:focusRing{background-color:var(--lns-color-focusRing)}.bgc\:record{background-color:var(--lns-color-record)}.bgc\:recordHover{background-color:var(--lns-color-recordHover)}.bgc\:recordActive{background-color:var(--lns-color-recordActive)}.bgc\:info{background-color:var(--lns-color-info)}.bgc\:success{background-color:var(--lns-color-success)}.bgc\:warning{background-color:var(--lns-color-warning)}.bgc\:danger{background-color:var(--lns-color-danger)}.bgc\:dangerHover{background-color:var(--lns-color-dangerHover)}.bgc\:dangerActive{background-color:var(--lns-color-dangerActive)}.bgc\:backdrop{background-color:var(--lns-color-backdrop)}.bgc\:backdropDark{background-color:var(--lns-color-backdropDark)}.bgc\:backdropTwilight{background-color:var(--lns-color-backdropTwilight)}.bgc\:disabledContent{background-color:var(--lns-color-disabledContent)}.bgc\:highlight{background-color:var(--lns-color-highlight)}.bgc\:disabledBackground{background-color:var(--lns-color-disabledBackground)}.bgc\:formFieldBorder{background-color:var(--lns-color-formFieldBorder)}.bgc\:formFieldBackground{background-color:var(--lns-color-formFieldBackground)}.bgc\:buttonBorder{background-color:var(--lns-color-buttonBorder)}.bgc\:upgrade{background-color:var(--lns-color-upgrade)}.bgc\:upgradeHover{background-color:var(--lns-color-upgradeHover)}.bgc\:upgradeActive{background-color:var(--lns-color-upgradeActive)}.bgc\:tabBackground{background-color:var(--lns-color-tabBackground)}.bgc\:discoveryBackground{background-color:var(--lns-color-discoveryBackground)}.bgc\:discoveryLightBackground{background-color:var(--lns-color-discoveryLightBackground)}.bgc\:discoveryTitle{background-color:var(--lns-color-discoveryTitle)}.bgc\:discoveryHighlight{background-color:var(--lns-color-discoveryHighlight)}.m\:0{margin:0}.m\:auto{margin:auto}.m\:xsmall{margin:var(--lns-space-xsmall)}.m\:small{margin:var(--lns-space-small)}.m\:medium{margin:var(--lns-space-medium)}.m\:large{margin:var(--lns-space-large)}.m\:xlarge{margin:var(--lns-space-xlarge)}.m\:xxlarge{margin:var(--lns-space-xxlarge)}.mt\:0{margin-top:0}.mt\:auto{margin-top:auto}.mt\:xsmall{margin-top:var(--lns-space-xsmall)}.mt\:small{margin-top:var(--lns-space-small)}.mt\:medium{margin-top:var(--lns-space-medium)}.mt\:large{margin-top:var(--lns-space-large)}.mt\:xlarge{margin-top:var(--lns-space-xlarge)}.mt\:xxlarge{margin-top:var(--lns-space-xxlarge)}.mb\:0{margin-bottom:0}.mb\:auto{margin-bottom:auto}.mb\:xsmall{margin-bottom:var(--lns-space-xsmall)}.mb\:small{margin-bottom:var(--lns-space-small)}.mb\:medium{margin-bottom:var(--lns-space-medium)}.mb\:large{margin-bottom:var(--lns-space-large)}.mb\:xlarge{margin-bottom:var(--lns-space-xlarge)}.mb\:xxlarge{margin-bottom:var(--lns-space-xxlarge)}.ml\:0{margin-left:0}.ml\:auto{margin-left:auto}.ml\:xsmall{margin-left:var(--lns-space-xsmall)}.ml\:small{margin-left:var(--lns-space-small)}.ml\:medium{margin-left:var(--lns-space-medium)}.ml\:large{margin-left:var(--lns-space-large)}.ml\:xlarge{margin-left:var(--lns-space-xlarge)}.ml\:xxlarge{margin-left:var(--lns-space-xxlarge)}.mr\:0{margin-right:0}.mr\:auto{margin-right:auto}.mr\:xsmall{margin-right:var(--lns-space-xsmall)}.mr\:small{margin-right:var(--lns-space-small)}.mr\:medium{margin-right:var(--lns-space-medium)}.mr\:large{margin-right:var(--lns-space-large)}.mr\:xlarge{margin-right:var(--lns-space-xlarge)}.mr\:xxlarge{margin-right:var(--lns-space-xxlarge)}.mx\:0{margin-left:0;margin-right:0}.mx\:auto{margin-left:auto;margin-right:auto}.mx\:xsmall{margin-left:var(--lns-space-xsmall);margin-right:var(--lns-space-xsmall)}.mx\:small{margin-left:var(--lns-space-small);margin-right:var(--lns-space-small)}.mx\:medium{margin-left:var(--lns-space-medium);margin-right:var(--lns-space-medium)}.mx\:large{margin-left:var(--lns-space-large);margin-right:var(--lns-space-large)}.mx\:xlarge{margin-left:var(--lns-space-xlarge);margin-right:var(--lns-space-xlarge)}.mx\:xxlarge{margin-left:var(--lns-space-xxlarge);margin-right:var(--lns-space-xxlarge)}.my\:0{margin-top:0;margin-bottom:0}.my\:auto{margin-top:auto;margin-bottom:auto}.my\:xsmall{margin-top:var(--lns-space-xsmall);margin-bottom:var(--lns-space-xsmall)}.my\:small{margin-top:var(--lns-space-small);margin-bottom:var(--lns-space-small)}.my\:medium{margin-top:var(--lns-space-medium);margin-bottom:var(--lns-space-medium)}.my\:large{margin-top:var(--lns-space-large);margin-bottom:var(--lns-space-large)}.my\:xlarge{margin-top:var(--lns-space-xlarge);margin-bottom:var(--lns-space-xlarge)}.my\:xxlarge{margin-top:var(--lns-space-xxlarge);margin-bottom:var(--lns-space-xxlarge)}.p\:0{padding:0}.p\:xsmall{padding:var(--lns-space-xsmall)}.p\:small{padding:var(--lns-space-small)}.p\:medium{padding:var(--lns-space-medium)}.p\:large{padding:var(--lns-space-large)}.p\:xlarge{padding:var(--lns-space-xlarge)}.p\:xxlarge{padding:var(--lns-space-xxlarge)}.pt\:0{padding-top:0}.pt\:xsmall{padding-top:var(--lns-space-xsmall)}.pt\:small{padding-top:var(--lns-space-small)}.pt\:medium{padding-top:var(--lns-space-medium)}.pt\:large{padding-top:var(--lns-space-large)}.pt\:xlarge{padding-top:var(--lns-space-xlarge)}.pt\:xxlarge{padding-top:var(--lns-space-xxlarge)}.pb\:0{padding-bottom:0}.pb\:xsmall{padding-bottom:var(--lns-space-xsmall)}.pb\:small{padding-bottom:var(--lns-space-small)}.pb\:medium{padding-bottom:var(--lns-space-medium)}.pb\:large{padding-bottom:var(--lns-space-large)}.pb\:xlarge{padding-bottom:var(--lns-space-xlarge)}.pb\:xxlarge{padding-bottom:var(--lns-space-xxlarge)}.pl\:0{padding-left:0}.pl\:xsmall{padding-left:var(--lns-space-xsmall)}.pl\:small{padding-left:var(--lns-space-small)}.pl\:medium{padding-left:var(--lns-space-medium)}.pl\:large{padding-left:var(--lns-space-large)}.pl\:xlarge{padding-left:var(--lns-space-xlarge)}.pl\:xxlarge{padding-left:var(--lns-space-xxlarge)}.pr\:0{padding-right:0}.pr\:xsmall{padding-right:var(--lns-space-xsmall)}.pr\:small{padding-right:var(--lns-space-small)}.pr\:medium{padding-right:var(--lns-space-medium)}.pr\:large{padding-right:var(--lns-space-large)}.pr\:xlarge{padding-right:var(--lns-space-xlarge)}.pr\:xxlarge{padding-right:var(--lns-space-xxlarge)}.px\:0{padding-left:0;padding-right:0}.px\:xsmall{padding-left:var(--lns-space-xsmall);padding-right:var(--lns-space-xsmall)}.px\:small{padding-left:var(--lns-space-small);padding-right:var(--lns-space-small)}.px\:medium{padding-left:var(--lns-space-medium);padding-right:var(--lns-space-medium)}.px\:large{padding-left:var(--lns-space-large);padding-right:var(--lns-space-large)}.px\:xlarge{padding-left:var(--lns-space-xlarge);padding-right:var(--lns-space-xlarge)}.px\:xxlarge{padding-left:var(--lns-space-xxlarge);padding-right:var(--lns-space-xxlarge)}.py\:0{padding-top:0;padding-bottom:0}.py\:xsmall{padding-top:var(--lns-space-xsmall);padding-bottom:var(--lns-space-xsmall)}.py\:small{padding-top:var(--lns-space-small);padding-bottom:var(--lns-space-small)}.py\:medium{padding-top:var(--lns-space-medium);padding-bottom:var(--lns-space-medium)}.py\:large{padding-top:var(--lns-space-large);padding-bottom:var(--lns-space-large)}.py\:xlarge{padding-top:var(--lns-space-xlarge);padding-bottom:var(--lns-space-xlarge)}.py\:xxlarge{padding-top:var(--lns-space-xxlarge);padding-bottom:var(--lns-space-xxlarge)}.text\:small{font-size:var(--lns-fontSize-small);line-height:var(--lns-lineHeight-small)}.text\:body-sm{font-size:var(--lns-fontSize-body-sm);line-height:var(--lns-lineHeight-body-sm)}.text\:medium{font-size:var(--lns-fontSize-medium);line-height:var(--lns-lineHeight-medium)}.text\:body-md{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md)}.text\:large{font-size:var(--lns-fontSize-large);line-height:var(--lns-lineHeight-large)}.text\:body-lg{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg)}.text\:xlarge{font-size:var(--lns-fontSize-xlarge);line-height:var(--lns-lineHeight-xlarge)}.text\:heading-sm{font-size:var(--lns-fontSize-heading-sm);line-height:var(--lns-lineHeight-heading-sm)}.text\:xxlarge{font-size:var(--lns-fontSize-xxlarge);line-height:var(--lns-lineHeight-xxlarge)}.text\:heading-md{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md)}.text\:xxxlarge{font-size:var(--lns-fontSize-xxxlarge);line-height:var(--lns-lineHeight-xxxlarge)}.text\:heading-lg{font-size:var(--lns-fontSize-heading-lg);line-height:var(--lns-lineHeight-heading-lg)}.weight\:book{font-weight:var(--lns-fontWeight-book)}.weight\:bold{font-weight:var(--lns-fontWeight-bold)}.text\:body{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md);font-weight:var(--lns-fontWeight-book)}.text\:title{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg);font-weight:var(--lns-fontWeight-bold)}.text\:mainTitle{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md);font-weight:var(--lns-fontWeight-bold)}.text\:left{text-align:left}.text\:right{text-align:right}.text\:center{text-align:center}.border{border:1px solid var(--lns-color-border)}.borderTop{border-top:1px solid var(--lns-color-border)}.borderBottom{border-bottom:1px solid var(--lns-color-border)}.borderLeft{border-left:1px solid var(--lns-color-border)}.borderRight{border-right:1px solid var(--lns-color-border)}.inline{display:inline}.block{display:block}.flex{display:flex}.inlineBlock{display:inline-block}.inlineFlex{display:inline-flex}.none{display:none}.flexWrap{flex-wrap:wrap}.flexDirection\:column{flex-direction:column}.flexDirection\:row{flex-direction:row}.items\:stretch{align-items:stretch}.items\:center{align-items:center}.items\:baseline{align-items:baseline}.items\:flexStart{align-items:flex-start}.items\:flexEnd{align-items:flex-end}.items\:selfStart{align-items:self-start}.items\:selfEnd{align-items:self-end}.justify\:flexStart{justify-content:flex-start}.justify\:flexEnd{justify-content:flex-end}.justify\:center{justify-content:center}.justify\:spaceBetween{justify-content:space-between}.justify\:spaceAround{justify-content:space-around}.justify\:spaceEvenly{justify-content:space-evenly}.grow\:0{flex-grow:0}.grow\:1{flex-grow:1}.shrink\:0{flex-shrink:0}.shrink\:1{flex-shrink:1}.self\:auto{align-self:auto}.self\:flexStart{align-self:flex-start}.self\:flexEnd{align-self:flex-end}.self\:center{align-self:center}.self\:baseline{align-self:baseline}.self\:stretch{align-self:stretch}.overflow\:hidden{overflow:hidden}.overflow\:auto{overflow:auto}.relative{position:relative}.absolute{position:absolute}.sticky{position:sticky}.fixed{position:fixed}.top\:0{top:0}.top\:auto{top:auto}.top\:xsmall{top:var(--lns-space-xsmall)}.top\:small{top:var(--lns-space-small)}.top\:medium{top:var(--lns-space-medium)}.top\:large{top:var(--lns-space-large)}.top\:xlarge{top:var(--lns-space-xlarge)}.top\:xxlarge{top:var(--lns-space-xxlarge)}.bottom\:0{bottom:0}.bottom\:auto{bottom:auto}.bottom\:xsmall{bottom:var(--lns-space-xsmall)}.bottom\:small{bottom:var(--lns-space-small)}.bottom\:medium{bottom:var(--lns-space-medium)}.bottom\:large{bottom:var(--lns-space-large)}.bottom\:xlarge{bottom:var(--lns-space-xlarge)}.bottom\:xxlarge{bottom:var(--lns-space-xxlarge)}.left\:0{left:0}.left\:auto{left:auto}.left\:xsmall{left:var(--lns-space-xsmall)}.left\:small{left:var(--lns-space-small)}.left\:medium{left:var(--lns-space-medium)}.left\:large{left:var(--lns-space-large)}.left\:xlarge{left:var(--lns-space-xlarge)}.left\:xxlarge{left:var(--lns-space-xxlarge)}.right\:0{right:0}.right\:auto{right:auto}.right\:xsmall{right:var(--lns-space-xsmall)}.right\:small{right:var(--lns-space-small)}.right\:medium{right:var(--lns-space-medium)}.right\:large{right:var(--lns-space-large)}.right\:xlarge{right:var(--lns-space-xlarge)}.right\:xxlarge{right:var(--lns-space-xxlarge)}.width\:auto{width:auto}.width\:full{width:100%}.width\:0{width:0}.minWidth\:0{min-width:0}.height\:auto{height:auto}.height\:full{height:100%}.height\:0{height:0}.ellipsis{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.srOnly{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0}@media(min-width:31em){.xs-c\:red{color:var(--lns-color-red)}.xs-c\:blurpleLight{color:var(--lns-color-blurpleLight)}.xs-c\:blurpleMedium{color:var(--lns-color-blurpleMedium)}.xs-c\:blurple{color:var(--lns-color-blurple)}.xs-c\:blurpleDark{color:var(--lns-color-blurpleDark)}.xs-c\:offWhite{color:var(--lns-color-offWhite)}.xs-c\:blueLight{color:var(--lns-color-blueLight)}.xs-c\:blue{color:var(--lns-color-blue)}.xs-c\:blueDark{color:var(--lns-color-blueDark)}.xs-c\:orangeLight{color:var(--lns-color-orangeLight)}.xs-c\:orange{color:var(--lns-color-orange)}.xs-c\:orangeDark{color:var(--lns-color-orangeDark)}.xs-c\:tealLight{color:var(--lns-color-tealLight)}.xs-c\:teal{color:var(--lns-color-teal)}.xs-c\:tealDark{color:var(--lns-color-tealDark)}.xs-c\:yellowLight{color:var(--lns-color-yellowLight)}.xs-c\:yellow{color:var(--lns-color-yellow)}.xs-c\:yellowDark{color:var(--lns-color-yellowDark)}.xs-c\:grey8{color:var(--lns-color-grey8)}.xs-c\:grey7{color:var(--lns-color-grey7)}.xs-c\:grey6{color:var(--lns-color-grey6)}.xs-c\:grey5{color:var(--lns-color-grey5)}.xs-c\:grey4{color:var(--lns-color-grey4)}.xs-c\:grey3{color:var(--lns-color-grey3)}.xs-c\:grey2{color:var(--lns-color-grey2)}.xs-c\:grey1{color:var(--lns-color-grey1)}.xs-c\:white{color:var(--lns-color-white)}.xs-c\:primary{color:var(--lns-color-primary)}.xs-c\:primaryHover{color:var(--lns-color-primaryHover)}.xs-c\:primaryActive{color:var(--lns-color-primaryActive)}.xs-c\:body{color:var(--lns-color-body)}.xs-c\:bodyDimmed{color:var(--lns-color-bodyDimmed)}.xs-c\:background{color:var(--lns-color-background)}.xs-c\:backgroundHover{color:var(--lns-color-backgroundHover)}.xs-c\:backgroundActive{color:var(--lns-color-backgroundActive)}.xs-c\:backgroundSecondary{color:var(--lns-color-backgroundSecondary)}.xs-c\:backgroundSecondary2{color:var(--lns-color-backgroundSecondary2)}.xs-c\:overlay{color:var(--lns-color-overlay)}.xs-c\:border{color:var(--lns-color-border)}.xs-c\:focusRing{color:var(--lns-color-focusRing)}.xs-c\:record{color:var(--lns-color-record)}.xs-c\:recordHover{color:var(--lns-color-recordHover)}.xs-c\:recordActive{color:var(--lns-color-recordActive)}.xs-c\:info{color:var(--lns-color-info)}.xs-c\:success{color:var(--lns-color-success)}.xs-c\:warning{color:var(--lns-color-warning)}.xs-c\:danger{color:var(--lns-color-danger)}.xs-c\:dangerHover{color:var(--lns-color-dangerHover)}.xs-c\:dangerActive{color:var(--lns-color-dangerActive)}.xs-c\:backdrop{color:var(--lns-color-backdrop)}.xs-c\:backdropDark{color:var(--lns-color-backdropDark)}.xs-c\:backdropTwilight{color:var(--lns-color-backdropTwilight)}.xs-c\:disabledContent{color:var(--lns-color-disabledContent)}.xs-c\:highlight{color:var(--lns-color-highlight)}.xs-c\:disabledBackground{color:var(--lns-color-disabledBackground)}.xs-c\:formFieldBorder{color:var(--lns-color-formFieldBorder)}.xs-c\:formFieldBackground{color:var(--lns-color-formFieldBackground)}.xs-c\:buttonBorder{color:var(--lns-color-buttonBorder)}.xs-c\:upgrade{color:var(--lns-color-upgrade)}.xs-c\:upgradeHover{color:var(--lns-color-upgradeHover)}.xs-c\:upgradeActive{color:var(--lns-color-upgradeActive)}.xs-c\:tabBackground{color:var(--lns-color-tabBackground)}.xs-c\:discoveryBackground{color:var(--lns-color-discoveryBackground)}.xs-c\:discoveryLightBackground{color:var(--lns-color-discoveryLightBackground)}.xs-c\:discoveryTitle{color:var(--lns-color-discoveryTitle)}.xs-c\:discoveryHighlight{color:var(--lns-color-discoveryHighlight)}.xs-shadow\:small{box-shadow:var(--lns-shadow-small)}.xs-shadow\:medium{box-shadow:var(--lns-shadow-medium)}.xs-shadow\:large{box-shadow:var(--lns-shadow-large)}.xs-radius\:medium{border-radius:var(--lns-radius-medium)}.xs-radius\:large{border-radius:var(--lns-radius-large)}.xs-radius\:xlarge{border-radius:var(--lns-radius-xlarge)}.xs-radius\:full{border-radius:var(--lns-radius-full)}.xs-bgc\:red{background-color:var(--lns-color-red)}.xs-bgc\:blurpleLight{background-color:var(--lns-color-blurpleLight)}.xs-bgc\:blurpleMedium{background-color:var(--lns-color-blurpleMedium)}.xs-bgc\:blurple{background-color:var(--lns-color-blurple)}.xs-bgc\:blurpleDark{background-color:var(--lns-color-blurpleDark)}.xs-bgc\:offWhite{background-color:var(--lns-color-offWhite)}.xs-bgc\:blueLight{background-color:var(--lns-color-blueLight)}.xs-bgc\:blue{background-color:var(--lns-color-blue)}.xs-bgc\:blueDark{background-color:var(--lns-color-blueDark)}.xs-bgc\:orangeLight{background-color:var(--lns-color-orangeLight)}.xs-bgc\:orange{background-color:var(--lns-color-orange)}.xs-bgc\:orangeDark{background-color:var(--lns-color-orangeDark)}.xs-bgc\:tealLight{background-color:var(--lns-color-tealLight)}.xs-bgc\:teal{background-color:var(--lns-color-teal)}.xs-bgc\:tealDark{background-color:var(--lns-color-tealDark)}.xs-bgc\:yellowLight{background-color:var(--lns-color-yellowLight)}.xs-bgc\:yellow{background-color:var(--lns-color-yellow)}.xs-bgc\:yellowDark{background-color:var(--lns-color-yellowDark)}.xs-bgc\:grey8{background-color:var(--lns-color-grey8)}.xs-bgc\:grey7{background-color:var(--lns-color-grey7)}.xs-bgc\:grey6{background-color:var(--lns-color-grey6)}.xs-bgc\:grey5{background-color:var(--lns-color-grey5)}.xs-bgc\:grey4{background-color:var(--lns-color-grey4)}.xs-bgc\:grey3{background-color:var(--lns-color-grey3)}.xs-bgc\:grey2{background-color:var(--lns-color-grey2)}.xs-bgc\:grey1{background-color:var(--lns-color-grey1)}.xs-bgc\:white{background-color:var(--lns-color-white)}.xs-bgc\:primary{background-color:var(--lns-color-primary)}.xs-bgc\:primaryHover{background-color:var(--lns-color-primaryHover)}.xs-bgc\:primaryActive{background-color:var(--lns-color-primaryActive)}.xs-bgc\:body{background-color:var(--lns-color-body)}.xs-bgc\:bodyDimmed{background-color:var(--lns-color-bodyDimmed)}.xs-bgc\:background{background-color:var(--lns-color-background)}.xs-bgc\:backgroundHover{background-color:var(--lns-color-backgroundHover)}.xs-bgc\:backgroundActive{background-color:var(--lns-color-backgroundActive)}.xs-bgc\:backgroundSecondary{background-color:var(--lns-color-backgroundSecondary)}.xs-bgc\:backgroundSecondary2{background-color:var(--lns-color-backgroundSecondary2)}.xs-bgc\:overlay{background-color:var(--lns-color-overlay)}.xs-bgc\:border{background-color:var(--lns-color-border)}.xs-bgc\:focusRing{background-color:var(--lns-color-focusRing)}.xs-bgc\:record{background-color:var(--lns-color-record)}.xs-bgc\:recordHover{background-color:var(--lns-color-recordHover)}.xs-bgc\:recordActive{background-color:var(--lns-color-recordActive)}.xs-bgc\:info{background-color:var(--lns-color-info)}.xs-bgc\:success{background-color:var(--lns-color-success)}.xs-bgc\:warning{background-color:var(--lns-color-warning)}.xs-bgc\:danger{background-color:var(--lns-color-danger)}.xs-bgc\:dangerHover{background-color:var(--lns-color-dangerHover)}.xs-bgc\:dangerActive{background-color:var(--lns-color-dangerActive)}.xs-bgc\:backdrop{background-color:var(--lns-color-backdrop)}.xs-bgc\:backdropDark{background-color:var(--lns-color-backdropDark)}.xs-bgc\:backdropTwilight{background-color:var(--lns-color-backdropTwilight)}.xs-bgc\:disabledContent{background-color:var(--lns-color-disabledContent)}.xs-bgc\:highlight{background-color:var(--lns-color-highlight)}.xs-bgc\:disabledBackground{background-color:var(--lns-color-disabledBackground)}.xs-bgc\:formFieldBorder{background-color:var(--lns-color-formFieldBorder)}.xs-bgc\:formFieldBackground{background-color:var(--lns-color-formFieldBackground)}.xs-bgc\:buttonBorder{background-color:var(--lns-color-buttonBorder)}.xs-bgc\:upgrade{background-color:var(--lns-color-upgrade)}.xs-bgc\:upgradeHover{background-color:var(--lns-color-upgradeHover)}.xs-bgc\:upgradeActive{background-color:var(--lns-color-upgradeActive)}.xs-bgc\:tabBackground{background-color:var(--lns-color-tabBackground)}.xs-bgc\:discoveryBackground{background-color:var(--lns-color-discoveryBackground)}.xs-bgc\:discoveryLightBackground{background-color:var(--lns-color-discoveryLightBackground)}.xs-bgc\:discoveryTitle{background-color:var(--lns-color-discoveryTitle)}.xs-bgc\:discoveryHighlight{background-color:var(--lns-color-discoveryHighlight)}.xs-m\:0{margin:0}.xs-m\:auto{margin:auto}.xs-m\:xsmall{margin:var(--lns-space-xsmall)}.xs-m\:small{margin:var(--lns-space-small)}.xs-m\:medium{margin:var(--lns-space-medium)}.xs-m\:large{margin:var(--lns-space-large)}.xs-m\:xlarge{margin:var(--lns-space-xlarge)}.xs-m\:xxlarge{margin:var(--lns-space-xxlarge)}.xs-mt\:0{margin-top:0}.xs-mt\:auto{margin-top:auto}.xs-mt\:xsmall{margin-top:var(--lns-space-xsmall)}.xs-mt\:small{margin-top:var(--lns-space-small)}.xs-mt\:medium{margin-top:var(--lns-space-medium)}.xs-mt\:large{margin-top:var(--lns-space-large)}.xs-mt\:xlarge{margin-top:var(--lns-space-xlarge)}.xs-mt\:xxlarge{margin-top:var(--lns-space-xxlarge)}.xs-mb\:0{margin-bottom:0}.xs-mb\:auto{margin-bottom:auto}.xs-mb\:xsmall{margin-bottom:var(--lns-space-xsmall)}.xs-mb\:small{margin-bottom:var(--lns-space-small)}.xs-mb\:medium{margin-bottom:var(--lns-space-medium)}.xs-mb\:large{margin-bottom:var(--lns-space-large)}.xs-mb\:xlarge{margin-bottom:var(--lns-space-xlarge)}.xs-mb\:xxlarge{margin-bottom:var(--lns-space-xxlarge)}.xs-ml\:0{margin-left:0}.xs-ml\:auto{margin-left:auto}.xs-ml\:xsmall{margin-left:var(--lns-space-xsmall)}.xs-ml\:small{margin-left:var(--lns-space-small)}.xs-ml\:medium{margin-left:var(--lns-space-medium)}.xs-ml\:large{margin-left:var(--lns-space-large)}.xs-ml\:xlarge{margin-left:var(--lns-space-xlarge)}.xs-ml\:xxlarge{margin-left:var(--lns-space-xxlarge)}.xs-mr\:0{margin-right:0}.xs-mr\:auto{margin-right:auto}.xs-mr\:xsmall{margin-right:var(--lns-space-xsmall)}.xs-mr\:small{margin-right:var(--lns-space-small)}.xs-mr\:medium{margin-right:var(--lns-space-medium)}.xs-mr\:large{margin-right:var(--lns-space-large)}.xs-mr\:xlarge{margin-right:var(--lns-space-xlarge)}.xs-mr\:xxlarge{margin-right:var(--lns-space-xxlarge)}.xs-mx\:0{margin-left:0;margin-right:0}.xs-mx\:auto{margin-left:auto;margin-right:auto}.xs-mx\:xsmall{margin-left:var(--lns-space-xsmall);margin-right:var(--lns-space-xsmall)}.xs-mx\:small{margin-left:var(--lns-space-small);margin-right:var(--lns-space-small)}.xs-mx\:medium{margin-left:var(--lns-space-medium);margin-right:var(--lns-space-medium)}.xs-mx\:large{margin-left:var(--lns-space-large);margin-right:var(--lns-space-large)}.xs-mx\:xlarge{margin-left:var(--lns-space-xlarge);margin-right:var(--lns-space-xlarge)}.xs-mx\:xxlarge{margin-left:var(--lns-space-xxlarge);margin-right:var(--lns-space-xxlarge)}.xs-my\:0{margin-top:0;margin-bottom:0}.xs-my\:auto{margin-top:auto;margin-bottom:auto}.xs-my\:xsmall{margin-top:var(--lns-space-xsmall);margin-bottom:var(--lns-space-xsmall)}.xs-my\:small{margin-top:var(--lns-space-small);margin-bottom:var(--lns-space-small)}.xs-my\:medium{margin-top:var(--lns-space-medium);margin-bottom:var(--lns-space-medium)}.xs-my\:large{margin-top:var(--lns-space-large);margin-bottom:var(--lns-space-large)}.xs-my\:xlarge{margin-top:var(--lns-space-xlarge);margin-bottom:var(--lns-space-xlarge)}.xs-my\:xxlarge{margin-top:var(--lns-space-xxlarge);margin-bottom:var(--lns-space-xxlarge)}.xs-p\:0{padding:0}.xs-p\:xsmall{padding:var(--lns-space-xsmall)}.xs-p\:small{padding:var(--lns-space-small)}.xs-p\:medium{padding:var(--lns-space-medium)}.xs-p\:large{padding:var(--lns-space-large)}.xs-p\:xlarge{padding:var(--lns-space-xlarge)}.xs-p\:xxlarge{padding:var(--lns-space-xxlarge)}.xs-pt\:0{padding-top:0}.xs-pt\:xsmall{padding-top:var(--lns-space-xsmall)}.xs-pt\:small{padding-top:var(--lns-space-small)}.xs-pt\:medium{padding-top:var(--lns-space-medium)}.xs-pt\:large{padding-top:var(--lns-space-large)}.xs-pt\:xlarge{padding-top:var(--lns-space-xlarge)}.xs-pt\:xxlarge{padding-top:var(--lns-space-xxlarge)}.xs-pb\:0{padding-bottom:0}.xs-pb\:xsmall{padding-bottom:var(--lns-space-xsmall)}.xs-pb\:small{padding-bottom:var(--lns-space-small)}.xs-pb\:medium{padding-bottom:var(--lns-space-medium)}.xs-pb\:large{padding-bottom:var(--lns-space-large)}.xs-pb\:xlarge{padding-bottom:var(--lns-space-xlarge)}.xs-pb\:xxlarge{padding-bottom:var(--lns-space-xxlarge)}.xs-pl\:0{padding-left:0}.xs-pl\:xsmall{padding-left:var(--lns-space-xsmall)}.xs-pl\:small{padding-left:var(--lns-space-small)}.xs-pl\:medium{padding-left:var(--lns-space-medium)}.xs-pl\:large{padding-left:var(--lns-space-large)}.xs-pl\:xlarge{padding-left:var(--lns-space-xlarge)}.xs-pl\:xxlarge{padding-left:var(--lns-space-xxlarge)}.xs-pr\:0{padding-right:0}.xs-pr\:xsmall{padding-right:var(--lns-space-xsmall)}.xs-pr\:small{padding-right:var(--lns-space-small)}.xs-pr\:medium{padding-right:var(--lns-space-medium)}.xs-pr\:large{padding-right:var(--lns-space-large)}.xs-pr\:xlarge{padding-right:var(--lns-space-xlarge)}.xs-pr\:xxlarge{padding-right:var(--lns-space-xxlarge)}.xs-px\:0{padding-left:0;padding-right:0}.xs-px\:xsmall{padding-left:var(--lns-space-xsmall);padding-right:var(--lns-space-xsmall)}.xs-px\:small{padding-left:var(--lns-space-small);padding-right:var(--lns-space-small)}.xs-px\:medium{padding-left:var(--lns-space-medium);padding-right:var(--lns-space-medium)}.xs-px\:large{padding-left:var(--lns-space-large);padding-right:var(--lns-space-large)}.xs-px\:xlarge{padding-left:var(--lns-space-xlarge);padding-right:var(--lns-space-xlarge)}.xs-px\:xxlarge{padding-left:var(--lns-space-xxlarge);padding-right:var(--lns-space-xxlarge)}.xs-py\:0{padding-top:0;padding-bottom:0}.xs-py\:xsmall{padding-top:var(--lns-space-xsmall);padding-bottom:var(--lns-space-xsmall)}.xs-py\:small{padding-top:var(--lns-space-small);padding-bottom:var(--lns-space-small)}.xs-py\:medium{padding-top:var(--lns-space-medium);padding-bottom:var(--lns-space-medium)}.xs-py\:large{padding-top:var(--lns-space-large);padding-bottom:var(--lns-space-large)}.xs-py\:xlarge{padding-top:var(--lns-space-xlarge);padding-bottom:var(--lns-space-xlarge)}.xs-py\:xxlarge{padding-top:var(--lns-space-xxlarge);padding-bottom:var(--lns-space-xxlarge)}.xs-text\:small{font-size:var(--lns-fontSize-small);line-height:var(--lns-lineHeight-small)}.xs-text\:body-sm{font-size:var(--lns-fontSize-body-sm);line-height:var(--lns-lineHeight-body-sm)}.xs-text\:medium{font-size:var(--lns-fontSize-medium);line-height:var(--lns-lineHeight-medium)}.xs-text\:body-md{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md)}.xs-text\:large{font-size:var(--lns-fontSize-large);line-height:var(--lns-lineHeight-large)}.xs-text\:body-lg{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg)}.xs-text\:xlarge{font-size:var(--lns-fontSize-xlarge);line-height:var(--lns-lineHeight-xlarge)}.xs-text\:heading-sm{font-size:var(--lns-fontSize-heading-sm);line-height:var(--lns-lineHeight-heading-sm)}.xs-text\:xxlarge{font-size:var(--lns-fontSize-xxlarge);line-height:var(--lns-lineHeight-xxlarge)}.xs-text\:heading-md{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md)}.xs-text\:xxxlarge{font-size:var(--lns-fontSize-xxxlarge);line-height:var(--lns-lineHeight-xxxlarge)}.xs-text\:heading-lg{font-size:var(--lns-fontSize-heading-lg);line-height:var(--lns-lineHeight-heading-lg)}.xs-weight\:book{font-weight:var(--lns-fontWeight-book)}.xs-weight\:bold{font-weight:var(--lns-fontWeight-bold)}.xs-text\:body{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md);font-weight:var(--lns-fontWeight-book)}.xs-text\:title{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg);font-weight:var(--lns-fontWeight-bold)}.xs-text\:mainTitle{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md);font-weight:var(--lns-fontWeight-bold)}.xs-text\:left{text-align:left}.xs-text\:right{text-align:right}.xs-text\:center{text-align:center}.xs-border{border:1px solid var(--lns-color-border)}.xs-borderTop{border-top:1px solid var(--lns-color-border)}.xs-borderBottom{border-bottom:1px solid var(--lns-color-border)}.xs-borderLeft{border-left:1px solid var(--lns-color-border)}.xs-borderRight{border-right:1px solid var(--lns-color-border)}.xs-inline{display:inline}.xs-block{display:block}.xs-flex{display:flex}.xs-inlineBlock{display:inline-block}.xs-inlineFlex{display:inline-flex}.xs-none{display:none}.xs-flexWrap{flex-wrap:wrap}.xs-flexDirection\:column{flex-direction:column}.xs-flexDirection\:row{flex-direction:row}.xs-items\:stretch{align-items:stretch}.xs-items\:center{align-items:center}.xs-items\:baseline{align-items:baseline}.xs-items\:flexStart{align-items:flex-start}.xs-items\:flexEnd{align-items:flex-end}.xs-items\:selfStart{align-items:self-start}.xs-items\:selfEnd{align-items:self-end}.xs-justify\:flexStart{justify-content:flex-start}.xs-justify\:flexEnd{justify-content:flex-end}.xs-justify\:center{justify-content:center}.xs-justify\:spaceBetween{justify-content:space-between}.xs-justify\:spaceAround{justify-content:space-around}.xs-justify\:spaceEvenly{justify-content:space-evenly}.xs-grow\:0{flex-grow:0}.xs-grow\:1{flex-grow:1}.xs-shrink\:0{flex-shrink:0}.xs-shrink\:1{flex-shrink:1}.xs-self\:auto{align-self:auto}.xs-self\:flexStart{align-self:flex-start}.xs-self\:flexEnd{align-self:flex-end}.xs-self\:center{align-self:center}.xs-self\:baseline{align-self:baseline}.xs-self\:stretch{align-self:stretch}.xs-overflow\:hidden{overflow:hidden}.xs-overflow\:auto{overflow:auto}.xs-relative{position:relative}.xs-absolute{position:absolute}.xs-sticky{position:sticky}.xs-fixed{position:fixed}.xs-top\:0{top:0}.xs-top\:auto{top:auto}.xs-top\:xsmall{top:var(--lns-space-xsmall)}.xs-top\:small{top:var(--lns-space-small)}.xs-top\:medium{top:var(--lns-space-medium)}.xs-top\:large{top:var(--lns-space-large)}.xs-top\:xlarge{top:var(--lns-space-xlarge)}.xs-top\:xxlarge{top:var(--lns-space-xxlarge)}.xs-bottom\:0{bottom:0}.xs-bottom\:auto{bottom:auto}.xs-bottom\:xsmall{bottom:var(--lns-space-xsmall)}.xs-bottom\:small{bottom:var(--lns-space-small)}.xs-bottom\:medium{bottom:var(--lns-space-medium)}.xs-bottom\:large{bottom:var(--lns-space-large)}.xs-bottom\:xlarge{bottom:var(--lns-space-xlarge)}.xs-bottom\:xxlarge{bottom:var(--lns-space-xxlarge)}.xs-left\:0{left:0}.xs-left\:auto{left:auto}.xs-left\:xsmall{left:var(--lns-space-xsmall)}.xs-left\:small{left:var(--lns-space-small)}.xs-left\:medium{left:var(--lns-space-medium)}.xs-left\:large{left:var(--lns-space-large)}.xs-left\:xlarge{left:var(--lns-space-xlarge)}.xs-left\:xxlarge{left:var(--lns-space-xxlarge)}.xs-right\:0{right:0}.xs-right\:auto{right:auto}.xs-right\:xsmall{right:var(--lns-space-xsmall)}.xs-right\:small{right:var(--lns-space-small)}.xs-right\:medium{right:var(--lns-space-medium)}.xs-right\:large{right:var(--lns-space-large)}.xs-right\:xlarge{right:var(--lns-space-xlarge)}.xs-right\:xxlarge{right:var(--lns-space-xxlarge)}.xs-width\:auto{width:auto}.xs-width\:full{width:100%}.xs-width\:0{width:0}.xs-minWidth\:0{min-width:0}.xs-height\:auto{height:auto}.xs-height\:full{height:100%}.xs-height\:0{height:0}.xs-ellipsis{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.xs-srOnly{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0}}@media(min-width:48em){.sm-c\:red{color:var(--lns-color-red)}.sm-c\:blurpleLight{color:var(--lns-color-blurpleLight)}.sm-c\:blurpleMedium{color:var(--lns-color-blurpleMedium)}.sm-c\:blurple{color:var(--lns-color-blurple)}.sm-c\:blurpleDark{color:var(--lns-color-blurpleDark)}.sm-c\:offWhite{color:var(--lns-color-offWhite)}.sm-c\:blueLight{color:var(--lns-color-blueLight)}.sm-c\:blue{color:var(--lns-color-blue)}.sm-c\:blueDark{color:var(--lns-color-blueDark)}.sm-c\:orangeLight{color:var(--lns-color-orangeLight)}.sm-c\:orange{color:var(--lns-color-orange)}.sm-c\:orangeDark{color:var(--lns-color-orangeDark)}.sm-c\:tealLight{color:var(--lns-color-tealLight)}.sm-c\:teal{color:var(--lns-color-teal)}.sm-c\:tealDark{color:var(--lns-color-tealDark)}.sm-c\:yellowLight{color:var(--lns-color-yellowLight)}.sm-c\:yellow{color:var(--lns-color-yellow)}.sm-c\:yellowDark{color:var(--lns-color-yellowDark)}.sm-c\:grey8{color:var(--lns-color-grey8)}.sm-c\:grey7{color:var(--lns-color-grey7)}.sm-c\:grey6{color:var(--lns-color-grey6)}.sm-c\:grey5{color:var(--lns-color-grey5)}.sm-c\:grey4{color:var(--lns-color-grey4)}.sm-c\:grey3{color:var(--lns-color-grey3)}.sm-c\:grey2{color:var(--lns-color-grey2)}.sm-c\:grey1{color:var(--lns-color-grey1)}.sm-c\:white{color:var(--lns-color-white)}.sm-c\:primary{color:var(--lns-color-primary)}.sm-c\:primaryHover{color:var(--lns-color-primaryHover)}.sm-c\:primaryActive{color:var(--lns-color-primaryActive)}.sm-c\:body{color:var(--lns-color-body)}.sm-c\:bodyDimmed{color:var(--lns-color-bodyDimmed)}.sm-c\:background{color:var(--lns-color-background)}.sm-c\:backgroundHover{color:var(--lns-color-backgroundHover)}.sm-c\:backgroundActive{color:var(--lns-color-backgroundActive)}.sm-c\:backgroundSecondary{color:var(--lns-color-backgroundSecondary)}.sm-c\:backgroundSecondary2{color:var(--lns-color-backgroundSecondary2)}.sm-c\:overlay{color:var(--lns-color-overlay)}.sm-c\:border{color:var(--lns-color-border)}.sm-c\:focusRing{color:var(--lns-color-focusRing)}.sm-c\:record{color:var(--lns-color-record)}.sm-c\:recordHover{color:var(--lns-color-recordHover)}.sm-c\:recordActive{color:var(--lns-color-recordActive)}.sm-c\:info{color:var(--lns-color-info)}.sm-c\:success{color:var(--lns-color-success)}.sm-c\:warning{color:var(--lns-color-warning)}.sm-c\:danger{color:var(--lns-color-danger)}.sm-c\:dangerHover{color:var(--lns-color-dangerHover)}.sm-c\:dangerActive{color:var(--lns-color-dangerActive)}.sm-c\:backdrop{color:var(--lns-color-backdrop)}.sm-c\:backdropDark{color:var(--lns-color-backdropDark)}.sm-c\:backdropTwilight{color:var(--lns-color-backdropTwilight)}.sm-c\:disabledContent{color:var(--lns-color-disabledContent)}.sm-c\:highlight{color:var(--lns-color-highlight)}.sm-c\:disabledBackground{color:var(--lns-color-disabledBackground)}.sm-c\:formFieldBorder{color:var(--lns-color-formFieldBorder)}.sm-c\:formFieldBackground{color:var(--lns-color-formFieldBackground)}.sm-c\:buttonBorder{color:var(--lns-color-buttonBorder)}.sm-c\:upgrade{color:var(--lns-color-upgrade)}.sm-c\:upgradeHover{color:var(--lns-color-upgradeHover)}.sm-c\:upgradeActive{color:var(--lns-color-upgradeActive)}.sm-c\:tabBackground{color:var(--lns-color-tabBackground)}.sm-c\:discoveryBackground{color:var(--lns-color-discoveryBackground)}.sm-c\:discoveryLightBackground{color:var(--lns-color-discoveryLightBackground)}.sm-c\:discoveryTitle{color:var(--lns-color-discoveryTitle)}.sm-c\:discoveryHighlight{color:var(--lns-color-discoveryHighlight)}.sm-shadow\:small{box-shadow:var(--lns-shadow-small)}.sm-shadow\:medium{box-shadow:var(--lns-shadow-medium)}.sm-shadow\:large{box-shadow:var(--lns-shadow-large)}.sm-radius\:medium{border-radius:var(--lns-radius-medium)}.sm-radius\:large{border-radius:var(--lns-radius-large)}.sm-radius\:xlarge{border-radius:var(--lns-radius-xlarge)}.sm-radius\:full{border-radius:var(--lns-radius-full)}.sm-bgc\:red{background-color:var(--lns-color-red)}.sm-bgc\:blurpleLight{background-color:var(--lns-color-blurpleLight)}.sm-bgc\:blurpleMedium{background-color:var(--lns-color-blurpleMedium)}.sm-bgc\:blurple{background-color:var(--lns-color-blurple)}.sm-bgc\:blurpleDark{background-color:var(--lns-color-blurpleDark)}.sm-bgc\:offWhite{background-color:var(--lns-color-offWhite)}.sm-bgc\:blueLight{background-color:var(--lns-color-blueLight)}.sm-bgc\:blue{background-color:var(--lns-color-blue)}.sm-bgc\:blueDark{background-color:var(--lns-color-blueDark)}.sm-bgc\:orangeLight{background-color:var(--lns-color-orangeLight)}.sm-bgc\:orange{background-color:var(--lns-color-orange)}.sm-bgc\:orangeDark{background-color:var(--lns-color-orangeDark)}.sm-bgc\:tealLight{background-color:var(--lns-color-tealLight)}.sm-bgc\:teal{background-color:var(--lns-color-teal)}.sm-bgc\:tealDark{background-color:var(--lns-color-tealDark)}.sm-bgc\:yellowLight{background-color:var(--lns-color-yellowLight)}.sm-bgc\:yellow{background-color:var(--lns-color-yellow)}.sm-bgc\:yellowDark{background-color:var(--lns-color-yellowDark)}.sm-bgc\:grey8{background-color:var(--lns-color-grey8)}.sm-bgc\:grey7{background-color:var(--lns-color-grey7)}.sm-bgc\:grey6{background-color:var(--lns-color-grey6)}.sm-bgc\:grey5{background-color:var(--lns-color-grey5)}.sm-bgc\:grey4{background-color:var(--lns-color-grey4)}.sm-bgc\:grey3{background-color:var(--lns-color-grey3)}.sm-bgc\:grey2{background-color:var(--lns-color-grey2)}.sm-bgc\:grey1{background-color:var(--lns-color-grey1)}.sm-bgc\:white{background-color:var(--lns-color-white)}.sm-bgc\:primary{background-color:var(--lns-color-primary)}.sm-bgc\:primaryHover{background-color:var(--lns-color-primaryHover)}.sm-bgc\:primaryActive{background-color:var(--lns-color-primaryActive)}.sm-bgc\:body{background-color:var(--lns-color-body)}.sm-bgc\:bodyDimmed{background-color:var(--lns-color-bodyDimmed)}.sm-bgc\:background{background-color:var(--lns-color-background)}.sm-bgc\:backgroundHover{background-color:var(--lns-color-backgroundHover)}.sm-bgc\:backgroundActive{background-color:var(--lns-color-backgroundActive)}.sm-bgc\:backgroundSecondary{background-color:var(--lns-color-backgroundSecondary)}.sm-bgc\:backgroundSecondary2{background-color:var(--lns-color-backgroundSecondary2)}.sm-bgc\:overlay{background-color:var(--lns-color-overlay)}.sm-bgc\:border{background-color:var(--lns-color-border)}.sm-bgc\:focusRing{background-color:var(--lns-color-focusRing)}.sm-bgc\:record{background-color:var(--lns-color-record)}.sm-bgc\:recordHover{background-color:var(--lns-color-recordHover)}.sm-bgc\:recordActive{background-color:var(--lns-color-recordActive)}.sm-bgc\:info{background-color:var(--lns-color-info)}.sm-bgc\:success{background-color:var(--lns-color-success)}.sm-bgc\:warning{background-color:var(--lns-color-warning)}.sm-bgc\:danger{background-color:var(--lns-color-danger)}.sm-bgc\:dangerHover{background-color:var(--lns-color-dangerHover)}.sm-bgc\:dangerActive{background-color:var(--lns-color-dangerActive)}.sm-bgc\:backdrop{background-color:var(--lns-color-backdrop)}.sm-bgc\:backdropDark{background-color:var(--lns-color-backdropDark)}.sm-bgc\:backdropTwilight{background-color:var(--lns-color-backdropTwilight)}.sm-bgc\:disabledContent{background-color:var(--lns-color-disabledContent)}.sm-bgc\:highlight{background-color:var(--lns-color-highlight)}.sm-bgc\:disabledBackground{background-color:var(--lns-color-disabledBackground)}.sm-bgc\:formFieldBorder{background-color:var(--lns-color-formFieldBorder)}.sm-bgc\:formFieldBackground{background-color:var(--lns-color-formFieldBackground)}.sm-bgc\:buttonBorder{background-color:var(--lns-color-buttonBorder)}.sm-bgc\:upgrade{background-color:var(--lns-color-upgrade)}.sm-bgc\:upgradeHover{background-color:var(--lns-color-upgradeHover)}.sm-bgc\:upgradeActive{background-color:var(--lns-color-upgradeActive)}.sm-bgc\:tabBackground{background-color:var(--lns-color-tabBackground)}.sm-bgc\:discoveryBackground{background-color:var(--lns-color-discoveryBackground)}.sm-bgc\:discoveryLightBackground{background-color:var(--lns-color-discoveryLightBackground)}.sm-bgc\:discoveryTitle{background-color:var(--lns-color-discoveryTitle)}.sm-bgc\:discoveryHighlight{background-color:var(--lns-color-discoveryHighlight)}.sm-m\:0{margin:0}.sm-m\:auto{margin:auto}.sm-m\:xsmall{margin:var(--lns-space-xsmall)}.sm-m\:small{margin:var(--lns-space-small)}.sm-m\:medium{margin:var(--lns-space-medium)}.sm-m\:large{margin:var(--lns-space-large)}.sm-m\:xlarge{margin:var(--lns-space-xlarge)}.sm-m\:xxlarge{margin:var(--lns-space-xxlarge)}.sm-mt\:0{margin-top:0}.sm-mt\:auto{margin-top:auto}.sm-mt\:xsmall{margin-top:var(--lns-space-xsmall)}.sm-mt\:small{margin-top:var(--lns-space-small)}.sm-mt\:medium{margin-top:var(--lns-space-medium)}.sm-mt\:large{margin-top:var(--lns-space-large)}.sm-mt\:xlarge{margin-top:var(--lns-space-xlarge)}.sm-mt\:xxlarge{margin-top:var(--lns-space-xxlarge)}.sm-mb\:0{margin-bottom:0}.sm-mb\:auto{margin-bottom:auto}.sm-mb\:xsmall{margin-bottom:var(--lns-space-xsmall)}.sm-mb\:small{margin-bottom:var(--lns-space-small)}.sm-mb\:medium{margin-bottom:var(--lns-space-medium)}.sm-mb\:large{margin-bottom:var(--lns-space-large)}.sm-mb\:xlarge{margin-bottom:var(--lns-space-xlarge)}.sm-mb\:xxlarge{margin-bottom:var(--lns-space-xxlarge)}.sm-ml\:0{margin-left:0}.sm-ml\:auto{margin-left:auto}.sm-ml\:xsmall{margin-left:var(--lns-space-xsmall)}.sm-ml\:small{margin-left:var(--lns-space-small)}.sm-ml\:medium{margin-left:var(--lns-space-medium)}.sm-ml\:large{margin-left:var(--lns-space-large)}.sm-ml\:xlarge{margin-left:var(--lns-space-xlarge)}.sm-ml\:xxlarge{margin-left:var(--lns-space-xxlarge)}.sm-mr\:0{margin-right:0}.sm-mr\:auto{margin-right:auto}.sm-mr\:xsmall{margin-right:var(--lns-space-xsmall)}.sm-mr\:small{margin-right:var(--lns-space-small)}.sm-mr\:medium{margin-right:var(--lns-space-medium)}.sm-mr\:large{margin-right:var(--lns-space-large)}.sm-mr\:xlarge{margin-right:var(--lns-space-xlarge)}.sm-mr\:xxlarge{margin-right:var(--lns-space-xxlarge)}.sm-mx\:0{margin-left:0;margin-right:0}.sm-mx\:auto{margin-left:auto;margin-right:auto}.sm-mx\:xsmall{margin-left:var(--lns-space-xsmall);margin-right:var(--lns-space-xsmall)}.sm-mx\:small{margin-left:var(--lns-space-small);margin-right:var(--lns-space-small)}.sm-mx\:medium{margin-left:var(--lns-space-medium);margin-right:var(--lns-space-medium)}.sm-mx\:large{margin-left:var(--lns-space-large);margin-right:var(--lns-space-large)}.sm-mx\:xlarge{margin-left:var(--lns-space-xlarge);margin-right:var(--lns-space-xlarge)}.sm-mx\:xxlarge{margin-left:var(--lns-space-xxlarge);margin-right:var(--lns-space-xxlarge)}.sm-my\:0{margin-top:0;margin-bottom:0}.sm-my\:auto{margin-top:auto;margin-bottom:auto}.sm-my\:xsmall{margin-top:var(--lns-space-xsmall);margin-bottom:var(--lns-space-xsmall)}.sm-my\:small{margin-top:var(--lns-space-small);margin-bottom:var(--lns-space-small)}.sm-my\:medium{margin-top:var(--lns-space-medium);margin-bottom:var(--lns-space-medium)}.sm-my\:large{margin-top:var(--lns-space-large);margin-bottom:var(--lns-space-large)}.sm-my\:xlarge{margin-top:var(--lns-space-xlarge);margin-bottom:var(--lns-space-xlarge)}.sm-my\:xxlarge{margin-top:var(--lns-space-xxlarge);margin-bottom:var(--lns-space-xxlarge)}.sm-p\:0{padding:0}.sm-p\:xsmall{padding:var(--lns-space-xsmall)}.sm-p\:small{padding:var(--lns-space-small)}.sm-p\:medium{padding:var(--lns-space-medium)}.sm-p\:large{padding:var(--lns-space-large)}.sm-p\:xlarge{padding:var(--lns-space-xlarge)}.sm-p\:xxlarge{padding:var(--lns-space-xxlarge)}.sm-pt\:0{padding-top:0}.sm-pt\:xsmall{padding-top:var(--lns-space-xsmall)}.sm-pt\:small{padding-top:var(--lns-space-small)}.sm-pt\:medium{padding-top:var(--lns-space-medium)}.sm-pt\:large{padding-top:var(--lns-space-large)}.sm-pt\:xlarge{padding-top:var(--lns-space-xlarge)}.sm-pt\:xxlarge{padding-top:var(--lns-space-xxlarge)}.sm-pb\:0{padding-bottom:0}.sm-pb\:xsmall{padding-bottom:var(--lns-space-xsmall)}.sm-pb\:small{padding-bottom:var(--lns-space-small)}.sm-pb\:medium{padding-bottom:var(--lns-space-medium)}.sm-pb\:large{padding-bottom:var(--lns-space-large)}.sm-pb\:xlarge{padding-bottom:var(--lns-space-xlarge)}.sm-pb\:xxlarge{padding-bottom:var(--lns-space-xxlarge)}.sm-pl\:0{padding-left:0}.sm-pl\:xsmall{padding-left:var(--lns-space-xsmall)}.sm-pl\:small{padding-left:var(--lns-space-small)}.sm-pl\:medium{padding-left:var(--lns-space-medium)}.sm-pl\:large{padding-left:var(--lns-space-large)}.sm-pl\:xlarge{padding-left:var(--lns-space-xlarge)}.sm-pl\:xxlarge{padding-left:var(--lns-space-xxlarge)}.sm-pr\:0{padding-right:0}.sm-pr\:xsmall{padding-right:var(--lns-space-xsmall)}.sm-pr\:small{padding-right:var(--lns-space-small)}.sm-pr\:medium{padding-right:var(--lns-space-medium)}.sm-pr\:large{padding-right:var(--lns-space-large)}.sm-pr\:xlarge{padding-right:var(--lns-space-xlarge)}.sm-pr\:xxlarge{padding-right:var(--lns-space-xxlarge)}.sm-px\:0{padding-left:0;padding-right:0}.sm-px\:xsmall{padding-left:var(--lns-space-xsmall);padding-right:var(--lns-space-xsmall)}.sm-px\:small{padding-left:var(--lns-space-small);padding-right:var(--lns-space-small)}.sm-px\:medium{padding-left:var(--lns-space-medium);padding-right:var(--lns-space-medium)}.sm-px\:large{padding-left:var(--lns-space-large);padding-right:var(--lns-space-large)}.sm-px\:xlarge{padding-left:var(--lns-space-xlarge);padding-right:var(--lns-space-xlarge)}.sm-px\:xxlarge{padding-left:var(--lns-space-xxlarge);padding-right:var(--lns-space-xxlarge)}.sm-py\:0{padding-top:0;padding-bottom:0}.sm-py\:xsmall{padding-top:var(--lns-space-xsmall);padding-bottom:var(--lns-space-xsmall)}.sm-py\:small{padding-top:var(--lns-space-small);padding-bottom:var(--lns-space-small)}.sm-py\:medium{padding-top:var(--lns-space-medium);padding-bottom:var(--lns-space-medium)}.sm-py\:large{padding-top:var(--lns-space-large);padding-bottom:var(--lns-space-large)}.sm-py\:xlarge{padding-top:var(--lns-space-xlarge);padding-bottom:var(--lns-space-xlarge)}.sm-py\:xxlarge{padding-top:var(--lns-space-xxlarge);padding-bottom:var(--lns-space-xxlarge)}.sm-text\:small{font-size:var(--lns-fontSize-small);line-height:var(--lns-lineHeight-small)}.sm-text\:body-sm{font-size:var(--lns-fontSize-body-sm);line-height:var(--lns-lineHeight-body-sm)}.sm-text\:medium{font-size:var(--lns-fontSize-medium);line-height:var(--lns-lineHeight-medium)}.sm-text\:body-md{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md)}.sm-text\:large{font-size:var(--lns-fontSize-large);line-height:var(--lns-lineHeight-large)}.sm-text\:body-lg{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg)}.sm-text\:xlarge{font-size:var(--lns-fontSize-xlarge);line-height:var(--lns-lineHeight-xlarge)}.sm-text\:heading-sm{font-size:var(--lns-fontSize-heading-sm);line-height:var(--lns-lineHeight-heading-sm)}.sm-text\:xxlarge{font-size:var(--lns-fontSize-xxlarge);line-height:var(--lns-lineHeight-xxlarge)}.sm-text\:heading-md{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md)}.sm-text\:xxxlarge{font-size:var(--lns-fontSize-xxxlarge);line-height:var(--lns-lineHeight-xxxlarge)}.sm-text\:heading-lg{font-size:var(--lns-fontSize-heading-lg);line-height:var(--lns-lineHeight-heading-lg)}.sm-weight\:book{font-weight:var(--lns-fontWeight-book)}.sm-weight\:bold{font-weight:var(--lns-fontWeight-bold)}.sm-text\:body{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md);font-weight:var(--lns-fontWeight-book)}.sm-text\:title{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg);font-weight:var(--lns-fontWeight-bold)}.sm-text\:mainTitle{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md);font-weight:var(--lns-fontWeight-bold)}.sm-text\:left{text-align:left}.sm-text\:right{text-align:right}.sm-text\:center{text-align:center}.sm-border{border:1px solid var(--lns-color-border)}.sm-borderTop{border-top:1px solid var(--lns-color-border)}.sm-borderBottom{border-bottom:1px solid var(--lns-color-border)}.sm-borderLeft{border-left:1px solid var(--lns-color-border)}.sm-borderRight{border-right:1px solid var(--lns-color-border)}.sm-inline{display:inline}.sm-block{display:block}.sm-flex{display:flex}.sm-inlineBlock{display:inline-block}.sm-inlineFlex{display:inline-flex}.sm-none{display:none}.sm-flexWrap{flex-wrap:wrap}.sm-flexDirection\:column{flex-direction:column}.sm-flexDirection\:row{flex-direction:row}.sm-items\:stretch{align-items:stretch}.sm-items\:center{align-items:center}.sm-items\:baseline{align-items:baseline}.sm-items\:flexStart{align-items:flex-start}.sm-items\:flexEnd{align-items:flex-end}.sm-items\:selfStart{align-items:self-start}.sm-items\:selfEnd{align-items:self-end}.sm-justify\:flexStart{justify-content:flex-start}.sm-justify\:flexEnd{justify-content:flex-end}.sm-justify\:center{justify-content:center}.sm-justify\:spaceBetween{justify-content:space-between}.sm-justify\:spaceAround{justify-content:space-around}.sm-justify\:spaceEvenly{justify-content:space-evenly}.sm-grow\:0{flex-grow:0}.sm-grow\:1{flex-grow:1}.sm-shrink\:0{flex-shrink:0}.sm-shrink\:1{flex-shrink:1}.sm-self\:auto{align-self:auto}.sm-self\:flexStart{align-self:flex-start}.sm-self\:flexEnd{align-self:flex-end}.sm-self\:center{align-self:center}.sm-self\:baseline{align-self:baseline}.sm-self\:stretch{align-self:stretch}.sm-overflow\:hidden{overflow:hidden}.sm-overflow\:auto{overflow:auto}.sm-relative{position:relative}.sm-absolute{position:absolute}.sm-sticky{position:sticky}.sm-fixed{position:fixed}.sm-top\:0{top:0}.sm-top\:auto{top:auto}.sm-top\:xsmall{top:var(--lns-space-xsmall)}.sm-top\:small{top:var(--lns-space-small)}.sm-top\:medium{top:var(--lns-space-medium)}.sm-top\:large{top:var(--lns-space-large)}.sm-top\:xlarge{top:var(--lns-space-xlarge)}.sm-top\:xxlarge{top:var(--lns-space-xxlarge)}.sm-bottom\:0{bottom:0}.sm-bottom\:auto{bottom:auto}.sm-bottom\:xsmall{bottom:var(--lns-space-xsmall)}.sm-bottom\:small{bottom:var(--lns-space-small)}.sm-bottom\:medium{bottom:var(--lns-space-medium)}.sm-bottom\:large{bottom:var(--lns-space-large)}.sm-bottom\:xlarge{bottom:var(--lns-space-xlarge)}.sm-bottom\:xxlarge{bottom:var(--lns-space-xxlarge)}.sm-left\:0{left:0}.sm-left\:auto{left:auto}.sm-left\:xsmall{left:var(--lns-space-xsmall)}.sm-left\:small{left:var(--lns-space-small)}.sm-left\:medium{left:var(--lns-space-medium)}.sm-left\:large{left:var(--lns-space-large)}.sm-left\:xlarge{left:var(--lns-space-xlarge)}.sm-left\:xxlarge{left:var(--lns-space-xxlarge)}.sm-right\:0{right:0}.sm-right\:auto{right:auto}.sm-right\:xsmall{right:var(--lns-space-xsmall)}.sm-right\:small{right:var(--lns-space-small)}.sm-right\:medium{right:var(--lns-space-medium)}.sm-right\:large{right:var(--lns-space-large)}.sm-right\:xlarge{right:var(--lns-space-xlarge)}.sm-right\:xxlarge{right:var(--lns-space-xxlarge)}.sm-width\:auto{width:auto}.sm-width\:full{width:100%}.sm-width\:0{width:0}.sm-minWidth\:0{min-width:0}.sm-height\:auto{height:auto}.sm-height\:full{height:100%}.sm-height\:0{height:0}.sm-ellipsis{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.sm-srOnly{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0}}@media(min-width:64em){.md-c\:red{color:var(--lns-color-red)}.md-c\:blurpleLight{color:var(--lns-color-blurpleLight)}.md-c\:blurpleMedium{color:var(--lns-color-blurpleMedium)}.md-c\:blurple{color:var(--lns-color-blurple)}.md-c\:blurpleDark{color:var(--lns-color-blurpleDark)}.md-c\:offWhite{color:var(--lns-color-offWhite)}.md-c\:blueLight{color:var(--lns-color-blueLight)}.md-c\:blue{color:var(--lns-color-blue)}.md-c\:blueDark{color:var(--lns-color-blueDark)}.md-c\:orangeLight{color:var(--lns-color-orangeLight)}.md-c\:orange{color:var(--lns-color-orange)}.md-c\:orangeDark{color:var(--lns-color-orangeDark)}.md-c\:tealLight{color:var(--lns-color-tealLight)}.md-c\:teal{color:var(--lns-color-teal)}.md-c\:tealDark{color:var(--lns-color-tealDark)}.md-c\:yellowLight{color:var(--lns-color-yellowLight)}.md-c\:yellow{color:var(--lns-color-yellow)}.md-c\:yellowDark{color:var(--lns-color-yellowDark)}.md-c\:grey8{color:var(--lns-color-grey8)}.md-c\:grey7{color:var(--lns-color-grey7)}.md-c\:grey6{color:var(--lns-color-grey6)}.md-c\:grey5{color:var(--lns-color-grey5)}.md-c\:grey4{color:var(--lns-color-grey4)}.md-c\:grey3{color:var(--lns-color-grey3)}.md-c\:grey2{color:var(--lns-color-grey2)}.md-c\:grey1{color:var(--lns-color-grey1)}.md-c\:white{color:var(--lns-color-white)}.md-c\:primary{color:var(--lns-color-primary)}.md-c\:primaryHover{color:var(--lns-color-primaryHover)}.md-c\:primaryActive{color:var(--lns-color-primaryActive)}.md-c\:body{color:var(--lns-color-body)}.md-c\:bodyDimmed{color:var(--lns-color-bodyDimmed)}.md-c\:background{color:var(--lns-color-background)}.md-c\:backgroundHover{color:var(--lns-color-backgroundHover)}.md-c\:backgroundActive{color:var(--lns-color-backgroundActive)}.md-c\:backgroundSecondary{color:var(--lns-color-backgroundSecondary)}.md-c\:backgroundSecondary2{color:var(--lns-color-backgroundSecondary2)}.md-c\:overlay{color:var(--lns-color-overlay)}.md-c\:border{color:var(--lns-color-border)}.md-c\:focusRing{color:var(--lns-color-focusRing)}.md-c\:record{color:var(--lns-color-record)}.md-c\:recordHover{color:var(--lns-color-recordHover)}.md-c\:recordActive{color:var(--lns-color-recordActive)}.md-c\:info{color:var(--lns-color-info)}.md-c\:success{color:var(--lns-color-success)}.md-c\:warning{color:var(--lns-color-warning)}.md-c\:danger{color:var(--lns-color-danger)}.md-c\:dangerHover{color:var(--lns-color-dangerHover)}.md-c\:dangerActive{color:var(--lns-color-dangerActive)}.md-c\:backdrop{color:var(--lns-color-backdrop)}.md-c\:backdropDark{color:var(--lns-color-backdropDark)}.md-c\:backdropTwilight{color:var(--lns-color-backdropTwilight)}.md-c\:disabledContent{color:var(--lns-color-disabledContent)}.md-c\:highlight{color:var(--lns-color-highlight)}.md-c\:disabledBackground{color:var(--lns-color-disabledBackground)}.md-c\:formFieldBorder{color:var(--lns-color-formFieldBorder)}.md-c\:formFieldBackground{color:var(--lns-color-formFieldBackground)}.md-c\:buttonBorder{color:var(--lns-color-buttonBorder)}.md-c\:upgrade{color:var(--lns-color-upgrade)}.md-c\:upgradeHover{color:var(--lns-color-upgradeHover)}.md-c\:upgradeActive{color:var(--lns-color-upgradeActive)}.md-c\:tabBackground{color:var(--lns-color-tabBackground)}.md-c\:discoveryBackground{color:var(--lns-color-discoveryBackground)}.md-c\:discoveryLightBackground{color:var(--lns-color-discoveryLightBackground)}.md-c\:discoveryTitle{color:var(--lns-color-discoveryTitle)}.md-c\:discoveryHighlight{color:var(--lns-color-discoveryHighlight)}.md-shadow\:small{box-shadow:var(--lns-shadow-small)}.md-shadow\:medium{box-shadow:var(--lns-shadow-medium)}.md-shadow\:large{box-shadow:var(--lns-shadow-large)}.md-radius\:medium{border-radius:var(--lns-radius-medium)}.md-radius\:large{border-radius:var(--lns-radius-large)}.md-radius\:xlarge{border-radius:var(--lns-radius-xlarge)}.md-radius\:full{border-radius:var(--lns-radius-full)}.md-bgc\:red{background-color:var(--lns-color-red)}.md-bgc\:blurpleLight{background-color:var(--lns-color-blurpleLight)}.md-bgc\:blurpleMedium{background-color:var(--lns-color-blurpleMedium)}.md-bgc\:blurple{background-color:var(--lns-color-blurple)}.md-bgc\:blurpleDark{background-color:var(--lns-color-blurpleDark)}.md-bgc\:offWhite{background-color:var(--lns-color-offWhite)}.md-bgc\:blueLight{background-color:var(--lns-color-blueLight)}.md-bgc\:blue{background-color:var(--lns-color-blue)}.md-bgc\:blueDark{background-color:var(--lns-color-blueDark)}.md-bgc\:orangeLight{background-color:var(--lns-color-orangeLight)}.md-bgc\:orange{background-color:var(--lns-color-orange)}.md-bgc\:orangeDark{background-color:var(--lns-color-orangeDark)}.md-bgc\:tealLight{background-color:var(--lns-color-tealLight)}.md-bgc\:teal{background-color:var(--lns-color-teal)}.md-bgc\:tealDark{background-color:var(--lns-color-tealDark)}.md-bgc\:yellowLight{background-color:var(--lns-color-yellowLight)}.md-bgc\:yellow{background-color:var(--lns-color-yellow)}.md-bgc\:yellowDark{background-color:var(--lns-color-yellowDark)}.md-bgc\:grey8{background-color:var(--lns-color-grey8)}.md-bgc\:grey7{background-color:var(--lns-color-grey7)}.md-bgc\:grey6{background-color:var(--lns-color-grey6)}.md-bgc\:grey5{background-color:var(--lns-color-grey5)}.md-bgc\:grey4{background-color:var(--lns-color-grey4)}.md-bgc\:grey3{background-color:var(--lns-color-grey3)}.md-bgc\:grey2{background-color:var(--lns-color-grey2)}.md-bgc\:grey1{background-color:var(--lns-color-grey1)}.md-bgc\:white{background-color:var(--lns-color-white)}.md-bgc\:primary{background-color:var(--lns-color-primary)}.md-bgc\:primaryHover{background-color:var(--lns-color-primaryHover)}.md-bgc\:primaryActive{background-color:var(--lns-color-primaryActive)}.md-bgc\:body{background-color:var(--lns-color-body)}.md-bgc\:bodyDimmed{background-color:var(--lns-color-bodyDimmed)}.md-bgc\:background{background-color:var(--lns-color-background)}.md-bgc\:backgroundHover{background-color:var(--lns-color-backgroundHover)}.md-bgc\:backgroundActive{background-color:var(--lns-color-backgroundActive)}.md-bgc\:backgroundSecondary{background-color:var(--lns-color-backgroundSecondary)}.md-bgc\:backgroundSecondary2{background-color:var(--lns-color-backgroundSecondary2)}.md-bgc\:overlay{background-color:var(--lns-color-overlay)}.md-bgc\:border{background-color:var(--lns-color-border)}.md-bgc\:focusRing{background-color:var(--lns-color-focusRing)}.md-bgc\:record{background-color:var(--lns-color-record)}.md-bgc\:recordHover{background-color:var(--lns-color-recordHover)}.md-bgc\:recordActive{background-color:var(--lns-color-recordActive)}.md-bgc\:info{background-color:var(--lns-color-info)}.md-bgc\:success{background-color:var(--lns-color-success)}.md-bgc\:warning{background-color:var(--lns-color-warning)}.md-bgc\:danger{background-color:var(--lns-color-danger)}.md-bgc\:dangerHover{background-color:var(--lns-color-dangerHover)}.md-bgc\:dangerActive{background-color:var(--lns-color-dangerActive)}.md-bgc\:backdrop{background-color:var(--lns-color-backdrop)}.md-bgc\:backdropDark{background-color:var(--lns-color-backdropDark)}.md-bgc\:backdropTwilight{background-color:var(--lns-color-backdropTwilight)}.md-bgc\:disabledContent{background-color:var(--lns-color-disabledContent)}.md-bgc\:highlight{background-color:var(--lns-color-highlight)}.md-bgc\:disabledBackground{background-color:var(--lns-color-disabledBackground)}.md-bgc\:formFieldBorder{background-color:var(--lns-color-formFieldBorder)}.md-bgc\:formFieldBackground{background-color:var(--lns-color-formFieldBackground)}.md-bgc\:buttonBorder{background-color:var(--lns-color-buttonBorder)}.md-bgc\:upgrade{background-color:var(--lns-color-upgrade)}.md-bgc\:upgradeHover{background-color:var(--lns-color-upgradeHover)}.md-bgc\:upgradeActive{background-color:var(--lns-color-upgradeActive)}.md-bgc\:tabBackground{background-color:var(--lns-color-tabBackground)}.md-bgc\:discoveryBackground{background-color:var(--lns-color-discoveryBackground)}.md-bgc\:discoveryLightBackground{background-color:var(--lns-color-discoveryLightBackground)}.md-bgc\:discoveryTitle{background-color:var(--lns-color-discoveryTitle)}.md-bgc\:discoveryHighlight{background-color:var(--lns-color-discoveryHighlight)}.md-m\:0{margin:0}.md-m\:auto{margin:auto}.md-m\:xsmall{margin:var(--lns-space-xsmall)}.md-m\:small{margin:var(--lns-space-small)}.md-m\:medium{margin:var(--lns-space-medium)}.md-m\:large{margin:var(--lns-space-large)}.md-m\:xlarge{margin:var(--lns-space-xlarge)}.md-m\:xxlarge{margin:var(--lns-space-xxlarge)}.md-mt\:0{margin-top:0}.md-mt\:auto{margin-top:auto}.md-mt\:xsmall{margin-top:var(--lns-space-xsmall)}.md-mt\:small{margin-top:var(--lns-space-small)}.md-mt\:medium{margin-top:var(--lns-space-medium)}.md-mt\:large{margin-top:var(--lns-space-large)}.md-mt\:xlarge{margin-top:var(--lns-space-xlarge)}.md-mt\:xxlarge{margin-top:var(--lns-space-xxlarge)}.md-mb\:0{margin-bottom:0}.md-mb\:auto{margin-bottom:auto}.md-mb\:xsmall{margin-bottom:var(--lns-space-xsmall)}.md-mb\:small{margin-bottom:var(--lns-space-small)}.md-mb\:medium{margin-bottom:var(--lns-space-medium)}.md-mb\:large{margin-bottom:var(--lns-space-large)}.md-mb\:xlarge{margin-bottom:var(--lns-space-xlarge)}.md-mb\:xxlarge{margin-bottom:var(--lns-space-xxlarge)}.md-ml\:0{margin-left:0}.md-ml\:auto{margin-left:auto}.md-ml\:xsmall{margin-left:var(--lns-space-xsmall)}.md-ml\:small{margin-left:var(--lns-space-small)}.md-ml\:medium{margin-left:var(--lns-space-medium)}.md-ml\:large{margin-left:var(--lns-space-large)}.md-ml\:xlarge{margin-left:var(--lns-space-xlarge)}.md-ml\:xxlarge{margin-left:var(--lns-space-xxlarge)}.md-mr\:0{margin-right:0}.md-mr\:auto{margin-right:auto}.md-mr\:xsmall{margin-right:var(--lns-space-xsmall)}.md-mr\:small{margin-right:var(--lns-space-small)}.md-mr\:medium{margin-right:var(--lns-space-medium)}.md-mr\:large{margin-right:var(--lns-space-large)}.md-mr\:xlarge{margin-right:var(--lns-space-xlarge)}.md-mr\:xxlarge{margin-right:var(--lns-space-xxlarge)}.md-mx\:0{margin-left:0;margin-right:0}.md-mx\:auto{margin-left:auto;margin-right:auto}.md-mx\:xsmall{margin-left:var(--lns-space-xsmall);margin-right:var(--lns-space-xsmall)}.md-mx\:small{margin-left:var(--lns-space-small);margin-right:var(--lns-space-small)}.md-mx\:medium{margin-left:var(--lns-space-medium);margin-right:var(--lns-space-medium)}.md-mx\:large{margin-left:var(--lns-space-large);margin-right:var(--lns-space-large)}.md-mx\:xlarge{margin-left:var(--lns-space-xlarge);margin-right:var(--lns-space-xlarge)}.md-mx\:xxlarge{margin-left:var(--lns-space-xxlarge);margin-right:var(--lns-space-xxlarge)}.md-my\:0{margin-top:0;margin-bottom:0}.md-my\:auto{margin-top:auto;margin-bottom:auto}.md-my\:xsmall{margin-top:var(--lns-space-xsmall);margin-bottom:var(--lns-space-xsmall)}.md-my\:small{margin-top:var(--lns-space-small);margin-bottom:var(--lns-space-small)}.md-my\:medium{margin-top:var(--lns-space-medium);margin-bottom:var(--lns-space-medium)}.md-my\:large{margin-top:var(--lns-space-large);margin-bottom:var(--lns-space-large)}.md-my\:xlarge{margin-top:var(--lns-space-xlarge);margin-bottom:var(--lns-space-xlarge)}.md-my\:xxlarge{margin-top:var(--lns-space-xxlarge);margin-bottom:var(--lns-space-xxlarge)}.md-p\:0{padding:0}.md-p\:xsmall{padding:var(--lns-space-xsmall)}.md-p\:small{padding:var(--lns-space-small)}.md-p\:medium{padding:var(--lns-space-medium)}.md-p\:large{padding:var(--lns-space-large)}.md-p\:xlarge{padding:var(--lns-space-xlarge)}.md-p\:xxlarge{padding:var(--lns-space-xxlarge)}.md-pt\:0{padding-top:0}.md-pt\:xsmall{padding-top:var(--lns-space-xsmall)}.md-pt\:small{padding-top:var(--lns-space-small)}.md-pt\:medium{padding-top:var(--lns-space-medium)}.md-pt\:large{padding-top:var(--lns-space-large)}.md-pt\:xlarge{padding-top:var(--lns-space-xlarge)}.md-pt\:xxlarge{padding-top:var(--lns-space-xxlarge)}.md-pb\:0{padding-bottom:0}.md-pb\:xsmall{padding-bottom:var(--lns-space-xsmall)}.md-pb\:small{padding-bottom:var(--lns-space-small)}.md-pb\:medium{padding-bottom:var(--lns-space-medium)}.md-pb\:large{padding-bottom:var(--lns-space-large)}.md-pb\:xlarge{padding-bottom:var(--lns-space-xlarge)}.md-pb\:xxlarge{padding-bottom:var(--lns-space-xxlarge)}.md-pl\:0{padding-left:0}.md-pl\:xsmall{padding-left:var(--lns-space-xsmall)}.md-pl\:small{padding-left:var(--lns-space-small)}.md-pl\:medium{padding-left:var(--lns-space-medium)}.md-pl\:large{padding-left:var(--lns-space-large)}.md-pl\:xlarge{padding-left:var(--lns-space-xlarge)}.md-pl\:xxlarge{padding-left:var(--lns-space-xxlarge)}.md-pr\:0{padding-right:0}.md-pr\:xsmall{padding-right:var(--lns-space-xsmall)}.md-pr\:small{padding-right:var(--lns-space-small)}.md-pr\:medium{padding-right:var(--lns-space-medium)}.md-pr\:large{padding-right:var(--lns-space-large)}.md-pr\:xlarge{padding-right:var(--lns-space-xlarge)}.md-pr\:xxlarge{padding-right:var(--lns-space-xxlarge)}.md-px\:0{padding-left:0;padding-right:0}.md-px\:xsmall{padding-left:var(--lns-space-xsmall);padding-right:var(--lns-space-xsmall)}.md-px\:small{padding-left:var(--lns-space-small);padding-right:var(--lns-space-small)}.md-px\:medium{padding-left:var(--lns-space-medium);padding-right:var(--lns-space-medium)}.md-px\:large{padding-left:var(--lns-space-large);padding-right:var(--lns-space-large)}.md-px\:xlarge{padding-left:var(--lns-space-xlarge);padding-right:var(--lns-space-xlarge)}.md-px\:xxlarge{padding-left:var(--lns-space-xxlarge);padding-right:var(--lns-space-xxlarge)}.md-py\:0{padding-top:0;padding-bottom:0}.md-py\:xsmall{padding-top:var(--lns-space-xsmall);padding-bottom:var(--lns-space-xsmall)}.md-py\:small{padding-top:var(--lns-space-small);padding-bottom:var(--lns-space-small)}.md-py\:medium{padding-top:var(--lns-space-medium);padding-bottom:var(--lns-space-medium)}.md-py\:large{padding-top:var(--lns-space-large);padding-bottom:var(--lns-space-large)}.md-py\:xlarge{padding-top:var(--lns-space-xlarge);padding-bottom:var(--lns-space-xlarge)}.md-py\:xxlarge{padding-top:var(--lns-space-xxlarge);padding-bottom:var(--lns-space-xxlarge)}.md-text\:small{font-size:var(--lns-fontSize-small);line-height:var(--lns-lineHeight-small)}.md-text\:body-sm{font-size:var(--lns-fontSize-body-sm);line-height:var(--lns-lineHeight-body-sm)}.md-text\:medium{font-size:var(--lns-fontSize-medium);line-height:var(--lns-lineHeight-medium)}.md-text\:body-md{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md)}.md-text\:large{font-size:var(--lns-fontSize-large);line-height:var(--lns-lineHeight-large)}.md-text\:body-lg{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg)}.md-text\:xlarge{font-size:var(--lns-fontSize-xlarge);line-height:var(--lns-lineHeight-xlarge)}.md-text\:heading-sm{font-size:var(--lns-fontSize-heading-sm);line-height:var(--lns-lineHeight-heading-sm)}.md-text\:xxlarge{font-size:var(--lns-fontSize-xxlarge);line-height:var(--lns-lineHeight-xxlarge)}.md-text\:heading-md{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md)}.md-text\:xxxlarge{font-size:var(--lns-fontSize-xxxlarge);line-height:var(--lns-lineHeight-xxxlarge)}.md-text\:heading-lg{font-size:var(--lns-fontSize-heading-lg);line-height:var(--lns-lineHeight-heading-lg)}.md-weight\:book{font-weight:var(--lns-fontWeight-book)}.md-weight\:bold{font-weight:var(--lns-fontWeight-bold)}.md-text\:body{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md);font-weight:var(--lns-fontWeight-book)}.md-text\:title{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg);font-weight:var(--lns-fontWeight-bold)}.md-text\:mainTitle{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md);font-weight:var(--lns-fontWeight-bold)}.md-text\:left{text-align:left}.md-text\:right{text-align:right}.md-text\:center{text-align:center}.md-border{border:1px solid var(--lns-color-border)}.md-borderTop{border-top:1px solid var(--lns-color-border)}.md-borderBottom{border-bottom:1px solid var(--lns-color-border)}.md-borderLeft{border-left:1px solid var(--lns-color-border)}.md-borderRight{border-right:1px solid var(--lns-color-border)}.md-inline{display:inline}.md-block{display:block}.md-flex{display:flex}.md-inlineBlock{display:inline-block}.md-inlineFlex{display:inline-flex}.md-none{display:none}.md-flexWrap{flex-wrap:wrap}.md-flexDirection\:column{flex-direction:column}.md-flexDirection\:row{flex-direction:row}.md-items\:stretch{align-items:stretch}.md-items\:center{align-items:center}.md-items\:baseline{align-items:baseline}.md-items\:flexStart{align-items:flex-start}.md-items\:flexEnd{align-items:flex-end}.md-items\:selfStart{align-items:self-start}.md-items\:selfEnd{align-items:self-end}.md-justify\:flexStart{justify-content:flex-start}.md-justify\:flexEnd{justify-content:flex-end}.md-justify\:center{justify-content:center}.md-justify\:spaceBetween{justify-content:space-between}.md-justify\:spaceAround{justify-content:space-around}.md-justify\:spaceEvenly{justify-content:space-evenly}.md-grow\:0{flex-grow:0}.md-grow\:1{flex-grow:1}.md-shrink\:0{flex-shrink:0}.md-shrink\:1{flex-shrink:1}.md-self\:auto{align-self:auto}.md-self\:flexStart{align-self:flex-start}.md-self\:flexEnd{align-self:flex-end}.md-self\:center{align-self:center}.md-self\:baseline{align-self:baseline}.md-self\:stretch{align-self:stretch}.md-overflow\:hidden{overflow:hidden}.md-overflow\:auto{overflow:auto}.md-relative{position:relative}.md-absolute{position:absolute}.md-sticky{position:sticky}.md-fixed{position:fixed}.md-top\:0{top:0}.md-top\:auto{top:auto}.md-top\:xsmall{top:var(--lns-space-xsmall)}.md-top\:small{top:var(--lns-space-small)}.md-top\:medium{top:var(--lns-space-medium)}.md-top\:large{top:var(--lns-space-large)}.md-top\:xlarge{top:var(--lns-space-xlarge)}.md-top\:xxlarge{top:var(--lns-space-xxlarge)}.md-bottom\:0{bottom:0}.md-bottom\:auto{bottom:auto}.md-bottom\:xsmall{bottom:var(--lns-space-xsmall)}.md-bottom\:small{bottom:var(--lns-space-small)}.md-bottom\:medium{bottom:var(--lns-space-medium)}.md-bottom\:large{bottom:var(--lns-space-large)}.md-bottom\:xlarge{bottom:var(--lns-space-xlarge)}.md-bottom\:xxlarge{bottom:var(--lns-space-xxlarge)}.md-left\:0{left:0}.md-left\:auto{left:auto}.md-left\:xsmall{left:var(--lns-space-xsmall)}.md-left\:small{left:var(--lns-space-small)}.md-left\:medium{left:var(--lns-space-medium)}.md-left\:large{left:var(--lns-space-large)}.md-left\:xlarge{left:var(--lns-space-xlarge)}.md-left\:xxlarge{left:var(--lns-space-xxlarge)}.md-right\:0{right:0}.md-right\:auto{right:auto}.md-right\:xsmall{right:var(--lns-space-xsmall)}.md-right\:small{right:var(--lns-space-small)}.md-right\:medium{right:var(--lns-space-medium)}.md-right\:large{right:var(--lns-space-large)}.md-right\:xlarge{right:var(--lns-space-xlarge)}.md-right\:xxlarge{right:var(--lns-space-xxlarge)}.md-width\:auto{width:auto}.md-width\:full{width:100%}.md-width\:0{width:0}.md-minWidth\:0{min-width:0}.md-height\:auto{height:auto}.md-height\:full{height:100%}.md-height\:0{height:0}.md-ellipsis{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.md-srOnly{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0}}@media(min-width:75em){.lg-c\:red{color:var(--lns-color-red)}.lg-c\:blurpleLight{color:var(--lns-color-blurpleLight)}.lg-c\:blurpleMedium{color:var(--lns-color-blurpleMedium)}.lg-c\:blurple{color:var(--lns-color-blurple)}.lg-c\:blurpleDark{color:var(--lns-color-blurpleDark)}.lg-c\:offWhite{color:var(--lns-color-offWhite)}.lg-c\:blueLight{color:var(--lns-color-blueLight)}.lg-c\:blue{color:var(--lns-color-blue)}.lg-c\:blueDark{color:var(--lns-color-blueDark)}.lg-c\:orangeLight{color:var(--lns-color-orangeLight)}.lg-c\:orange{color:var(--lns-color-orange)}.lg-c\:orangeDark{color:var(--lns-color-orangeDark)}.lg-c\:tealLight{color:var(--lns-color-tealLight)}.lg-c\:teal{color:var(--lns-color-teal)}.lg-c\:tealDark{color:var(--lns-color-tealDark)}.lg-c\:yellowLight{color:var(--lns-color-yellowLight)}.lg-c\:yellow{color:var(--lns-color-yellow)}.lg-c\:yellowDark{color:var(--lns-color-yellowDark)}.lg-c\:grey8{color:var(--lns-color-grey8)}.lg-c\:grey7{color:var(--lns-color-grey7)}.lg-c\:grey6{color:var(--lns-color-grey6)}.lg-c\:grey5{color:var(--lns-color-grey5)}.lg-c\:grey4{color:var(--lns-color-grey4)}.lg-c\:grey3{color:var(--lns-color-grey3)}.lg-c\:grey2{color:var(--lns-color-grey2)}.lg-c\:grey1{color:var(--lns-color-grey1)}.lg-c\:white{color:var(--lns-color-white)}.lg-c\:primary{color:var(--lns-color-primary)}.lg-c\:primaryHover{color:var(--lns-color-primaryHover)}.lg-c\:primaryActive{color:var(--lns-color-primaryActive)}.lg-c\:body{color:var(--lns-color-body)}.lg-c\:bodyDimmed{color:var(--lns-color-bodyDimmed)}.lg-c\:background{color:var(--lns-color-background)}.lg-c\:backgroundHover{color:var(--lns-color-backgroundHover)}.lg-c\:backgroundActive{color:var(--lns-color-backgroundActive)}.lg-c\:backgroundSecondary{color:var(--lns-color-backgroundSecondary)}.lg-c\:backgroundSecondary2{color:var(--lns-color-backgroundSecondary2)}.lg-c\:overlay{color:var(--lns-color-overlay)}.lg-c\:border{color:var(--lns-color-border)}.lg-c\:focusRing{color:var(--lns-color-focusRing)}.lg-c\:record{color:var(--lns-color-record)}.lg-c\:recordHover{color:var(--lns-color-recordHover)}.lg-c\:recordActive{color:var(--lns-color-recordActive)}.lg-c\:info{color:var(--lns-color-info)}.lg-c\:success{color:var(--lns-color-success)}.lg-c\:warning{color:var(--lns-color-warning)}.lg-c\:danger{color:var(--lns-color-danger)}.lg-c\:dangerHover{color:var(--lns-color-dangerHover)}.lg-c\:dangerActive{color:var(--lns-color-dangerActive)}.lg-c\:backdrop{color:var(--lns-color-backdrop)}.lg-c\:backdropDark{color:var(--lns-color-backdropDark)}.lg-c\:backdropTwilight{color:var(--lns-color-backdropTwilight)}.lg-c\:disabledContent{color:var(--lns-color-disabledContent)}.lg-c\:highlight{color:var(--lns-color-highlight)}.lg-c\:disabledBackground{color:var(--lns-color-disabledBackground)}.lg-c\:formFieldBorder{color:var(--lns-color-formFieldBorder)}.lg-c\:formFieldBackground{color:var(--lns-color-formFieldBackground)}.lg-c\:buttonBorder{color:var(--lns-color-buttonBorder)}.lg-c\:upgrade{color:var(--lns-color-upgrade)}.lg-c\:upgradeHover{color:var(--lns-color-upgradeHover)}.lg-c\:upgradeActive{color:var(--lns-color-upgradeActive)}.lg-c\:tabBackground{color:var(--lns-color-tabBackground)}.lg-c\:discoveryBackground{color:var(--lns-color-discoveryBackground)}.lg-c\:discoveryLightBackground{color:var(--lns-color-discoveryLightBackground)}.lg-c\:discoveryTitle{color:var(--lns-color-discoveryTitle)}.lg-c\:discoveryHighlight{color:var(--lns-color-discoveryHighlight)}.lg-shadow\:small{box-shadow:var(--lns-shadow-small)}.lg-shadow\:medium{box-shadow:var(--lns-shadow-medium)}.lg-shadow\:large{box-shadow:var(--lns-shadow-large)}.lg-radius\:medium{border-radius:var(--lns-radius-medium)}.lg-radius\:large{border-radius:var(--lns-radius-large)}.lg-radius\:xlarge{border-radius:var(--lns-radius-xlarge)}.lg-radius\:full{border-radius:var(--lns-radius-full)}.lg-bgc\:red{background-color:var(--lns-color-red)}.lg-bgc\:blurpleLight{background-color:var(--lns-color-blurpleLight)}.lg-bgc\:blurpleMedium{background-color:var(--lns-color-blurpleMedium)}.lg-bgc\:blurple{background-color:var(--lns-color-blurple)}.lg-bgc\:blurpleDark{background-color:var(--lns-color-blurpleDark)}.lg-bgc\:offWhite{background-color:var(--lns-color-offWhite)}.lg-bgc\:blueLight{background-color:var(--lns-color-blueLight)}.lg-bgc\:blue{background-color:var(--lns-color-blue)}.lg-bgc\:blueDark{background-color:var(--lns-color-blueDark)}.lg-bgc\:orangeLight{background-color:var(--lns-color-orangeLight)}.lg-bgc\:orange{background-color:var(--lns-color-orange)}.lg-bgc\:orangeDark{background-color:var(--lns-color-orangeDark)}.lg-bgc\:tealLight{background-color:var(--lns-color-tealLight)}.lg-bgc\:teal{background-color:var(--lns-color-teal)}.lg-bgc\:tealDark{background-color:var(--lns-color-tealDark)}.lg-bgc\:yellowLight{background-color:var(--lns-color-yellowLight)}.lg-bgc\:yellow{background-color:var(--lns-color-yellow)}.lg-bgc\:yellowDark{background-color:var(--lns-color-yellowDark)}.lg-bgc\:grey8{background-color:var(--lns-color-grey8)}.lg-bgc\:grey7{background-color:var(--lns-color-grey7)}.lg-bgc\:grey6{background-color:var(--lns-color-grey6)}.lg-bgc\:grey5{background-color:var(--lns-color-grey5)}.lg-bgc\:grey4{background-color:var(--lns-color-grey4)}.lg-bgc\:grey3{background-color:var(--lns-color-grey3)}.lg-bgc\:grey2{background-color:var(--lns-color-grey2)}.lg-bgc\:grey1{background-color:var(--lns-color-grey1)}.lg-bgc\:white{background-color:var(--lns-color-white)}.lg-bgc\:primary{background-color:var(--lns-color-primary)}.lg-bgc\:primaryHover{background-color:var(--lns-color-primaryHover)}.lg-bgc\:primaryActive{background-color:var(--lns-color-primaryActive)}.lg-bgc\:body{background-color:var(--lns-color-body)}.lg-bgc\:bodyDimmed{background-color:var(--lns-color-bodyDimmed)}.lg-bgc\:background{background-color:var(--lns-color-background)}.lg-bgc\:backgroundHover{background-color:var(--lns-color-backgroundHover)}.lg-bgc\:backgroundActive{background-color:var(--lns-color-backgroundActive)}.lg-bgc\:backgroundSecondary{background-color:var(--lns-color-backgroundSecondary)}.lg-bgc\:backgroundSecondary2{background-color:var(--lns-color-backgroundSecondary2)}.lg-bgc\:overlay{background-color:var(--lns-color-overlay)}.lg-bgc\:border{background-color:var(--lns-color-border)}.lg-bgc\:focusRing{background-color:var(--lns-color-focusRing)}.lg-bgc\:record{background-color:var(--lns-color-record)}.lg-bgc\:recordHover{background-color:var(--lns-color-recordHover)}.lg-bgc\:recordActive{background-color:var(--lns-color-recordActive)}.lg-bgc\:info{background-color:var(--lns-color-info)}.lg-bgc\:success{background-color:var(--lns-color-success)}.lg-bgc\:warning{background-color:var(--lns-color-warning)}.lg-bgc\:danger{background-color:var(--lns-color-danger)}.lg-bgc\:dangerHover{background-color:var(--lns-color-dangerHover)}.lg-bgc\:dangerActive{background-color:var(--lns-color-dangerActive)}.lg-bgc\:backdrop{background-color:var(--lns-color-backdrop)}.lg-bgc\:backdropDark{background-color:var(--lns-color-backdropDark)}.lg-bgc\:backdropTwilight{background-color:var(--lns-color-backdropTwilight)}.lg-bgc\:disabledContent{background-color:var(--lns-color-disabledContent)}.lg-bgc\:highlight{background-color:var(--lns-color-highlight)}.lg-bgc\:disabledBackground{background-color:var(--lns-color-disabledBackground)}.lg-bgc\:formFieldBorder{background-color:var(--lns-color-formFieldBorder)}.lg-bgc\:formFieldBackground{background-color:var(--lns-color-formFieldBackground)}.lg-bgc\:buttonBorder{background-color:var(--lns-color-buttonBorder)}.lg-bgc\:upgrade{background-color:var(--lns-color-upgrade)}.lg-bgc\:upgradeHover{background-color:var(--lns-color-upgradeHover)}.lg-bgc\:upgradeActive{background-color:var(--lns-color-upgradeActive)}.lg-bgc\:tabBackground{background-color:var(--lns-color-tabBackground)}.lg-bgc\:discoveryBackground{background-color:var(--lns-color-discoveryBackground)}.lg-bgc\:discoveryLightBackground{background-color:var(--lns-color-discoveryLightBackground)}.lg-bgc\:discoveryTitle{background-color:var(--lns-color-discoveryTitle)}.lg-bgc\:discoveryHighlight{background-color:var(--lns-color-discoveryHighlight)}.lg-m\:0{margin:0}.lg-m\:auto{margin:auto}.lg-m\:xsmall{margin:var(--lns-space-xsmall)}.lg-m\:small{margin:var(--lns-space-small)}.lg-m\:medium{margin:var(--lns-space-medium)}.lg-m\:large{margin:var(--lns-space-large)}.lg-m\:xlarge{margin:var(--lns-space-xlarge)}.lg-m\:xxlarge{margin:var(--lns-space-xxlarge)}.lg-mt\:0{margin-top:0}.lg-mt\:auto{margin-top:auto}.lg-mt\:xsmall{margin-top:var(--lns-space-xsmall)}.lg-mt\:small{margin-top:var(--lns-space-small)}.lg-mt\:medium{margin-top:var(--lns-space-medium)}.lg-mt\:large{margin-top:var(--lns-space-large)}.lg-mt\:xlarge{margin-top:var(--lns-space-xlarge)}.lg-mt\:xxlarge{margin-top:var(--lns-space-xxlarge)}.lg-mb\:0{margin-bottom:0}.lg-mb\:auto{margin-bottom:auto}.lg-mb\:xsmall{margin-bottom:var(--lns-space-xsmall)}.lg-mb\:small{margin-bottom:var(--lns-space-small)}.lg-mb\:medium{margin-bottom:var(--lns-space-medium)}.lg-mb\:large{margin-bottom:var(--lns-space-large)}.lg-mb\:xlarge{margin-bottom:var(--lns-space-xlarge)}.lg-mb\:xxlarge{margin-bottom:var(--lns-space-xxlarge)}.lg-ml\:0{margin-left:0}.lg-ml\:auto{margin-left:auto}.lg-ml\:xsmall{margin-left:var(--lns-space-xsmall)}.lg-ml\:small{margin-left:var(--lns-space-small)}.lg-ml\:medium{margin-left:var(--lns-space-medium)}.lg-ml\:large{margin-left:var(--lns-space-large)}.lg-ml\:xlarge{margin-left:var(--lns-space-xlarge)}.lg-ml\:xxlarge{margin-left:var(--lns-space-xxlarge)}.lg-mr\:0{margin-right:0}.lg-mr\:auto{margin-right:auto}.lg-mr\:xsmall{margin-right:var(--lns-space-xsmall)}.lg-mr\:small{margin-right:var(--lns-space-small)}.lg-mr\:medium{margin-right:var(--lns-space-medium)}.lg-mr\:large{margin-right:var(--lns-space-large)}.lg-mr\:xlarge{margin-right:var(--lns-space-xlarge)}.lg-mr\:xxlarge{margin-right:var(--lns-space-xxlarge)}.lg-mx\:0{margin-left:0;margin-right:0}.lg-mx\:auto{margin-left:auto;margin-right:auto}.lg-mx\:xsmall{margin-left:var(--lns-space-xsmall);margin-right:var(--lns-space-xsmall)}.lg-mx\:small{margin-left:var(--lns-space-small);margin-right:var(--lns-space-small)}.lg-mx\:medium{margin-left:var(--lns-space-medium);margin-right:var(--lns-space-medium)}.lg-mx\:large{margin-left:var(--lns-space-large);margin-right:var(--lns-space-large)}.lg-mx\:xlarge{margin-left:var(--lns-space-xlarge);margin-right:var(--lns-space-xlarge)}.lg-mx\:xxlarge{margin-left:var(--lns-space-xxlarge);margin-right:var(--lns-space-xxlarge)}.lg-my\:0{margin-top:0;margin-bottom:0}.lg-my\:auto{margin-top:auto;margin-bottom:auto}.lg-my\:xsmall{margin-top:var(--lns-space-xsmall);margin-bottom:var(--lns-space-xsmall)}.lg-my\:small{margin-top:var(--lns-space-small);margin-bottom:var(--lns-space-small)}.lg-my\:medium{margin-top:var(--lns-space-medium);margin-bottom:var(--lns-space-medium)}.lg-my\:large{margin-top:var(--lns-space-large);margin-bottom:var(--lns-space-large)}.lg-my\:xlarge{margin-top:var(--lns-space-xlarge);margin-bottom:var(--lns-space-xlarge)}.lg-my\:xxlarge{margin-top:var(--lns-space-xxlarge);margin-bottom:var(--lns-space-xxlarge)}.lg-p\:0{padding:0}.lg-p\:xsmall{padding:var(--lns-space-xsmall)}.lg-p\:small{padding:var(--lns-space-small)}.lg-p\:medium{padding:var(--lns-space-medium)}.lg-p\:large{padding:var(--lns-space-large)}.lg-p\:xlarge{padding:var(--lns-space-xlarge)}.lg-p\:xxlarge{padding:var(--lns-space-xxlarge)}.lg-pt\:0{padding-top:0}.lg-pt\:xsmall{padding-top:var(--lns-space-xsmall)}.lg-pt\:small{padding-top:var(--lns-space-small)}.lg-pt\:medium{padding-top:var(--lns-space-medium)}.lg-pt\:large{padding-top:var(--lns-space-large)}.lg-pt\:xlarge{padding-top:var(--lns-space-xlarge)}.lg-pt\:xxlarge{padding-top:var(--lns-space-xxlarge)}.lg-pb\:0{padding-bottom:0}.lg-pb\:xsmall{padding-bottom:var(--lns-space-xsmall)}.lg-pb\:small{padding-bottom:var(--lns-space-small)}.lg-pb\:medium{padding-bottom:var(--lns-space-medium)}.lg-pb\:large{padding-bottom:var(--lns-space-large)}.lg-pb\:xlarge{padding-bottom:var(--lns-space-xlarge)}.lg-pb\:xxlarge{padding-bottom:var(--lns-space-xxlarge)}.lg-pl\:0{padding-left:0}.lg-pl\:xsmall{padding-left:var(--lns-space-xsmall)}.lg-pl\:small{padding-left:var(--lns-space-small)}.lg-pl\:medium{padding-left:var(--lns-space-medium)}.lg-pl\:large{padding-left:var(--lns-space-large)}.lg-pl\:xlarge{padding-left:var(--lns-space-xlarge)}.lg-pl\:xxlarge{padding-left:var(--lns-space-xxlarge)}.lg-pr\:0{padding-right:0}.lg-pr\:xsmall{padding-right:var(--lns-space-xsmall)}.lg-pr\:small{padding-right:var(--lns-space-small)}.lg-pr\:medium{padding-right:var(--lns-space-medium)}.lg-pr\:large{padding-right:var(--lns-space-large)}.lg-pr\:xlarge{padding-right:var(--lns-space-xlarge)}.lg-pr\:xxlarge{padding-right:var(--lns-space-xxlarge)}.lg-px\:0{padding-left:0;padding-right:0}.lg-px\:xsmall{padding-left:var(--lns-space-xsmall);padding-right:var(--lns-space-xsmall)}.lg-px\:small{padding-left:var(--lns-space-small);padding-right:var(--lns-space-small)}.lg-px\:medium{padding-left:var(--lns-space-medium);padding-right:var(--lns-space-medium)}.lg-px\:large{padding-left:var(--lns-space-large);padding-right:var(--lns-space-large)}.lg-px\:xlarge{padding-left:var(--lns-space-xlarge);padding-right:var(--lns-space-xlarge)}.lg-px\:xxlarge{padding-left:var(--lns-space-xxlarge);padding-right:var(--lns-space-xxlarge)}.lg-py\:0{padding-top:0;padding-bottom:0}.lg-py\:xsmall{padding-top:var(--lns-space-xsmall);padding-bottom:var(--lns-space-xsmall)}.lg-py\:small{padding-top:var(--lns-space-small);padding-bottom:var(--lns-space-small)}.lg-py\:medium{padding-top:var(--lns-space-medium);padding-bottom:var(--lns-space-medium)}.lg-py\:large{padding-top:var(--lns-space-large);padding-bottom:var(--lns-space-large)}.lg-py\:xlarge{padding-top:var(--lns-space-xlarge);padding-bottom:var(--lns-space-xlarge)}.lg-py\:xxlarge{padding-top:var(--lns-space-xxlarge);padding-bottom:var(--lns-space-xxlarge)}.lg-text\:small{font-size:var(--lns-fontSize-small);line-height:var(--lns-lineHeight-small)}.lg-text\:body-sm{font-size:var(--lns-fontSize-body-sm);line-height:var(--lns-lineHeight-body-sm)}.lg-text\:medium{font-size:var(--lns-fontSize-medium);line-height:var(--lns-lineHeight-medium)}.lg-text\:body-md{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md)}.lg-text\:large{font-size:var(--lns-fontSize-large);line-height:var(--lns-lineHeight-large)}.lg-text\:body-lg{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg)}.lg-text\:xlarge{font-size:var(--lns-fontSize-xlarge);line-height:var(--lns-lineHeight-xlarge)}.lg-text\:heading-sm{font-size:var(--lns-fontSize-heading-sm);line-height:var(--lns-lineHeight-heading-sm)}.lg-text\:xxlarge{font-size:var(--lns-fontSize-xxlarge);line-height:var(--lns-lineHeight-xxlarge)}.lg-text\:heading-md{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md)}.lg-text\:xxxlarge{font-size:var(--lns-fontSize-xxxlarge);line-height:var(--lns-lineHeight-xxxlarge)}.lg-text\:heading-lg{font-size:var(--lns-fontSize-heading-lg);line-height:var(--lns-lineHeight-heading-lg)}.lg-weight\:book{font-weight:var(--lns-fontWeight-book)}.lg-weight\:bold{font-weight:var(--lns-fontWeight-bold)}.lg-text\:body{font-size:var(--lns-fontSize-body-md);line-height:var(--lns-lineHeight-body-md);font-weight:var(--lns-fontWeight-book)}.lg-text\:title{font-size:var(--lns-fontSize-body-lg);line-height:var(--lns-lineHeight-body-lg);font-weight:var(--lns-fontWeight-bold)}.lg-text\:mainTitle{font-size:var(--lns-fontSize-heading-md);line-height:var(--lns-lineHeight-heading-md);font-weight:var(--lns-fontWeight-bold)}.lg-text\:left{text-align:left}.lg-text\:right{text-align:right}.lg-text\:center{text-align:center}.lg-border{border:1px solid var(--lns-color-border)}.lg-borderTop{border-top:1px solid var(--lns-color-border)}.lg-borderBottom{border-bottom:1px solid var(--lns-color-border)}.lg-borderLeft{border-left:1px solid var(--lns-color-border)}.lg-borderRight{border-right:1px solid var(--lns-color-border)}.lg-inline{display:inline}.lg-block{display:block}.lg-flex{display:flex}.lg-inlineBlock{display:inline-block}.lg-inlineFlex{display:inline-flex}.lg-none{display:none}.lg-flexWrap{flex-wrap:wrap}.lg-flexDirection\:column{flex-direction:column}.lg-flexDirection\:row{flex-direction:row}.lg-items\:stretch{align-items:stretch}.lg-items\:center{align-items:center}.lg-items\:baseline{align-items:baseline}.lg-items\:flexStart{align-items:flex-start}.lg-items\:flexEnd{align-items:flex-end}.lg-items\:selfStart{align-items:self-start}.lg-items\:selfEnd{align-items:self-end}.lg-justify\:flexStart{justify-content:flex-start}.lg-justify\:flexEnd{justify-content:flex-end}.lg-justify\:center{justify-content:center}.lg-justify\:spaceBetween{justify-content:space-between}.lg-justify\:spaceAround{justify-content:space-around}.lg-justify\:spaceEvenly{justify-content:space-evenly}.lg-grow\:0{flex-grow:0}.lg-grow\:1{flex-grow:1}.lg-shrink\:0{flex-shrink:0}.lg-shrink\:1{flex-shrink:1}.lg-self\:auto{align-self:auto}.lg-self\:flexStart{align-self:flex-start}.lg-self\:flexEnd{align-self:flex-end}.lg-self\:center{align-self:center}.lg-self\:baseline{align-self:baseline}.lg-self\:stretch{align-self:stretch}.lg-overflow\:hidden{overflow:hidden}.lg-overflow\:auto{overflow:auto}.lg-relative{position:relative}.lg-absolute{position:absolute}.lg-sticky{position:sticky}.lg-fixed{position:fixed}.lg-top\:0{top:0}.lg-top\:auto{top:auto}.lg-top\:xsmall{top:var(--lns-space-xsmall)}.lg-top\:small{top:var(--lns-space-small)}.lg-top\:medium{top:var(--lns-space-medium)}.lg-top\:large{top:var(--lns-space-large)}.lg-top\:xlarge{top:var(--lns-space-xlarge)}.lg-top\:xxlarge{top:var(--lns-space-xxlarge)}.lg-bottom\:0{bottom:0}.lg-bottom\:auto{bottom:auto}.lg-bottom\:xsmall{bottom:var(--lns-space-xsmall)}.lg-bottom\:small{bottom:var(--lns-space-small)}.lg-bottom\:medium{bottom:var(--lns-space-medium)}.lg-bottom\:large{bottom:var(--lns-space-large)}.lg-bottom\:xlarge{bottom:var(--lns-space-xlarge)}.lg-bottom\:xxlarge{bottom:var(--lns-space-xxlarge)}.lg-left\:0{left:0}.lg-left\:auto{left:auto}.lg-left\:xsmall{left:var(--lns-space-xsmall)}.lg-left\:small{left:var(--lns-space-small)}.lg-left\:medium{left:var(--lns-space-medium)}.lg-left\:large{left:var(--lns-space-large)}.lg-left\:xlarge{left:var(--lns-space-xlarge)}.lg-left\:xxlarge{left:var(--lns-space-xxlarge)}.lg-right\:0{right:0}.lg-right\:auto{right:auto}.lg-right\:xsmall{right:var(--lns-space-xsmall)}.lg-right\:small{right:var(--lns-space-small)}.lg-right\:medium{right:var(--lns-space-medium)}.lg-right\:large{right:var(--lns-space-large)}.lg-right\:xlarge{right:var(--lns-space-xlarge)}.lg-right\:xxlarge{right:var(--lns-space-xxlarge)}.lg-width\:auto{width:auto}.lg-width\:full{width:100%}.lg-width\:0{width:0}.lg-minWidth\:0{min-width:0}.lg-height\:auto{height:auto}.lg-height\:full{height:100%}.lg-height\:0{height:0}.lg-ellipsis{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.lg-srOnly{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0}}
  
            #inner-shadow-companion {
              --lns-unit: 8px;
              all: initial;
              font-family: circular, Helvetica, sans-serif;
              color: var(--lns-color-body);
            }
            #tooltip-mount-layer-companion {
              z-index: 2147483646;
              position: relative;

              color: var(--lns-color-body);
              pointer-events: auto;
            }
          </style><div class="companion-1b6rwsq"></div></div></template></section></div></body></html>