<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	date_default_timezone_set("Asia/Kolkata");
	if($_GET['id'])
	{
	$id = $_GET['id'];
	$vdata = getDataById('vehicle','id',$id);
	$udata = getAllUser();
	$rto_code_name = $vdata["rto_code"];
	$rto_service_name =$vdata['rto_services'];
    if($_POST)
    {
    	if(isset($_POST['upd']))
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
					if($vdata)
					{
						if(!empty($vdata['rc_upload']))
						{
							$oldImg = 'uploads/vehicle_documents/rc_upload/'.$vdata['rc_upload'];
							unlink($oldImg);
						}
					}
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
			if (isset($_FILES['g_upload'])) {
				$g_doc = '';
				$errors = array();
				$file_name = $_FILES['g_upload']['name'];
				$file_size = $_FILES['g_upload']['size'];
				$file_tmp = $_FILES['g_upload']['tmp_name'];
				$file_type = $_FILES['g_upload']['type'];
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
	
				if (in_array($file_ext, $expensions) === false) {
					$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
				}
	
				if ($file_size > 2097152) {
					$errors[] = 'File size must be excately 2 MB';
				}
	
				if (empty($errors) == true) {
					$path = "uploads/vehicle_documents/g_upload/";
					$path = $path . time() . "." . $file_ext;
					if (move_uploaded_file($_FILES['g_upload']['tmp_name'], $path)) {
						$g_doc = time() . "." . $file_ext;
					} else {
						$g_doc = '';
						$msg = "Failed to upload ";
					}
				}
	
				$g_docs = $g_doc;
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
					if($vdata)
					{
						if(!empty($vdata['fitness_document']))
						{
							$oldImg = 'uploads/vehicle_documents/fitness/'.$vdata['fitness_document'];
							unlink($oldImg);
						}
					}
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
					if($vdata)
					{
						if(!empty($vdata['permit_document']))
						{
							$oldImg = 'uploads/vehicle_documents/permit/'.$vdata['permit_document'];
							unlink($oldImg);
						}
					}
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
					if($vdata)
					{
						if(!empty($vdata['insurence_document']))
						{
							$oldImg = 'uploads/vehicle_documents/insurence/'.$vdata['insurence_document'];
							unlink($oldImg);
						}
					}
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
					if($vdata)
					{
						if(!empty($vdata['sld_document']))
						{
							$oldImg = 'uploads/vehicle_documents/speed_limit_device/'.$vdata['sld_document'];
							unlink($oldImg);
						}
					}
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
					if($vdata)
					{
						if(!empty($vdata['rt_document']))
						{
							$oldImg = 'uploads/vehicle_documents/reflective_tape/'.$vdata['rt_document'];
							unlink($oldImg);
						}
					}
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
					if($vdata)
					{
						if(!empty($vdata['tt_document']))
						{
							$oldImg = 'uploads/vehicle_documents/tax_token/'.$vdata['tt_document'];
							unlink($oldImg);
						}
					}
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
					if($vdata)
					{
						if(!empty($vdata['pollution_document']))
						{
							$oldImg = 'uploads/vehicle_documents/pollution/'.$vdata['pollution_document'];
							unlink($oldImg);
						}
					}
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

			
			$data['user_id'] =  $_SESSION['uid'];
				//$data['super_adm_id'] = $data['super_adm_id'] ;
			$data['reg_no'] = $_POST['reg_no'];
			$data['model'] = $_POST['model'];
			$data['mfg_by'] = $_POST['mfg_by'];
			$data['mfg_date'] = $_POST['mfg_date'];
			$data['reg_date'] = $_POST['reg_date'];



			$data['vehical_category'] = $_POST['category'];
			$data['rto_code'] = $_POST['rto'];
			$data['rto_city'] = $_POST['location'];
			$data['rto_services'] = $_POST['rto_services'];
			$data['rto_price'] = $_POST['rto_price'];
			$data['rto_gov_price'] = $_POST['gov_price'];
		    if(!empty($rc_upload))
		    {
		    	$data['rc_upload'] =$rc_upload;
		    }
		    $data['fitness_issue_date'] =date('Y-m-d',strtotime($_POST['fitness_issue_date']));
		    $data['fitness_expiry_date'] =date('Y-m-d',strtotime($_POST['fitness_expiry_date']));

		    if(!empty($f_docs))
		    {
		    	$data['fitness_document'] =$f_docs;
		    }

		    $data['permit_issue_date'] =date('Y-m-d',strtotime($_POST['permit_issue_date']));
		    $data['permit_expiry_date'] =date('Y-m-d',strtotime($_POST['permit_expiry_date']));

			


		    if(!empty($p_docs))
		    {
		    	$data['permit_document'] =$p_docs;
		    }

		    $data['insurence_issue_date'] =date('Y-m-d',strtotime($_POST['insurence_issue_date']));
		    $data['insurence_expiry_date'] =date('Y-m-d',strtotime($_POST['insurence_expiry_date']));

		    if(!empty($i_docs))
		    {
		    	$data['insurence_document'] =$i_docs;
		    }
		    $data['sld_issue_date'] = date('Y-m-d',strtotime($_POST['sld_issue_date']));
		    $data['sld_expiry_date'] = date('Y-m-d',strtotime($_POST['sld_expiry_date']));

		    if(!empty($sld_docs))
		    {
		    	$data['sld_document'] =$sld_docs;
		    }
		    
		    $data['rt_issue_date'] = date('Y-m-d',strtotime($_POST['rt_issue_date']));
		    $data['rt_expiry_date'] = date('Y-m-d',strtotime($_POST['rt_expiry_date']));

		    if(!empty($rt_docs))
		    {
		    	$data['rt_document'] =$rt_docs;
		    }

		    $data['tt_issue_date'] = date('Y-m-d',strtotime($_POST['tt_issue_date']));
		    $data['tt_expiry_date'] = date('Y-m-d',strtotime($_POST['tt_expiry_date']));
		    
		    if(!empty($tt_docs))
		    {
		    	$data['tt_document'] =$tt_docs;
		    }

		    $data['pollution_issue_date'] = date('Y-m-d',strtotime($_POST['pollution_issue_date']));
		    $data['pollution_expiry_date'] = date('Y-m-d',strtotime($_POST['pollution_expiry_date']));

		    if(!empty($pt_docs))
		    {
		    	$data['pollution_document'] =$pt_docs;
		    }
			// print_r($data);die();
		    
			$up = updateData('vehicle', $data, 'id',$id);
			if($up['res'] == 1)
			{
				$_SESSION['success'] = $up['msg'];
				// header('Location:myProfile.php');
				// sleep(4);
				echo '<script type="text/javascript">window.location.href = "dashboard.php";</script>';
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
      <h1 style="font-size: 15px !important;">
        <!-- Edit Vehicle -->
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Vehicle</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      	<!-- <div class="col-sm-8"> -->
			<!-- User Statistics-->
			<div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">EDIT VEHICLE</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:30px;">
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>
					<!-- <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label">User</label>
	                        <div class="col-sm-4">
	                            <select class="form-control"  name="user_id" id="user_id" >
	                            	<option value=''>Select</option>
	                                <?php
	                                if($udata)
	                                {
	                                	foreach ($udata as $val) 
	                                	{
	                                		?>
	                                		  <option value='<?php echo $val['id'] ?>' <?php if($vdata['user_id'] == $val['id']){ echo "selected";} ?>> <?php echo $val['firstname']." ".$val['lastname'] ?></option>
	                                		<?php
	                                	}
	                                 
	                                }
	                                ?>
	                            </select>
	                        </div>
                    </div> -->
                   
         
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            Registration No..</label>
                        <div class="col-sm-4">
                            <input type="text" name="reg_no" class="form-control" id="reg_no" placeholder="Reg No." required="required" value = "<?php echo  $vdata['reg_no'] ?>" />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                           Vehicle Model</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="model" id="model" placeholder="Model" required="required" value = "<?php echo  $vdata['model'] ?>"/>
                        </div>
                    </div>

                  

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            Proposed by</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="mfg_by" id="mfg_by" placeholder="mfg_by" required="required" value = "<?php echo  $vdata['mfg_by'] ?>"/>
                        </div>

                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            RC UPLOAD</label>
                        <div class="col-sm-2"  >
                            <input type="file" class="form-control" name="rc_upload"   />
                            <?php 
                            if($vdata['rc_upload'])
                            {
                            	?>
								<br>
                            		<a href = 'uploads/vehicle_documents/rc_upload/<?php echo $vdata['rc_upload'];?>' target="_blank" class="btn btn-primary">View Document</a>
                            	<?php
                            }
                            ?>
                        </div>
                    </div>

					<div class="form-group row">
						<label for="category" class="col-sm-2 form-label" style="font-size: 12px">
							SELECT CATEGORY</label>
						<div class="col-sm-4">
							<select class="form-control" id="category" name="category" required>
								<option value="">- Select -</option>
								<option value="4W" <?php if ($vdata['vehical_category'] == '4W') { echo "selected"; } ?>>4W</option>
								<option value="2W" <?php if ($vdata['vehical_category'] == '2W') { echo "selected"; } ?>>2W</option>
								<option value="CV" <?php if ($vdata['vehical_category'] == 'CV') { echo "selected"; } ?>>CV</option>
							</select>
							<input type="hidden" id="vehical_category" value="<?php echo $vdata['vehical_category']; ?>">


						</div>

						<label for="rto" class="col-sm-2 form-label" style="font-size: 12px">
							RTO</label>
						<div class="col-sm-4">
							<select class="form-control" id="rto" name="rto" required onclick="categoryClicked()">
						
							</select>
							<input type="hidden" id="rto_code" value="<?php echo $vdata["rto_code"]; ?>">
						</div>
					</div>


					<div class="form-group row">
						<!-- <label for="location" class="col-sm-2 form-label" style="font-size: 12px">
							CITY</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="location" id="location" value="<?php echo $vdata['rto_city'];?>" placeholder="CITY" required readonly />
						</div> -->

						<label for="rto_services" class="col-sm-2 form-label" style="font-size: 12px">
							SERVICES</label>
						<div class="col-sm-4">
							<select class="form-control" name="rto_services" id="rto_services" required onclick="rtoserviceClicked()">
								<option value="">--Select Service--</option>
								<option value="<?php echo $vdata['rto_services'];?>" selected><?php echo $vdata['rto_services'];?></option>
							</select>
						</div>
					</div>




					<div class="form-group row">
						<label for="rto_price" class="col-sm-2 form-label" style="font-size: 12px">
							PRICE</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="rto_price" id="rto_price" value="<?php echo $vdata['rto_price'];?>" placeholder="PRICE" required readonly />
						</div>

						<label for="rto_services" class="col-sm-2 form-label" style="font-size: 12px">
							GOVT. PRICE</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="gov_price" id="gov_price" value="<?php echo $vdata['rto_gov_price'];?>" placeholder="GOVT. PRICE" required readonly />
						</div>
					</div>

                
               


				
					

                    <!-- <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">PERMIT</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="permit_issue_date"   placeholder="Issue Date" value = "<?php echo  $vdata['permit_issue_date'] ?>" >
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
				                                <input type="text" class="form-control"  name="permit_expiry_date"   placeholder="Expiry Date" value = "<?php echo  $vdata['permit_expiry_date'] ?>" >
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
				                        <div class="col-sm-2">    
				                        	<?php 
				                            if($vdata['permit_document'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/permit/<?php echo $vdata['permit_document'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div> -->

                   

					<div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">Buyer Kyc</div>
								<div class="panel-body">
									<!-- <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="rt_issue_date"    placeholder="Issue Date" value = "<?php echo  $vdata['rt_issue_date'] ?>" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                            </div> -->
		                            <div class="form-group row">
		                                <!-- <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="rt_expiry_date"    placeholder="Expiry Date" value = "<?php echo  $vdata['rt_expiry_date'] ?>" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div> -->
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="rt_document" />
				                        </div>
				                        <div class="col-sm-2">    
				                        	<?php 
				                            if($vdata['rt_document'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/reflective_tape/<?php echo $vdata['rt_document'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

					<!-- <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">g_upload</div>
								<div class="panel-body">
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="g_upload" />
				                        </div>
				                        <div class="col-sm-2">    
				                        	<?php 
				                            if($vdata['g_upload'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/g_upload/<?php echo $vdata['g_upload'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">Seller KYC</div>
								<div class="panel-body">
									 
		                            <div class="form-group row">
		                                
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="sld_document"  />
				                        </div>
				                        <div class="col-sm-2">    
				                        	<?php 
				                            if($vdata['sld_document'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/speed_limit_device/<?php echo $vdata['sld_document'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

					<div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">Form 29/30</div>
								<div class="panel-body">
								 
		                            <div class="form-group row">
		                           
		                             
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="fitness_document"/>
				                        </div>
				                        <div class="col-sm-2">    <?php 
				                            if($vdata['fitness_document'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/fitness/<?php echo $vdata['fitness_document'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
							<div class="panel-heading" style="color: #070432; font-size: 16px ">ROAD TAX</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ISSUE DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="tt_issue_date"   placeholder="Issue Date" value = "<?php echo  $vdata['tt_issue_date'] ?>" >
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
				                                <input type="text" class="form-control"  name="tt_expiry_date" placeholder="Expiry Date" value = "<?php echo  $vdata['tt_expiry_date'] ?>">
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

				                        <div class="col-sm-2">    
				                        	<?php 
				                            if($vdata['tt_document'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/tax_token/<?php echo $vdata['tt_document'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div> -->
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
				                                <input type="text" class="form-control"  name="insurence_issue_date"placeholder="Issue Date" value = "<?php echo  $vdata['insurence_issue_date'] ?>" >
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
				                                <input type="text" class="form-control"  name="insurence_expiry_date"  placeholder="Expiry Date" value = "<?php echo  $vdata['insurence_expiry_date'] ?>" >
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
				                        <div class="col-sm-2">    
				                        	<?php 
				                            if($vdata['insurence_document'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/insurence/<?php echo $vdata['insurence_document'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
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
				                                <input type="text" class="form-control"  name="pollution_issue_date" placeholder="Issue Date" value = "<?php echo  $vdata['pollution_issue_date'] ?>" >
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
				                                <input type="text" class="form-control"  name="pollution_expiry_date"  placeholder="Expiry Date" value = "<?php echo  $vdata['pollution_expiry_date'] ?>" >
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

				                        <div class="col-sm-2">    
				                        	<?php 
				                            if($vdata['pollution_document'])
				                            {
				                            	?>
				                            		<a href = 'uploads/vehicle_documents/pollution/<?php echo $vdata['pollution_document'];?>' class="btn btn-primary" target="_blank" >View Document</a>
				                            	<?php
				                            }
				                            ?>
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
                            <input type="submit" name='upd' value="Update" class="submit btn btn-primary btn-sm">
                               
                            <!-- <button type="reset" class="submit btn btn-default btn-sm">
                                Cancel</button> -->
                        </div>
                    </div>
                </form>
			</div>
				<!-- /.box-body -->
	    <!-- </div> -->
			<!-- /.User Statistics-->
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script >
	

	$(document).ready(function() {
    // Extract the value from PHP variable
    var initialRtoServices = '<?php echo $vdata['rto_services']; ?>';
	let vehicalCategory = $('#vehical_category').val();
    let rtoCode = $('#rto_code').val();

    // Set the selected option for #rto_services
    $('#rto_services').val(initialRtoServices);

    // Function to fetch services initially
    function fetchInitialServices() {
        $.ajax({
            url: "fetch_edit_services.php", // Replace with the actual URL to your PHP script
            type: "post",
            data: {
                'vehicalCategory': vehicalCategory,
                'rtoCode': rtoCode
            },
            success: function(result) {
                let servicesSelect = $('#rto_services');

                // Clear existing options
                servicesSelect.empty();

                // Add options from the AJAX response
                servicesSelect.append(result);
                
                // Set the selected option based on the initialRtoServices value
                servicesSelect.val(initialRtoServices);
            }
        });
    }

    // Call the function to fetch services initially
    fetchInitialServices();

    // Continue with the rest of your code
    // ...
});














// JavaScript variable to store the PHP value
var rto_code_name = '<?php echo $rto_code_name; ?>';

// Log the PHP value to check if it's correctly assigned


$(document).ready(function() {
	// Define the event handler for #category change
	$('#category').change(function() {
		let category_id = $(this).val();
		$.ajax({
			url: "ajax1.php", // Update with the actual URL
			type: "post",
			data: {
				'category_id': category_id
			},
			success: function(result) {
				let jsonResult = JSON.parse(result);
				let rtoSelect = $('#rto');

				// Clear existing options
				rtoSelect.find('option').remove();

				// Add a default blank option
				rtoSelect.append('<option value="">Select RTO</option>');

				// Populate with data from AJAX response
				$.each(jsonResult, function(key, value) {
					rtoSelect.append('<option value="' + key + '">' + value + '</option>');
				});

				// Set the selected option based on the JavaScript variable
				rtoSelect.val(rto_code_name);
			}
		});
	});
  // Define the event handler for #rto change
  $('#rto').change(function() {
    let rto = $(this).val();
    $.ajax({
      url: "ajax1.php",
      type: "post",
      data: {
        'rto': rto
      },
      success: function(result) {
        let jsonResult = JSON.parse(result);
        $('#location').val(jsonResult[0]);
      }
    });
  });

  // Now, trigger the change event on #category to call its handler
  $('#category').trigger('change');

  // Trigger the change event on #rto to call its handler
  $('#rto').trigger('change');
});


  
  

  
     // Add this code inside your existing $(document).ready() function
  
  // Function to fetch services based on RTO and Category
  function fetchServices() {
      let category = $('#category').val();
      let rto = $('#rto').val();
    
      // Send an AJAX request to fetch services for the selected RTO and Category
      $.ajax({
        url: "fetch_services1.php", // Update this with the actual URL to fetch services
        type: "post",
        data: {
          'category': category,
          'rto': rto
        },
        success: function(result) {
          let servicesSelect = $('#rto_services');
    
          // Clear existing options
          servicesSelect.find('option').remove();
    
          // Add a default blank option
          servicesSelect.append('<option value="">Select Service</option>');
    
          // Populate with data from AJAX response
          servicesSelect.append(result);
        }
      });
    }
    
    // Call the fetchServices function when either the "Category" or "RTO" changes
    $('#category, #rto').change(function() {
      fetchServices();
    });
    
    // Call fetchServices initially to populate services based on the initial values of Category and RTO
    fetchServices();
    
    
  
     // Add this code inside your existing $(document).ready() function
  
  function fetchServiceDetails() {
      let category = $('#category').val();
      let rto = $('#rto').val();
      let service = $('#rto_services').val();
    
      // Send an AJAX request to fetch the price and government fees for the selected service, category, and RTO
      $.ajax({
        url: "fetch_service_details1.php", // Update with the actual URL to fetch service details
        type: "post",
        data: {
          'category': category,
          'rto': rto,
          'service': service
        },
        success: function(result) {
          // Parse the JSON response
          let serviceDetails = JSON.parse(result);
    
          // Fill the "Price" and "Govt. Price" fields with the fetched values
          $('#rto_price').val(serviceDetails.price);
          $('#gov_price').val(serviceDetails.govt_price);
        },
        
      });
    }
    
    // Call the fetchServiceDetails function when any of the select fields change
    $('#category, #rto, #rto_services').change(function() {
      fetchServiceDetails();
    });
    
    // Call fetchServiceDetails initially to populate prices based on the initial values of Category, RTO, and Service
    fetchServiceDetails();

  
  
</script>
<?php 
include('includes/footer.php'); 

}
?>
