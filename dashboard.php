<style>
	@media only screen and (max-width: 767px) {

		#vehicle_tbl th:nth-child(3),
		#vehicle_tbl td:nth-child(3),
		#vehicle_tbl th:nth-child(4),
		#vehicle_tbl td:nth-child(4),
		#vehicle_tbl th:nth-child(5),
		#vehicle_tbl td:nth-child(5),
		#vehicle_tbl th:nth-child(6),
		#vehicle_tbl td:nth-child(6),
		#vehicle_tbl th:nth-child(7),
		#vehicle_tbl td:nth-child(7),
		#vehicle_tbl th:nth-child(8),
		#vehicle_tbl td:nth-child(8) {
			display: none;
		}

		#vehicle_tbl th,
		#vehicle_tbl td {
			font-size: 10px;
		}
	}
</style>

<?php
include('includes/header.php');
include('includes/sidebar.php');
include_once("conn.php");

$id = $_SESSION['uid'];
$vdata = getAllVehicleDataByUid($id);
$udata = getAllUser();


// for company name purpose jass
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$customer = $row["customer"];
// echo $customer;

// end
if ($_POST) {
	if (isset($_POST['add'])) {

		if (isset($_FILES['rc_upload'])) {
			$rc_upd = '';
			$errors = array();
			$file_name = $_FILES['rc_upload']['name'];
			$file_size = $_FILES['rc_upload']['size'];
			$file_tmp = $_FILES['rc_upload']['tmp_name'];
			$file_type = $_FILES['rc_upload']['type'];
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
				$path = "uploads/vehicle_documents/rc_upload/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['rc_upload']['tmp_name'], $path)) {
					$rc_upd = time() . "." . $file_ext;
				} else {
					$rc_upd = '';
					$msg = "Failed to upload ";
				}
			}

			$rc_upload = $rc_upd;
		}

		if (isset($_FILES['fitness_document'])) {
			$f_doc = '';
			$errors = array();
			$file_name = $_FILES['fitness_document']['name'];
			$file_size = $_FILES['fitness_document']['size'];
			$file_tmp = $_FILES['fitness_document']['tmp_name'];
			$file_type = $_FILES['fitness_document']['type'];
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
				$path = "uploads/vehicle_documents/fitness/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['fitness_document']['tmp_name'], $path)) {
					$f_doc = time() . "." . $file_ext;
				} else {
					$f_doc = '';
					$msg = "Failed to upload ";
				}
			}

			$f_docs = $f_doc;
		}

		// files are uploading in folder but not showing
		// if (isset($_FILES['g_upload'])) {
		// 	$g_doc = '';
		// 	$errors = array();
		// 	$file_name = $_FILES['g_upload']['name'];
		// 	$file_size = $_FILES['g_upload']['size'];
		// 	$file_tmp = $_FILES['g_upload']['tmp_name'];
		// 	$file_type = $_FILES['g_upload']['type'];
		// 	$tmp = explode('.', $file_name);
		// 	$file_ext = end($tmp);
		// 	$expensions = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');

		// 	if (in_array($file_ext, $expensions) === false) {
		// 		$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
		// 	}

		// 	if ($file_size > 2097152) {
		// 		$errors[] = 'File size must be excately 2 MB';
		// 	}

		// 	if (empty($errors) == true) {
		// 		$path = "uploads/vehicle_documents/g_upload/";
		// 		$path = $path . time() . "." . $file_ext;
		// 		if (move_uploaded_file($_FILES['g_upload']['tmp_name'], $path)) {
		// 			$g_doc = time() . "." . $file_ext;
		// 		} else {
		// 			$g_doc = '';
		// 			$msg = "Failed to upload ";
		// 		}
		// 	}

		// 	$g_docs = $g_doc;
		// }


		if (isset($_FILES['buyer_kyc'])) {
			$b_doc = '';
			$errors = array();
			$file_name = $_FILES['buyer_kyc']['name'];
			$file_size = $_FILES['buyer_kyc']['size'];
			$file_tmp = $_FILES['buyer_kyc']['tmp_name'];
			$file_type = $_FILES['buyer_kyc']['type'];
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
				$path = "uploads/vehicle_documents/buyer_kyc/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['buyer_kyc']['tmp_name'], $path)) {
					$b_doc = time() . "." . $file_ext;
				} else {
					$b_doc = '';
					$msg = "Failed to upload ";
				}
			}

			$b_docs = $b_doc;
		}

		if (isset($_FILES['permit_document'])) {
			$p_doc = '';
			$errors = array();
			$file_name = $_FILES['permit_document']['name'];
			$file_size = $_FILES['permit_document']['size'];
			$file_tmp = $_FILES['permit_document']['tmp_name'];
			$file_type = $_FILES['permit_document']['type'];
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
				$path = "uploads/vehicle_documents/permit/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['permit_document']['tmp_name'], $path)) {
					$p_doc = time() . "." . $file_ext;
				} else {
					$p_doc = '';
					$msg = "Failed to upload ";
				}
			}

			$p_docs = $p_doc;
		}

		if (isset($_FILES['insurence_document'])) {
			$i_doc = '';
			$errors = array();
			$file_name = $_FILES['insurence_document']['name'];
			$file_size = $_FILES['insurence_document']['size'];
			$file_tmp = $_FILES['insurence_document']['tmp_name'];
			$file_type = $_FILES['insurence_document']['type'];
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
				$path = "uploads/vehicle_documents/insurence/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['insurence_document']['tmp_name'], $path)) {
					$i_doc = time() . "." . $file_ext;
				} else {
					$i_doc = '';
					$msg = "Failed to upload ";
				}
			}

			$i_docs = $i_doc;
		}

		if (isset($_FILES['sld_document'])) {
			$sld_doc = '';
			$errors = array();
			$file_name = $_FILES['sld_document']['name'];
			$file_size = $_FILES['sld_document']['size'];
			$file_tmp = $_FILES['sld_document']['tmp_name'];
			$file_type = $_FILES['sld_document']['type'];
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
				$path = "uploads/vehicle_documents/speed_limit_device/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['sld_document']['tmp_name'], $path)) {
					$sld_doc = time() . "." . $file_ext;
				} else {
					$sld_doc = '';
					$msg = "Failed to upload ";
				}
			}

			$sld_docs = $sld_doc;
		}
	 

		if (isset($_FILES['rt_document'])) {
			$rt_doc = '';
			$errors = array();
			$file_name = $_FILES['rt_document']['name'];
			$file_size = $_FILES['rt_document']['size'];
			$file_tmp = $_FILES['rt_document']['tmp_name'];
			$file_type = $_FILES['rt_document']['type'];
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
				$path = "uploads/vehicle_documents/reflective_tape/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['rt_document']['tmp_name'], $path)) {
					$rt_doc = time() . "." . $file_ext;
				} else {
					$rt_doc = '';
					$msg = "Failed to upload ";
				}
			}

			$rt_docs = $rt_doc;
		}

		if (isset($_FILES['tt_document'])) {
			$tt_doc = '';
			$errors = array();
			$file_name = $_FILES['tt_document']['name'];
			$file_size = $_FILES['tt_document']['size'];
			$file_tmp = $_FILES['tt_document']['tmp_name'];
			$file_type = $_FILES['tt_document']['type'];
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
				$path = "uploads/vehicle_documents/tax_token/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['tt_document']['tmp_name'], $path)) {
					$tt_doc = time() . "." . $file_ext;
				} else {
					$tt_doc = '';
					$msg = "Failed to upload ";
				}
			}

			$tt_docs = $tt_doc;
		}

		if (isset($_FILES['pollution_document'])) {
			$pt_doc = '';
			$errors = array();
			$file_name = $_FILES['pollution_document']['name'];
			$file_size = $_FILES['pollution_document']['size'];
			$file_tmp = $_FILES['pollution_document']['tmp_name'];
			$file_type = $_FILES['pollution_document']['type'];
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
				$path = "uploads/vehicle_documents/pollution/";
				$path = $path . time() . "." . $file_ext;
				if (move_uploaded_file($_FILES['pollution_document']['tmp_name'], $path)) {
					$pt_doc = time() . "." . $file_ext;
				} else {
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



		$data['vehical_category'] = $_POST['category'];
		$data['rto_code'] = $_POST['rto'];
		$data['rto_city'] = $_POST['location'];
		$data['rto_services'] = $_POST['rto_services'];
		$data['rto_price'] = $_POST['rto_price'];
		$data['rto_gov_price'] = $_POST['gov_price'];
		if (!empty($rc_upload)) {
			$data['rc_upload'] = $rc_upload;
		}
		$data['customer_id'] = $_POST['customer'];
		// --------------------------------------------------------
		if (!empty($_POST['fitness_issue_date'])) {
			$data['fitness_issue_date'] = date('Y-m-d', strtotime($_POST['fitness_issue_date']));
		}

		if (!empty($_POST['fitness_expiry_date'])) {
			$data['fitness_expiry_date'] = date('Y-m-d', strtotime($_POST['fitness_expiry_date']));
		}

		if (!empty($f_docs)) {
			$data['fitness_document'] = $f_docs;
		}
		// ----------------------------------------------------

		if (!empty($_POST['permit_issue_date'])) {
			$data['permit_issue_date'] = date('Y-m-d', strtotime($_POST['permit_issue_date']));
		}

		if (!empty($_POST['permit_expiry_date'])) {
			$data['permit_expiry_date'] = date('Y-m-d', strtotime($_POST['permit_expiry_date']));
		}

		if (!empty($p_docs)) {
			$data['permit_document'] = $p_docs;
		}

		//g_upload 

		// if (!empty($g_docs)) {
		// 	$data['g_upload'] = $g_docs;
		// }

		// -------------------------------------------------------------
		if (!empty($_POST['insurence_issue_date'])) {
			$data['insurence_issue_date'] = date('Y-m-d', strtotime($_POST['insurence_issue_date']));
		}

		if (!empty($_POST['insurence_expiry_date'])) {
			$data['insurence_expiry_date'] = date('Y-m-d', strtotime($_POST['insurence_expiry_date']));
		}

		if (!empty($i_docs)) {
			$data['insurence_document'] = $i_docs;
		}
		// --------------------------------------------------------------------
		if (!empty($_POST['sld_issue_date'])) {
			$data['sld_issue_date'] = date('Y-m-d', strtotime($_POST['sld_issue_date']));
		}

		if (!empty($_POST['sld_expiry_date'])) {
			$data['sld_expiry_date'] = date('Y-m-d', strtotime($_POST['sld_expiry_date']));
		}
		if (!empty($sld_docs)) {
			$data['sld_document'] = $sld_docs;
		}

		// ---------------------------------------------------------------------
		if (!empty($_POST['rt_issue_date'])) {
			$data['rt_issue_date'] = date('Y-m-d', strtotime($_POST['rt_issue_date']));
		}

		if (!empty($_POST['rt_expiry_date'])) {
			$data['rt_expiry_date'] = date('Y-m-d', strtotime($_POST['rt_expiry_date']));
		}
		if (!empty($rt_docs)) {
			$data['rt_document'] = $rt_docs;
		}
		// --------------------------------------------------------------------------
		if (!empty($_POST['tt_issue_date'])) {
			$data['tt_issue_date'] = date('Y-m-d', strtotime($_POST['tt_issue_date']));
		}

		if (!empty($_POST['tt_expiry_date'])) {
			$data['tt_expiry_date'] = date('Y-m-d', strtotime($_POST['tt_expiry_date']));
		}
		if (!empty($tt_docs)) {
			$data['tt_document'] = $tt_docs;
		}
		// ---------------------------------------------------------------------------

		if (!empty($_POST['pollution_issue_date'])) {
			$data['pollution_issue_date'] = date('Y-m-d', strtotime($_POST['pollution_issue_date']));
		}

		if (!empty($_POST['pollution_expiry_date'])) {
			$data['pollution_expiry_date'] = date('Y-m-d', strtotime($_POST['pollution_expiry_date']));
		}
		if (!empty($pt_docs)) {
			$data['pollution_document'] = $pt_docs;
		}

		// print_r($data);die();
		$ins = insertData('vehicle', $data);
		// print_R($ins);die();
		if ($ins['res'] == 1) {
			$_SESSION['success'] = $ins['msg'];
			echo '<meta http-equiv="refresh" content="1">';
		}
	}
}



?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include('includes/commonFooter.php'); ?>
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
	</section><br />

	<!-- Main content -->
	<section class="content">

		<!-- Small boxes (Stat box) -->

		<div class="box box-success" id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title">
					<p style="font-size: 14px">ADD NEW VEHICLE</p>
				</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>

			<!-- /.box-header -->
			<div class="box-body " style="padding:30px;">

				<form class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br />

					<div class="form-group row">
						<div class="col-sm-4">
							<input type="hidden" name="customer" class="form-control" id="customer" placeholder="CUSTOMER" value="<?php echo $customer ?>" required="required" />
						</div>
					</div>

					<div class="form-group row">
						<!-- <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
							Vehicle No.</label>
						<div class="col-sm-4">
							<input type="text" name="reg_no" class="form-control" id="reg_no" placeholder="REGISTRATION NO." required="required" />
						</div> -->

					</div>


					<div class="form-group row">
						<label for="email" class="col-sm-2 form-label" style="font-size: 12px">Vehicle No.</label>
						<div class="col-sm-4">
							<input type="text" name="reg_no" class="form-control" id="reg_no" placeholder="REGISTRATION NO." required="required" oninput="updateRTO()">
						</div>



						<label for="rto" class="col-sm-2 form-label" style="font-size: 12px">RTO</label>
						<div class="col-sm-4">
							<!-- <select class="form-control" id="rto" name="rto" required></select> -->
							<input class="form-control" id="rto" name="rto" required readonly>
						</div>

					</div>

					<div class="form-group row">
						<label for="category" class="col-sm-2 form-label" style="font-size: 12px">
							SELECT CATEGORY</label>
						<div class="col-sm-4">
							<select class="form-control" id="category" name="category" required>
								<option value="">- Select -</option>
								<option value="4W">4W</option>
								<option value="2W">2W</option>
								<option value="CV">CV</option>
							</select>
						</div>
						<label for="email" class="col-sm-2 form-label" style="font-size: 12px">
							Vehicle Model</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="model" id="model" placeholder="MODEL" required="required" />
						</div>

					</div>
					<!-- <div class="form-group row">
						<label for="email" class="col-sm-2 form-label" style="font-size: 12px">
							Vehicle No.</label>
						<div class="col-sm-4">
							<input type="text" name="reg_no" class="form-control" id="reg_no" placeholder="REGISTRATION NO." required="required" />
						</div>
						<label for="category" class="col-sm-2 form-label" style="font-size: 12px">
							SELECT CATEGORY</label>
						<div class="col-sm-4">
							<select class="form-control" id="category" name="category" required>
								<option value="">- Select -</option>
								<option value="4W">4W</option>
								<option value="2W">2W</option>
								<option value="CV">CV</option>
							</select>
						</div>
						<label for="email" class="col-sm-2 form-label" style="font-size: 12px">
							Vehicle Model</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="model" id="model" placeholder="MODEL" required="required" />
						</div>
					</div> -->


					<!-- <div class="form-group">
						<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
							Proposed by</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="mfg_by" id="mfg_by" placeholder="Your Name" required="required" />
						</div>

						<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px;">
							RC UPLOAD</label>
						<div class="col-sm-2">
							<input type="file" class="form-control" name="rc_upload" />
						</div>
					</div> -->

					<!-- <div class="form-group row">
						<label for="category" class="col-sm-2 form-label" style="font-size: 12px">
							SELECT CATEGORY</label>
						<div class="col-sm-4">
							<select class="form-control" id="category" name="category" required>
								<option value="">- Select -</option>
								<option value="4W">4W</option>
								<option value="2W">2W</option>
								<option value="CV">CV</option>
							</select>
						</div>

					
					</div> -->


					<div class="form-group row">
						<!-- <label for="location" class="col-sm-2 form-label" style="font-size: 12px">
							RTO Location</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="location" id="location" value="" placeholder="CITY" required readonly />
						</div> -->

						<label for="rto_services" class="col-sm-2 form-label" style="font-size: 12px">
							SERVICES</label>
						<div class="col-sm-4">
							<select class="form-control" name="rto_services" id="rto_services" required>
								<option value="">Select Service</option>
							</select>
						</div>

						<label for="rto_price" class="col-sm-2 form-label" style="font-size: 12px">
							PRICE</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="rto_price" id="rto_price" value="" placeholder="PRICE" required readonly />
						</div>

					</div>




					<div class="form-group row">
						<!-- <label for="rto_price" class="col-sm-2 form-label" style="font-size: 12px">
							PRICE</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="rto_price" id="rto_price" value="" placeholder="PRICE" required readonly />
						</div> -->

						<label for="rto_services" class="col-sm-2 form-label" style="font-size: 12px">
							GOVT. PRICE</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="gov_price" id="gov_price" value="" placeholder="GOVT. PRICE" required readonly />
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading" style="color: #070432; font-size: 16px ">REGISTRATION CERTIFICATE (RC)</div>
								<div class="panel-body">
									<div class="form-group row">


										<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
											DOCUMENT</label>
										<div class="col-sm-2">
											<input type="file" class="form-control" name="rc_upload" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading" style="color: #070432; font-size: 16px ">BUYER KYC</div>
								<div class="panel-body">
									<div class="form-group row">


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
								<div class="panel-heading" style="color: #070432; font-size: 16px ">SELLER KYC</div>
								<div class="panel-body">
									<div class="form-group row">


										<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
											DOCUMENT</label>
										<div class="col-sm-2">
											<input type="file" class="form-control" name="sld_document" />
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
									<div class="form-group row">


										<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
											DOCUMENT</label>
										<div class="col-sm-2">
											<input type="file" class="form-control" name="g_upload" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="form-group row">
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading" style="color: #070432; font-size: 16px ">FORM 29/30</div>
								<div class="panel-body">
									<div class="form-group row">


										<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
											DOCUMENT</label>
										<div class="col-sm-2">
											<input type="file" class="form-control" name="fitness_document" />
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
											<div class="input-group date" data-provide="datepicker">
												<input type="text" class="form-control" name="insurence_issue_date" id="issue_date" placeholder="ISSUE Date">
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
											<div class="input-group date" data-provide="datepicker">
												<input type="text" class="form-control" name="insurence_expiry_date" id="expiry_date" placeholder="EXPIRY DATE">
												<div class="input-group-addon">
													<span class="glyphicon glyphicon-th"></span>
												</div>
											</div>
										</div>
										<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
											DOCUMENT</label>
										<div class="col-sm-2">
											<input type="file" class="form-control" name="insurence_document" />
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
											<div class="input-group date" data-provide="datepicker">
												<input type="text" class="form-control" name="pollution_issue_date" id="issue_date" placeholder="ISSUE DATE">
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
											<div class="input-group date" data-provide="datepicker">
												<input type="text" class="form-control" name="pollution_expiry_date" id="expiry_date" placeholder="EXPIRY DATE">
												<div class="input-group-addon">
													<span class="glyphicon glyphicon-th"></span>
												</div>
											</div>
										</div>
										<label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
											DOCUMENT</label>
										<div class="col-sm-2">
											<input type="file" class="form-control" name="pollution_document" />
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
							<input type="submit" name='add' value="Add Vehicle" class="submit btn btn btn-primary  btn-lg">

							<!-- <button type="reset" class="submit btn btn-default btn-sm">
                                Cancel</button> -->
						</div>
					</div>
				</form>
			</div>
			<!-- /.box-body -->

		</div>
		<div class="box box-success">
			<div class="box-header with-border">
				<?php $totalVehicle = getVehicleCountByUid($id); ?>
				<h3 class="box-title">
					<p style="font-size: 12px">TOTAL VEHICLE &nbsp; &nbsp;<u style="font-size: 12px;"><?php echo $totalVehicle ?></u></p>
				</h3>

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
								<!-- <th style="text-align: center; font-size:12px" class="dm">LOCATION</th> -->
								<th style="text-align: center; font-size:12px">Vehicle No.</th>
								<!-- <th style="text-align: center; font-size:12px" class="dm">Proposed by</th> -->
								<th style="text-align: center; font-size:12px" class="dm">Services</th>
								<th style="text-align: center; font-size:12px" class="dm">Govt Fees</th>
								<th style="text-align: center; font-size:12px" class="dm">Total Cost</th>
								<th style="text-align: center; font-size:12px" class="dm">Insurance</th>
								<th style="text-align: center; font-size:12px" class="dm">Pollution</th>
								
								
							
								<!-- <th style="text-align: center; font-size:12px" class="dm">Govt Reciept</th> -->
								<!-- <th style="text-align: center; font-size:12px" class="dm">Registration Certificate</th> -->
								<!-- 			               <th style="text-align: center; font-size:12px">Assign</th> -->
								
								
								<th style="text-align: center; font-size:12px">Govt Reciept</th>
								<th style="text-align: center; font-size:12px" class="dm">RC Copy</th>
								<th style="text-align: center; font-size:12px">View</th>
								<th style="text-align: center; font-size:12px" class="dm">Edit</th>
								<th style="text-align: center; font-size:12px" class="dm">Status</th>

							</tr>
						</thead>
						<tbody id="tbl_body" class="striped">
							<?php
							if (isset($_POST["search"])) {
								//remove pagination div
								echo '<script>
													$(document).ready(function(){
													 document.getElementById("pagination_div").style.display="none";
													});											
												</script>';

								$s_item = strtolower($_POST["search"]);
								$sql = "SELECT * FROM vehicle WHERE user_id = '$id'";
								$result = mysqli_query($conn, $sql);

								$rpp = 10;
								$num_rows = mysqli_num_rows($result);
								//number of pages
								$num_pages = ceil($num_rows / $rpp);

								// determine which page number visitor is currently on
								if (!isset($_GET['page'])) {
									$page = 1;
								} else {
									$page = $_GET['page'];
								}

								// determine the sql LIMIT starting number for the results on the displaying page
								$cur_page = ($page - 1) * $rpp;



								//creating serial number algorithm
								$c = 1;
								if ($result->num_rows) {
									while ($row = mysqli_fetch_assoc($result)) {
										$v_data[] = $row;
									}

									foreach ($v_data as $val) {


										if (strpos(strtolower($val["reg_no"]), $s_item) !== false) {
							?>
											<tr>
												<?php
												$user_name = $val['user_id'];
												$sql = "SELECT * FROM user WHERE id = '$user_name'";
												$result = mysqli_query($conn, $sql);
												$row = mysqli_fetch_assoc($result);
												$first_name = $row["firstname"];
												$last_name = $row["lastname"];
												?>

												<td style="text-align: center;"><?php echo $c ?></td>
												<td style="text-align: center;"><?php echo $val['reg_no'] ?></td>
												<!--<td style="text-align: center;"><?php echo $val['mfg_by'] ?></td>-->
												<td style="text-align: center;"><?php echo $val['rto_services'] ?></td>
												<td style="text-align: center;"><?php echo $val['rto_gov_price'] ?></td>
												<td style="text-align: center;"><?php echo $val['rto_price'] ?></td>



											
												<td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['fitness_expiry_date'])); ?>
											</td>

												<td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['insurence_expiry_date'])); ?></td>
												<td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['fitness_expiry_date'])); ?></td>

<td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['insurence_expiry_date'])); ?></td>

												

												
												<td class="dm" style="text-align: center;">
											<a href = 'uploads/vehicle_documents/tax_token/<?php echo $vdata['tt_document'];?>' class="btn btn-primary" target="_blank" > Pending</a>
											</td> 

											<td class="dm" style="text-align: center;">
											<a href="gov_receipt.php?id=<?php echo $val['id'] ?>">
													<i class="fa fa-download"></i>
												</a>
											</td>

											<td class="dm" style="text-align: center;">
											<a href="rc_copy.php?id=<?php echo $val['id'] ?>">
													<i class="fa fa-download"></i>
												</a>
											</td>
											
											<td style="text-align: center;">
												<a href="viewVehicleDetails.php?id=<?php echo $val['id'] ?>">
													<i class="fa fa-eye"></i>
												</a>
											</td>
											

											<td class="dm" style="text-align: center;">
												<a href="editVehicleDetails.php?id=<?php echo $val['id'] ?>">
											<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
												</a>
											</td>
												


											</tr>
										<?php
											$c++;
										}
									}
								} else {
								}
							} else {
								$rpp = 10;
								//number of records
								$sql = "SELECT * FROM vehicle WHERE user_id = '$id'";
								$result = mysqli_query($conn, $sql);
								$num_rows = mysqli_num_rows($result);
								//number of pages
								$num_pages = ceil($num_rows / $rpp);

								// determine which page number visitor is currently on
								if (!isset($_GET['page'])) {
									$page = 1;
								} else {
									$page = $_GET['page'];
								}

								// determine the sql LIMIT starting number for the results on the displaying page
								$cur_page = ($page - 1) * $rpp;

								//creating serial number algorithm
								$c = ($page * 10) - 9;


								// retrieve selected results from database and display them on page
								$sql = "SELECT * FROM vehicle WHERE user_id = '$id' LIMIT " . $cur_page . ',' .  $rpp;
								$result = mysqli_query($conn, $sql);
								if ($result->num_rows) {
									while ($row = mysqli_fetch_assoc($result)) {
										$v_data[] = $row;
									}

									foreach ($v_data as $val) {
										?>
										<tr>
											<?php
											$user_name = $val['user_id'];
											$sql = "SELECT * FROM user WHERE id = '$user_name'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
											$first_name = $row["firstname"];
											$last_name = $row["lastname"];
											?>

											<td style="text-align: center;"><?php echo $c; ?></td>
											<td style="text-align: center;"><?php echo $val['reg_no']; ?></td>
											<!-- <td style="text-align: center;"><?php echo $val['mfg_by'] ?></td> -->
											<td style="text-align: center;"><?php echo $val['rto_services']; ?></td>
											<td style="text-align: center;"><?php echo $val['rto_gov_price']; ?></td>

											<td style="text-align: center;"><?php echo $val['rto_price']; ?></td>

											<td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['fitness_expiry_date'])); ?></td>

<td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['insurence_expiry_date'])); ?></td>
											
											<!-- <td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['mfg_date'])); ?></td> -->
											
											


											<!-- <td class="dm" style="text-align: center;"><?php echo date('d-m-Y', strtotime($val['reg_date'])); ?></td> -->


											
											
											<!-- <td class="dm" style="text-align: center;">
											<a href = 'uploads/vehicle_documents/tax_token/<?php echo $vdata['tt_document'];?>' target="_blank" ><i class="fa fa-download" aria-hidden="true"></i> </a>
											</td> -->
											<td class="dm" style="text-align: center;">
											<a href="gov_receipt.php?id=<?php echo $val['id'] ?>">
													<i class="fa fa-download"></i>
												</a>
											</td>

											<td class="dm" style="text-align: center;">
											<a href="rc_copy.php?id=<?php echo $val['id'] ?>">
													<i class="fa fa-download"></i>
												</a>
											</td>
											

											<!-- <td class="dm" style="text-align: center;">
											<a href = 'uploads/vehicle_documents/rt_document/<?php echo $vdata['rt_document'];?>' target="_blank" ><i class="fa fa-download" aria-hidden="true"></i> </a>
											</td> -->

											


											<td style="text-align: center;">
												<a href="viewVehicleDetails.php?id=<?php echo $val['id'] ?>">
													<i class="fa fa-eye"></i>
												</a>
											</td>
											

											<td class="dm" style="text-align: center;">
												<a href="editVehicleDetails.php?id=<?php echo $val['id'] ?>">
											<i class="fa fa-wrench" aria-hidden="true"></i>
												</a>
											</td>
											<td class="dm" style="text-align: center;">
												<a href="editVehicleDetails.php?id=<?php echo $val['id'] ?>">
											<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
												</a>
											</td>
											

												

										</tr>
							<?php
										$c++;
									}
								} else {
								}
							}
							?>

						</tbody>
					</table>


					<?php
					if ($page == 1) {
						$prev = "#";
					} else {
						$prev = "dashboard.php?page=" . ($page - 1);
					}

					if ($page == $num_pages) {
						$nxt = "#";
					} else {
						$nxt = "dashboard.php?page=" . ($page + 1);
					}


					echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="dashboard.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="' . $prev . '" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: ' . $page . ' of ' . $num_pages . '</b>
					    <a href="' . $nxt . '" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="dashboard.php?page=' . $num_pages . '" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
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

<script src="service_logic.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('#example').DataTable();

		// for open add slider form
		$('#addUser').click(function() {
			$('#userForm').toggle('slow');
		})
	});
</script>


<script>
	function updateRTO() {
		var regNo = document.getElementById('reg_no').value;
		var rtoField = document.getElementById('rto');


		if (regNo.length >= 4) {

			var rtoValue = regNo.substring(0, 4);
			rtoField.value = rtoValue;

		} else {

			rtoField.value = "";
		}
	}
</script>