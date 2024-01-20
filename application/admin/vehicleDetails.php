<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	$id = $_SESSION['uid'];
	$udata = getAllUser();

	// vehicle assign code start jass
	if(isset($_POST["Submit_assign"]))
	{
		$owner_id = $_POST["user_id"];
		$r_no = $_POST["reg_no"];
		$customer_id = $_POST["customer_id"];

		$sql="SELECT * FROM user WHERE id='$owner_id'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$fullname = $row["firstname"]." ".$row["lastname"];
		// $owner_id = $id;
		$is_assigned = "Assigned";

		$sql="SELECT * FROM vehicle WHERE reg_no='$r_no'";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$vid=$row["id"];
		

		$sql = "SELECT * FROM customer WHERE id = '$customer_id'";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$company_name=$row["company_name"];

		$sql="INSERT INTO display_status (owner_id,reg_no,vid,owner,is_assigned,customer_id,company_name) VALUES ('$owner_id','$r_no','$vid','$fullname','$is_assigned','$customer_id','$company_name')";
		if(mysqli_query($conn,$sql))
		{
			echo '<script>alert("Vehicle '.$r_no.' has been assigned!");</script>';
		}
		else
		{
			echo '<script>alert("Cannot assign Vehicle '.$r_no.'");</script>';
		}
		
		$sql="UPDATE vehicle SET is_assigned='true' WHERE id='$vid'";
		mysqli_query($conn,$sql);

	}
	// end assign

	// display table respective to previlages
	$sql="SELECT * FROM employee WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$col=$row["vehicle_master"];
	$tedit=1;
	$tview=1;
	if(strpos($col, "edit")===false)
	{
		$tedit=0;
	}
	if(strpos($col, "view")===false)
	{
		$tview=0;
	}

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
					$path = "../uploads/vehicle_documents/rc_upload/";
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
					$path = "../uploads/vehicle_documents/fitness/";
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
					$path = "../uploads/vehicle_documents/permit/";
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
					$path = "../uploads/vehicle_documents/insurence/";
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
					$path = "../uploads/vehicle_documents/speed_limit_device/";
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
					$path = "../uploads/vehicle_documents/reflective_tape/";
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
					$path = "../uploads/vehicle_documents/tax_token/";
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
					$path = "../uploads/vehicle_documents/pollution/";
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

			
			$data['user_id'] = $_POST['user_id'];
		    $data['customer_id'] =$_POST['customer'];
			$data['reg_no'] = $_POST['reg_no'];
			$data['model'] = $_POST['model'];
			$data['mfg_by'] = $_POST['mfg_by'];
			$data['mfg_date'] = $_POST['mfg_date'];
			$data['reg_date'] = $_POST['reg_date'];
		    if(!empty($rc_upload))
		    {
		    	$data['rc_upload'] =$rc_upload;
		    }
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include('includes/commonFooter.php');?>
 <?php
 // print_R($_SESSION);die();
 	// $_SESSION['success'] = '';
 	// $_SESSION['error'] = '';
	if($_SESSION)
	{
		if($_SESSION['error'])
		{
			$msg = $_SESSION['error'];
			echo "<script> showErrorMsgBox('".$msg."');</script>";
			$_SESSION['error'] = '';
		}
		if($_SESSION['success'])
		{
			$msg = $_SESSION['success'];
			echo "<script> showSuccessMsgBox('".$msg."');</script>";
			$_SESSION['success'] = '';
		}
	}

	
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Vehicle Details
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vehicle Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">ADD NEW VEHICLE</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:30px;">
				<style type="text/css">
		            #auto_ul {
		                float: left;
		                list-style: none;
		                padding: 0px;
		                border: 1px solid black;
		                margin-top: 0px;
		            }

		            input, #auto_ul {
		                width: 250px;
		            }

		            #auto_li:hover {
		                color: white;
		                background-color: green;
		                background: #0088cc;
		            }
		        </style>
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">USER</label>
	                        <div class="col-sm-4">
	                            <select class="form-control"  name="user_id" id="user_id" >
	                            	<option value=''>Select</option>
	                                <?php
	                                if($udata)
	                                {
	                                	foreach ($udata as $val) 
	                                	{
	                                		?>
	                                		  <option value='<?php echo $val['id']; ?>'> <?php echo $val['firstname']." ".$val['lastname'] ?></option>
	                                		<?php
	                                	}
	                                 
	                                }
	                                ?>
	                            </select>
	                        </div>

	                    <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            COMPANY </label>
                        <div class="col-sm-4">
                           <?php $sa = getAllData('customer'); ?>
                            <select class="form-control"  name="customer" id="customer">
                                   <option value ="0">Please Select</option>
                               <?php 
                               foreach( $sa as $val)
                               {
                                   ?>
                                   <option value="<?php echo $val['id'];?>"><?php echo $val['company_name']; ?></option>
                                   <?php
                               }
                               ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            REGISTRATION NO.</label>
                        <div class="col-sm-4">
                            <input type="text" name="reg_no" class="form-control" id="reg_no" placeholder="REGISTRATION NO." required="required"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            MODEL</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="model" id="model" placeholder="MODEL" required="required" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                             DATE OF MANUFACTURE</label>
                        <div class="col-sm-4">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="mfg_date" id="mfg_date"   required="required" placeholder="DATE OF MANUFACTURE" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                             DATE OF REGISTRATION</label>
                        <div class="col-sm-4">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="reg_date" id="mfg_date"   required="required" placeholder="DATE OF REGISTRATION" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            MANUFACTURED BY</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="mfg_by" id="mfg_by" placeholder="MANUFACTURED BY" required="required" />
                        </div>

                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            RC UPLOAD</label>
                        <div class="col-sm-2">
                            <input type="file" class="form-control" name="rc_upload" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">FITNESS</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="fitness_issue_date" id="issue_date"    placeholder="ISSUE DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="fitness_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="fitness_document"/>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">PERMIT</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="permit_issue_date" id="issue_date"  placeholder="ISSUE DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="permit_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="permit_document"/>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">INSURANCE</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="insurence_issue_date" id="issue_date" placeholder="ISSUE Date" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="insurence_expiry_date" id="expiry_date" placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="insurence_document"/>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">SPEED LIMIT DEVICE</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="sld_issue_date" id="issue_date"    placeholder="ISSUE DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="sld_expiry_date" id="expiry_date"    placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="sld_document"  />
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">REFECTIVE TAPE</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="rt_issue_date" id="issue_date"   placeholder="ISSUE DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="rt_expiry_date" id="expiry_date"    placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="rt_document" />
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">ROAD TAX</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="tt_issue_date" id="issue_date"   placeholder="ISSUE DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="tt_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="tt_document"  />
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">POLLUTION</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="pollution_issue_date" id="issue_date"   placeholder="ISSUE DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="pollution_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="pollution_document"  />
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>
                       
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='add' value="Add" class="submit btn btn-primary btn-sm">
                               
                            <!-- <button type="reset" class="submit btn btn-default btn-sm">
                                Cancel</button> -->
                        </div>
                    </div>
                </form>
			</div>
				<!-- /.box-body -->
	    </div>
      	<div class="box box-success" >
				<div class="box-header with-border">
					<h3 class="box-title"><p style="font-size: 14px">ALL VEHICLE DETAILS</p></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<style type="text/css">
									
				    @media screen and (max-width: 600px) {
				  .searchform {
				    width: 80% ! important;
				    }
				  }
				</style>
				<div class="box-body " style="padding:20px;">
					<!-- <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Vehicle</a><br/><br/> -->
                                <form action="" method="post">
                                    <div class="input-group mb-3" style="display: inline;">
                                        <input type="text" class="form-control searchform a1" placeholder="Search" name="search" style="width: 20%">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                            
                                            <?php
					                		$emp = $admData['vehicle_master'];
					                		$empp = explode(',', $emp);
					                		foreach($empp as $vals)
					                		{
					                			if($vals == 'add')
					                			{
					                				?>
                                            <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Vehicle</a>
                                            <?php
						                			}
						                		}
						                	?> </div>
                                	</div>
                                </form>
                              </div>
                				<!-- vikram end -->
                				
                				
					<div id="tbl" class="table-responsive">
						<table id="vehicle_tbl" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <?php if($id==1){
					                	echo'<th style="text-align:center; font-size: 12px">Sl.No.</th>
					                	<th style="text-align:center; font-size: 12px">COMPANY NAME</th>
					                <th style="text-align:center; font-size: 12px">USER</th>
					                <th style="text-align:center; font-size: 12px">REGISTRATION NO</th>
					                <th style="text-align:center; font-size: 12px">MODEL</th>
					                <th style="text-align:center; font-size: 12px">MANUFACTURED BY</th>
					                <th style="text-align:center; font-size: 12px">MANUFACTURED DATE</th>
					                <th style="text-align:center; font-size: 12px">REGISTRATION DATE</th>
					                <th style="text-align:center; font-size: 12px">ASSIGN</th>
					                <th style="text-align:center; font-size: 12px">TRACK</th>
					                <th style="text-align:center; font-size: 12px">VIEW</th>
					                <th style="text-align:center; font-size: 12px">EDIT</th>';
					                }else{
					                echo'<th style="text-align:center; font-size: 12px">Sl.No.</th>
					                <th class="aa" style="text-align:center; font-size: 12px">COMPANY NAME</th>
					                <th class="aa" style="text-align:center; font-size: 12px">USER</th>
					                <th style="text-align:center; font-size: 12px">REGISTRATION NO</th>
					                <th class="aa" style="text-align:center; font-size: 12px">MODEL</th>
					                <th class="aa" style="text-align:center; font-size: 12px">MANUFACTURED BY</th>
					                <th class="aa" style="text-align:center; font-size: 12px">MANUFACTURED DATE</th>
					                <th class="aa" style="text-align:center; font-size: 12px">REGISTRATION DATE</th>
					                <th class="aa" style="text-align:center; font-size: 12px">ASSIGN</th>
					                <th style="text-align:center; font-size: 12px">TRACK</th>
					                <th class="aa" style="text-align:center; font-size: 12px">VIEW</th>
					                <th class="aa" style="text-align:center; font-size: 12px">EDIT</th>';
					            }?>
					            </tr>
					        </thead>
					        <tbody id="tbl_body" class="striped">
					        	<?php
							//Show all vehicles to main admin (id=1)
							if($id==1)
							{
					        		if(isset($_POST["search"]))
										{
											echo '<script>
													$(document).ready(function(){
													 document.getElementById("pagination_div").style.display="none";
													});											
												</script>';
											$s_item = strtolower($_POST["search"]);
											$sql='SELECT  user.firstname  , user.lastname, user.id as uid ,vehicle.*   FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id';
											$result=mysqli_query($conn,$sql);
											$rpp=10;
											$num_rows = mysqli_num_rows($result);
							        		$num_pages = ceil($num_rows/$rpp);
							        		if (!isset($_GET['page'])) {
											  $page = 1;
											} else {
											  $page = $_GET['page'];
											}
											$cur_page = ($page-1)*$rpp;
											$c=1;
											while($row=mysqli_fetch_assoc($result))
											{
												if(strpos(strtolower($row["reg_no"]), $s_item)!==false)
												{
        									// vehicle assign sign code jass
        											if($row["is_assigned"] == 'true')
        											{
        												$assign_sub = '<button disabled="disabled" class="btn" style="background-color: grey; color: white">Assigned</button>';
        											}
        											else{
        												$assign_sub = '<button name="Submit_assign" type="submit" href="#" class="btn btn-success">Assign</button>';
        												}
													echo '<tr>
								        		<td style="text-align:center">'.$c.'</td>
								        		<td style="text-align:center">'.$row["customer_id"].'</td>
								        		<td style="text-align:center"><a href ="viewUserDetails.php?id='.$row["uid"].'">'.$row["firstname"]." ".$row["lastname"].'</a></td>
								        		<td style="text-align:center">'.$row["reg_no"].'</td>
								        		<td style="text-align:center">'.$row["model"].'</td>
								        		<td style="text-align:center">'.$row["mfg_by"].'</td>
								        		<td style="text-align:center">'.date('d-m-Y',strtotime($row['mfg_date'])).'</td>
								        		<td style="text-align:center">'.date('d-m-Y',strtotime($row['reg_date'])).'</td>
								        		<td style="text-align:center">
							                		<form class="form_assign" method="post" action="">
							                			<input type="hidden" name="user_id" value="'.$row["uid"].'">
							                			<input type="hidden" name="reg_no" value="'.$row["reg_no"].'">
							                			<input type="hidden" name="customer_id" value="'.$row["customer_id"].'">
								                		
							                			'.$assign_sub.'
								                	</form>
								                </td>
								        		<td style="text-align:center"><a href= "trackDocument.php?id='.$row["id"].'" class="">
								        		<i style="color:grey" class="fa fa-pencil"></i></a></td>';
								        		if($tview!=0)
								        		{
								        			echo '<td style="text-align:center">
										        			<a href= "viewVehicleDetails.php?id='.$row["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-eye"></i>
							                				</a>
									                	</td>';
								        		}
								        		else
								        		{
								        			echo '<td style="text-align:center">
										        			
							                					<i style="color:grey" class="fa fa-ban"></i>
							                				
									                	</td>';
								        		}
								        		if($tedit!=0)
								        		{
								        			echo '<td style="text-align:center">							        
							                				<a href= "editVehicleDetails.php?id='.$row["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-wrench"></i>
							                				</a>
									                	</td>';
								        		}	
								        		else
								        		{
								        			echo '<td style="text-align:center">
										        			
							                					<i style="color:grey" class="fa fa-ban"></i>
							                				
									                	</td>';
								        		}
								        	echo '</tr>';
								        	$c++;
											}
										}
									}
									else
									{
						        	$rpp=10;
					        		$sql = "SELECT  user.firstname  , user.lastname, user.id as uid ,vehicle.*   FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id";
					        		$result = mysqli_query($conn, $sql);
					        		$num_rows = mysqli_num_rows($result);
					        		$num_pages = ceil($num_rows/$rpp);
					        		if (!isset($_GET['page'])) {
									  $page = 1;
									} else {
									  $page = $_GET['page'];
									}
									$cur_page = ($page-1)*$rpp;
									$c=($page*10)-9;
									$sql='SELECT  user.firstname  , user.lastname, user.id as uid ,vehicle.*   FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id LIMIT ' . $cur_page . ',' .  $rpp;
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)) 
									{
										$data[] = $row;
									}
									foreach($data as $val)
									{
									// vehicle assign sign code jass
											if($val["is_assigned"] == 'true')
											{
												$assign_sub = '<button disabled="disabled" class="btn" style="background-color: grey; color: white">Assigned</button>';
											}
											else{
												$assign_sub = '<button name="Submit_assign" type="submit" href="#" class="btn btn-success">Assign</button>';
												}
									  echo '<tr><td style="text-align:center">'.$c.'</td>';
								        		?>
								        		<td style="text-align:center">
								        			<?php $company_name =$val["customer_id"];
                                                    $sql = "SELECT * FROM customer WHERE id = '$company_name'";
                                                    $result= mysqli_query($conn,$sql);
                                                    $row=mysqli_fetch_assoc($result);
                                                     $company_name = $row["company_name"];
                                                     echo $company_name;
								        			?></td>
								       <?php
								        echo'	<td style="text-align:center"><a href ="viewUserDetails.php?id='.$val["uid"].'">'.$val["firstname"]." ".$val["lastname"].'</a></td>
								        		<td style="text-align:center">'.$val["reg_no"].'</td>
								        		<td style="text-align:center">'.$val["model"].'</td>
								        		<td style="text-align:center">'.$val["mfg_by"].'</td>
								        		<td style="text-align:center">'.date('d-m-Y',strtotime($val['mfg_date'])).'</td>
								        		<td style="text-align:center">'.date('d-m-Y',strtotime($val['reg_date'])).'</td>';
                                        echo '<td style="text-align:center">
							                		<form class="form_assign" method="post" action="">
							                			<input type="hidden" name="user_id" value="'.$val["uid"].'">
							                			<input type="hidden" name="reg_no" value="'.$val["reg_no"].'">
							                			<input type="hidden" name="customer_id" value="'.$val["customer_id"].'">
								                		
							                			'.$assign_sub.'
								                	</form>
								                </td>';
								        echo '<td style="text-align:center"><a href= "trackDocument.php?id='.$val["id"].'&&customer_id='.$val["customer_id"].'" class="">
								        		<i style="color:grey" class="fa fa-pencil"></i></a></td>';
								        		if($tview!=0)
								        		{
								        			echo '<td style="text-align:center">
										        			<a href= "viewVehicleDetails.php?id='.$val["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-eye"></i>
							                				</a>
									                	</td>';
								        		}
								        		else
								        		{
								        			echo '<td style="text-align:center"><i style="color:grey" class="fa fa-ban"></i></td>';
								        		}
								        		if($tedit!=0)
								        		{
								        			echo '<td style="text-align:center">							        
							                				<a href= "editVehicleDetails.php?id='.$val["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-wrench"></i>
							                				</a>
									                	</td>';
								        		}
								        		else
								        		{
								        			echo '<td style="text-align:center"><i style="color:grey" class="fa fa-ban"></i></td>';
								        		}
								        	echo '</tr>';
								        	$c++;
									}
								}
							}
							else   // for subadmin code 
							{
							    	//getting total vehicle count for all assigned users 
							$val = 0;
							$sql = "SELECT assigned_users FROM employee WHERE id='$id'";
							$result = mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($result);
							$assigned_users=$row["assigned_users"];
							$user_emails = explode(', ', $assigned_users);
							//print_r($user_emails);
							$aa ="'". implode("', '",explode(', ',$assigned_users)) ."'";
							$sql1 = "SELECT id FROM user WHERE email IN($aa)";
							$result1 = mysqli_query($conn,$sql1);
							while ($rows = mysqli_fetch_assoc($result1)) {
								$user_data[] = $rows;
							}
							$dd = array_column($user_data, 'id');
							$List = "'".implode("', '", $dd)."'";
							
								if(isset($_POST["search"])){
											echo '<script>
													$(document).ready(function(){
													 document.getElementById("pagination_div").style.display="none";
													});											
												</script>';
											$s_item = strtolower($_POST["search"]);
											$sql = "SELECT user.firstname  , user.lastname, user.id as uid ,vehicle.*   FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id IN ($List)";
											$result=mysqli_query($conn,$sql);
											$rpp=10;
											$num_rows = mysqli_num_rows($result);
							        		$num_pages = ceil($num_rows/$rpp);
							        		if (!isset($_GET['page'])) {
											  $page = 1;
											} else {
											  $page = $_GET['page'];
											}
											$cur_page = ($page-1)*$rpp;
											$c=1;
											while($row=mysqli_fetch_assoc($result))
											{
										$data[] = $row;
									}
									foreach($data as $val)
									{
											// vehicle assign sign code jass
											if($val["is_assigned"] == 'true')
											{
												$assign_sub = '<button disabled="disabled" class="btn" style="background-color: grey; color: white">Assigned</button>';
											}
											else{
												$assign_sub = '<button name="Submit_assign" type="submit" href="#" class="btn btn-success">Assign</button>';
												}
											if(strpos(strtolower($val["reg_no"]), $s_item)!==false)
												{
									  echo '<tr><td style="text-align:center">'.$c.'</td>';
								        		?>
								        		<td class="aa" style="text-align:center">
								        			<?php $company_name =$val["customer_id"];
                                                    $sql = "SELECT * FROM customer WHERE id = '$company_name'";
                                                    $result= mysqli_query($conn,$sql);
                                                    $row=mysqli_fetch_assoc($result);
                                                     $company_name = $row["company_name"];
                                                     echo $company_name;
								        			?></td>
								       <?php
								        echo'	<td class="aa" style="text-align:center"><a href ="viewUserDetails.php?id='.$val["uid"].'">'.$val["firstname"]." ".$val["lastname"].'</a></td>
								        		<td style="text-align:center">'.$val["reg_no"].'</td>
								        		<td class="aa" style="text-align:center">'.$val["model"].'</td>
								        		<td class="aa" style="text-align:center">'.$val["mfg_by"].'</td>
								        		<td class="aa" style="text-align:center">'.date('d-m-Y',strtotime($val['mfg_date'])).'</td>
								        		<td class="aa" style="text-align:center">'.date('d-m-Y',strtotime($val['reg_date'])).'</td>';
                                        echo '<td class="aa" style="text-align:center">
							                		<form class="form_assign" method="post" action="">
							                			<input type="hidden" name="user_id" value="'.$val["uid"].'">
							                			<input type="hidden" name="reg_no" value="'.$val["reg_no"].'">
							                			<input type="hidden" name="customer_id" value="'.$val["customer_id"].'">
								                		
							                			'.$assign_sub.'
								                	</form>
								                </td>';
								        echo '<td style="text-align:center"><a href= "trackDocument.php?id='.$val["id"].'&&customer_id='.$val["customer_id"].'" class="">
								        		<i style="color:grey" class="fa fa-pencil"></i></a></td>';
								        		if($tview!=0)
								        		{
								        			echo '<td class="aa" style="text-align:center">
										        			<a href= "viewVehicleDetails.php?id='.$val["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-eye"></i>
							                				</a>
									                	</td>';
								        		}
								        		else
								        		{
								        			echo '<td class="aa" style="text-align:center"><i style="color:grey" class="fa fa-ban"></i></td>';
								        		}
								        		if($tedit!=0)
								        		{
								        			echo '<td class="aa" style="text-align:center">							        
							                				<a href= "editVehicleDetails.php?id='.$val["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-wrench"></i>
							                				</a>
									                	</td>';
								        		}
								        		else
								        		{
								        			echo '<td class="aa" style="text-align:center"><i style="color:grey" class="fa fa-ban"></i></td>';
								        		}
								        	echo '</tr>';
								        	$c++;
								        }
										}

									}else{
						         	$rpp=10;
					        		$sql = "SELECT user.firstname, user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id IN($List) ";
					        		$result = mysqli_query($conn, $sql);
					        		$num_rows = mysqli_num_rows($result);
					        		$val = $val + $num_rows;
					        		$num_pages = ceil($val/$rpp);
					        		if (!isset($_GET['page'])) {                              
									  $page = 1;
									} else {
									  $page = $_GET['page'];
									}
									$cur_page = ($page-1)*$rpp;
                                   $c=($page*10)-9;
                                 $sql = "SELECT user.firstname, user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id IN ($List) LIMIT " .$cur_page. ','. $rpp;
                                  $result = mysqli_query($conn, $sql);
									 while($row = mysqli_fetch_assoc($result)) 
									{
										$data[] = $row;
									}
									foreach($data as $val)
									{
									// vehicle assign sign code jass
											if($val["is_assigned"] == 'true')
											{
												$assign_sub = '<button disabled="disabled" class="btn" style="background-color: grey; color: white">Assigned</button>';
											}
											else{
												$assign_sub = '<button name="Submit_assign" type="submit" href="#" class="btn btn-success">Assign</button>';
												}
									  echo '<tr><td style="text-align:center">'.$c.'</td>';
								        		?>
								        		<td class="aa" style="text-align:center">
								        			<?php $company_name =$val["customer_id"];
                                                    $sql = "SELECT * FROM customer WHERE id = '$company_name'";
                                                    $result= mysqli_query($conn,$sql);
                                                    $row=mysqli_fetch_assoc($result);
                                                     $company_name = $row["company_name"];
                                                     echo $company_name;
								        			?></td>
								       <?php
								        echo'	<td class="aa" style="text-align:center"><a href ="viewUserDetails.php?id='.$val["uid"].'">'.$val["firstname"]." ".$val["lastname"].'</a></td>
								        		<td style="text-align:center">'.$val["reg_no"].'</td>
								        		<td class="aa" style="text-align:center">'.$val["model"].'</td>
								        		<td class="aa" style="text-align:center">'.$val["mfg_by"].'</td>
								        		<td class="aa" style="text-align:center">'.date('d-m-Y',strtotime($val['mfg_date'])).'</td>
								        		<td class="aa" style="text-align:center">'.date('d-m-Y',strtotime($val['reg_date'])).'</td>';
                                        echo '<td class="aa" style="text-align:center">
							                		<form class="form_assign" method="post" action="">
							                			<input type="hidden" name="user_id" value="'.$val["uid"].'">
							                			<input type="hidden" name="reg_no" value="'.$val["reg_no"].'">
							                			<input type="hidden" name="customer_id" value="'.$val["customer_id"].'">
								                		
							                			'.$assign_sub.'
								                	</form>
								                </td>';
								        echo '<td style="text-align:center"><a href= "trackDocument.php?id='.$val["id"].'&&customer_id='.$val["customer_id"].'" class="">
								        		<i style="color:grey" class="fa fa-pencil"></i></a></td>';
								        		if($tview!=0)
								        		{
								        			echo '<td class="aa" style="text-align:center">
										        			<a href= "viewVehicleDetails.php?id='.$val["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-eye"></i>
							                				</a>
									                	</td>';
								        		}
								        		else
								        		{
								        			echo '<td class="aa" style="text-align:center"><i style="color:grey" class="fa fa-ban"></i></td>';
								        		}
								        		if($tedit!=0)
								        		{
								        			echo '<td class="aa" style="text-align:center">							        
							                				<a href= "editVehicleDetails.php?id='.$val["id"].'" class="" >
							                					<i style="color:grey" class="fa fa-wrench"></i>
							                				</a>
									                	</td>';
								        		}
								        		else
								        		{
								        			echo '<td class="aa" style="text-align:center"><i style="color:grey" class="fa fa-ban"></i></td>';
								        		}
										echo '</tr>';
								       $c++;
									}
								}
                            }  // end sub admin show vehicles
					        	?>
					        </tbody>
					    </table>
					    <?php
					    if($page==1)
					    {
					    	$prev="#";
					    }
					    else
					    {
					    	$prev="vehicleDetails.php?page=".($page-1);
					    }

					    if($page==$num_pages)
					    {
					    	$nxt="#";
					    }
					    else
					    {
					    	$nxt="vehicleDetails.php?page=".($page+1);
					    }
		            	echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="vehicleDetails.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: '.$page.' of '.$num_pages.'</b>
					    <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="vehicleDetails.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
					    </div>';
	            		?>
					</div>
				</div>
				<!-- /.box-body -->
	    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>
<style type="text/css">
	@media screen and (max-width: 992px) {
		  .aa {
		    display: none;
		  }
		  .a1{
		  	width: 80% !important;
		  }
		}
</style>
<script type="text/javascript">
	$(document).ready(function(){
        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })
    });
    // assign button change code
    $(document).ready(function(){
  $(".t1").click(function(){
    $(this).hide();
    $(".t2").show();
  });
});
</script>