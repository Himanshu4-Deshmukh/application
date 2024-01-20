<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
		$id = $_GET['id'];
	$cust_data = getDataById('customer','id',$id);
	// print_r($user_data);die();
    if($_POST)
    {
    	// print_r($_FILES);die();
    	if(isset($_POST['upd']))
		{
			$img_upd = '';
			if(isset($_FILES['img']))
			{
				$errors= array();
				$file_name = $_FILES['img']['name'];
				$file_size =$_FILES['img']['size'];
				$file_tmp =$_FILES['img']['tmp_name'];
				$file_type=$_FILES['img']['type'];
				// $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array("jpeg","jpg","png");
		      
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
					if($cust_data)
					{
						if(!empty($cust_data['company_logo']))
						{
							$oldImg = '../uploads/customer_company_logo/'.$cust_data['company_logo'];
							unlink($oldImg);
						}
					}
					$path = "../uploads/customer_company_logo/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['img']['tmp_name'], $path))
					{
						$img_upd = time().".". $file_ext;
					}
					else
					{
						$img_upd = '';
						$msg = "Failed to upload image";
					}
					
				}

				$img = $img_upd;
			}

			if($img)
			{
				$data['company_logo'] = $img;
				$data['company_name'] = $_POST['company_name'];
				$data['company_email'] = $_POST['company_email'];
				$data['company_address'] = $_POST['company_address'];
				$data['owner_name'] = $_POST['owner_name'];
				$data['owner_email'] = $_POST['owner_email'];
				$data['owner_contact_no'] = $_POST['owner_contact_no'];
				$data['contact_p_name'] = $_POST['contact_p_name'];
				$data['cp_email'] = $_POST['cp_email'];
				$data['cp_contact_no'] = $_POST['cp_contact_no'];
				$data['gstin'] = $_POST['gstin'];
				$data['cin'] = $_POST['cin'];
				$data['pan_no'] = $_POST['pan_no'];
				
			}
			else
			{
				$data['company_name'] = $_POST['company_name'];
				$data['company_email'] = $_POST['company_email'];
				$data['company_address'] = $_POST['company_address'];
				$data['owner_name'] = $_POST['owner_name'];
				$data['owner_email'] = $_POST['owner_email'];
				$data['owner_contact_no'] = $_POST['owner_contact_no'];
				$data['contact_p_name'] = $_POST['contact_p_name'];
				$data['cp_email'] = $_POST['cp_email'];
				$data['cp_contact_no'] = $_POST['cp_contact_no'];
				$data['gstin'] = $_POST['gstin'];
				$data['cin'] = $_POST['cin'];
				$data['pan_no'] = $_POST['pan_no'];
			}
			
			// print_r($data);die();
			$up = updateData('customer', $data, 'id',$id);
			// print_R($up);die();
			if($up['res'] == 1)
			{
				$_SESSION['success'] = $up['msg'];
				echo '<meta http-equiv="refresh" content="1">';
			}
		}
    }
	

 ?>  


 <!-- Content Wrapper. Contains page content -->
 <style type="text/css">
   	.form-group input[type=file] {
    opacity: 0;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
}</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EDIT CUSTOMER |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Customer</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">EDIT CUSTOMER</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					 
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<br/><br/>
			<div class="box-body " style="padding:50px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a>
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
					<?php 
					  if($cust_data['company_logo'])
					  {
					  	  $img = "../uploads/customer_company_logo/".$cust_data['company_logo'];
					  }
					  else
					  {
					  	  $img =  "../assets/images/no_image.png";
					  }
					?>
					<div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">
                            IMAGE</label>
                        <div class="col-sm-3">
                            <input type="file"  class="form-control" name="img" id="img" onchange="readURL(this);" />
                            <img  id="blah" src="<?php echo $img ?>"  alt="your image" height="100" width="100" style="box-shadow:0px 0px 20px 0px;"/>
                        </div>
                        <div class="col-sm-6">
                            <p> <b style="color:red;">Note :</b> 1. file size should not be less than <b style="color:red;">500 kb</b>. </p>
                            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. File type must be <b style="color:red;">jpg | jpeg | png | gif</b>.</p>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label">
                            COMPANY NAME</label>
                        <div class="col-sm-4">
                            <input type="text" name="company_name" class="form-control" id="firstname" placeholder="Company Name" value="<?php echo $cust_data['company_name']?>" required="required"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label">
                            COMPANY EMAIL</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="company_email" id="lastname" placeholder="Company Email" value="<?php echo $cust_data['company_email']?>" required="required" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">
                            COMPANY ADDRESS</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="company_address"  placeholder="Company Address" ><?php echo $cust_data['company_address']?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label">
                            OWNER NAME </label>
                        <div class="col-sm-3">
                            <input type="text" name="owner_name" class="form-control" id="firstname" placeholder="Owner Name" value="<?php echo $cust_data['owner_name']?>" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                           EMAIL</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="owner_email" id="lastname" placeholder="Owner Email" value="<?php echo $cust_data['owner_email']?>" required="required" />
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                            Contact</label>
                        <div class="col-sm-2">
                            <input type="text"  pattern="^\d{10}$" name="owner_contact_no" class="form-control" id="mobile_no" placeholder="Owner Mobile No" value="<?php echo $cust_data['owner_contact_no']?>" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label">
                            Contact Person Name </label>
                        <div class="col-sm-3">
                            <input type="text" name="contact_p_name" class="form-control" id="firstname" placeholder="Contact Person Name" value="<?php echo $cust_data['contact_p_name']?>" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                           Email</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="cp_email" id="lastname" placeholder="Contact Person Email" value="<?php echo $cust_data['cp_email']?>" required="required" />
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                            Contact</label>
                        <div class="col-sm-2">
                            <input type="text"  pattern="^\d{10}$" name="cp_contact_no" class="form-control" id="mobile_no" placeholder="Contact Person Mobile No" value="<?php echo $cust_data['cp_contact_no']?>" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label">
                            GSTIN </label>
                        <div class="col-sm-3">
                            <input type="text" name="gstin" class="form-control" id="firstname" placeholder="GSTIN" value="<?php echo $cust_data['gstin']?>" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                           CIN</label>
                        <div class="col-sm-3">
                            <input type="text" name="cin" class="form-control" id="firstname" placeholder="CIN" value="<?php echo $cust_data['cin']?>" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                            PAN No.</label>
                        <div class="col-sm-2">
                            <input type="text" name="pan_no" class="form-control" id="firstname" placeholder="PAN No." value="<?php echo $cust_data['pan_no']?>" required="required"  />
                        </div>
                    </div>
                       
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='upd' value="Update" class="submit btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
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
<script type="text/javascript">

	$(document).ready(function(){

        
    });

	
</script>