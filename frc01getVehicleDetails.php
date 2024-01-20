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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include('includes/commonFooter.php');?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1 style="font-size: 15px !important;">
        Vehicle Details -->
        <!--<small>Control panel</small>-->
     <!--  </h1> -->
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
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="hidden" name="customer" class="form-control" id="customer" placeholder="CUSTOMER" value="<?php echo $customer?>" required="required"  />
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

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
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
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
                            MANUFACTURED BY</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="mfg_by" id="mfg_by" placeholder="MANUFACTURED BY" required="required" />
                        </div>

                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="fitness_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="permit_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="insurence_issue_date" id="issue_date" placeholder="ISSUE DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div>
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="insurence_expiry_date" id="expiry_date" placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="sld_expiry_date" id="expiry_date"    placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
							<div class="panel-heading" style="color: #070432; font-size: 16px ">REFLECTIVE TAPE</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="rt_expiry_date" id="expiry_date"    placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="tt_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
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
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px;">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="pollution_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
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
					<?php $totalVehicle = getVehicleCountByUid($id); ?>
					<h3 class="box-title"><p style="font-size: 12px">TOTAL VEHICLE  &nbsp; &nbsp;<u style="font-size: 12px;"><?php echo $totalVehicle ?></u></p></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<style type="text/css">
									
				    @media screen and (max-width: 600px) {
			/*	  .searchform {
				    width: 80% ! important;
				    }*/
				  }
				</style>
				<div class="box-body " style="padding:20px;">
					<div class="row">
<!-- 						<div class="col-md-6 col-sm-6"> -->
                                <form action="" method="post">
                                    <div class="input-group mb-3" style="display: inline;">
                                        <input type="text" class="form-control searchform" placeholder="Search" name="search" style="width: 20%;">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
							<a id="addUser" class="btn btn-primary pull-right" style="margin-bottom: 10px"><i class="fa fa-plus"></i> Add New Vehicle</a>
                                        </div>
                                	</div>
                                </form>
                           <!--  </div>
						<div class="col-md-6 col-sm-6"> -->
						<!-- </div> -->
					</div>
				
					<div class="table-responsive">
						<table id="vehicle_tbl" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align: center; font-size:12px">S.No.</th>
					                <th style="text-align: center; font-size:12px" class="dm">LOCATION</th>
					                <th style="text-align: center; font-size:12px">REGISTRATION NO</th>
					                <th style="text-align: center; font-size:12px" class="dm">MODEL</th>
					                <th style="text-align: center; font-size:12px" class="dm">MANUFACTURED BY</th>
					                <th style="text-align: center; font-size:12px" class="dm">MANUFACTURED DATE</th>
					                <th style="text-align: center; font-size:12px" class="dm">REGISTRATION DATE</th>
		<!-- 			                <th style="text-align: center; font-size:12px">Assign</th> -->
					                <th style="text-align: center; font-size:12px">VIEW</th>
					                <th style="text-align: center; font-size:12px" class="dm">EDIT</th>

					            </tr>
					        </thead>
					        <tbody id="tbl_body" class="striped">
					        <?php
					        		if(isset($_POST["search"]))
										{
											//remove pagination div
											echo '<script>
													$(document).ready(function(){
													 document.getElementById("pagination_div").style.display="none";
													});											
												</script>';
											
											$s_item = strtolower($_POST["search"]);
											$sql="SELECT * FROM vehicle WHERE user_id = '$id'";
											$result=mysqli_query($conn,$sql);
											
											$rpp=10;
											$num_rows = mysqli_num_rows($result);
							        		//number of pages
							        		$num_pages = ceil($num_rows/$rpp);
							        		
							        		// determine which page number visitor is currently on
											if (!isset($_GET['page'])) {
											  $page = 1;
											} else {
											  $page = $_GET['page'];
											}
											
											// determine the sql LIMIT starting number for the results on the displaying page
											$cur_page = ($page-1)*$rpp;

											

											//creating serial number algorithm
											$c=1;
											if($result->num_rows)
											{
											while($row=mysqli_fetch_assoc($result))
											{
												$v_data[] = $row;
											}

											foreach ($v_data as $val) 
					        			{


												if(strpos(strtolower($val["reg_no"]), $s_item)!==false)
												{
													?>
													<tr>
								                	<?php
								                	 $user_name = $val['user_id'];
								                	 $sql = "SELECT * FROM user WHERE id = '$user_name'";
								                	 $result = mysqli_query($conn , $sql);
								                	 $row = mysqli_fetch_assoc($result);
								                	 	$first_name = $row["firstname"];
								                	 	$last_name = $row["lastname"];
								                	 ?>

								                <td style="text-align: center;"><?php echo $c ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $first_name;?>  &nbsp;<?php echo $last_name; ?></td>
								                
								                <td style="text-align: center;"><?php echo $val['reg_no'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $val['model'] ?></td>
								                
								                <td class="dm" style="text-align: center;"><?php echo $val['mfg_by'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['mfg_date'])); ?></td>
								                <td class="dm" style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['reg_date'])); ?></td>

								                <td style="text-align: center;">
								                	<a href= "viewVehicleDetails.php?id=<?php echo $val['id'] ?>">
								                		<i class="fa fa-eye"></i>
								                	</a>
							                	</td>

						                		<td class="dm" style="text-align: center;">
								                	<a href= "editVehicleDetails.php?id=<?php echo $val['id'] ?>">
								                		<i class="fa fa-wrench"></i>
								                	</a>						                	
								                </td>
								            
								                
								            </tr>
								            <?php
								        	$c++;

								        	
											}
										}
									}else{}

									}

									else
									{
						        	$rpp=10;
					        		//number of records
					        		$sql = "SELECT * FROM vehicle WHERE user_id = '$id'";
					        		$result = mysqli_query($conn, $sql);
					        		$num_rows = mysqli_num_rows($result);
					        		//number of pages
					        		$num_pages = ceil($num_rows/$rpp);
					        		
					        		// determine which page number visitor is currently on
									if (!isset($_GET['page'])) {
									  $page = 1;
									} else {
									  $page = $_GET['page'];
									}
									
									// determine the sql LIMIT starting number for the results on the displaying page
									$cur_page = ($page-1)*$rpp;

									//creating serial number algorithm
									$c=($page*10)-9;


									// retrieve selected results from database and display them on page
									$sql="SELECT * FROM vehicle WHERE user_id = '$id' LIMIT " . $cur_page . ',' .  $rpp;
									$result = mysqli_query($conn, $sql);
									if($result->num_rows)
									{
									while($row=mysqli_fetch_assoc($result))
											{
												$v_data[] = $row;
											}

											foreach ($v_data as $val) 
					        			{
													?>
													<tr>
								                	<?php
								                	 $user_name = $val['user_id'];
								                	 $sql = "SELECT * FROM user WHERE id = '$user_name'";
								                	 $result = mysqli_query($conn , $sql);
								                	 $row = mysqli_fetch_assoc($result);
								                	 	$first_name = $row["firstname"];
								                	 	$last_name = $row["lastname"];
								                	 ?>

								                <td style="text-align: center;"><?php echo $c ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $first_name;?>  &nbsp;<?php echo $last_name; ?></td>
								                <td style="text-align: center;"><?php echo $val['reg_no'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $val['model'] ?></td>
								                
								                <td class="dm" style="text-align: center;"><?php echo $val['mfg_by'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['mfg_date'])); ?></td>
								                <td class="dm" style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['reg_date'])); ?></td>

								                <td style="text-align: center;">
								                	<a href= "viewVehicleDetails.php?id=<?php echo $val['id'] ?>">
								                		<i class="fa fa-eye"></i>
								                	</a>
							                	</td>

						                		<td class="dm" style="text-align: center;">
								                	<a href= "editVehicleDetails.php?id=<?php echo $val['id'] ?>">
								                		<i class="fa fa-wrench"></i>
								                	</a>						                	
								                </td>
								            
								                
								            </tr>
								            <?php
								        	$c++;
									}
								}else{}

								 }
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
					    	$prev="getVehicleDetails.php?page=".($page-1);
					    }

					    if($page==$num_pages)
					    {
					    	$nxt="#";
					    }
					    else
					    {
					    	$nxt="getVehicleDetails.php?page=".($page+1);
					    }
					  

		            	echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="getVehicleDetails.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: '.$page.' of '.$num_pages.'</b>
					    <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="getVehicleDetails.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
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

<?php 
include('includes/footer.php'); 
?>
<style type="text/css">
	@media only screen and (max-width: 600px) {
  .dm {
  	display: none;
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

</script>