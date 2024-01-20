<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	$id = $_SESSION['uid'];
	$emp_data = getDataById('employee','id',$id);
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
					if($emp_data)
					{
						if(!empty($emp_data['emp_img']))
						{
							$oldImg = '../uploads/employee_image/'.$emp_data['emp_img'];
							unlink($oldImg);
						}
					}
					$path = "../uploads/employee_image/";
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
				$data['emp_img'] = $img;
				$data['name'] = $_POST['name'];
				$data['dob'] = $_POST['dob'];
				$data['doj'] = $_POST['doj'];
				$data['gender'] = $_POST['gender'];
				$data['email'] = $_POST['email'];
				$data['contact'] = $_POST['contact'];
				$data['alt_contact'] = $_POST['alt_contact'];
				$data['address'] = $_POST['address'];
			}
			else
			{
				$data['name'] = $_POST['name'];
				$data['dob'] = $_POST['dob'];
				$data['doj'] = $_POST['doj'];
				$data['gender'] = $_POST['gender'];
				$data['email'] = $_POST['email'];
				$data['contact'] = $_POST['contact'];
				$data['alt_contact'] = $_POST['alt_contact'];
				$data['address'] = $_POST['address'];
			}
			
			// print_r($data);die();
			$up = updateData('employee', $data, 'id',$id);
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
      <h1 style="font-size:15px">
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
				<h3 class="box-title">Edit Customer</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:30px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a>
				 <form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>

					<div class="form-group">
						<?php 
							  if($emp_data['emp_img'])
							  {
							  	  $img = "../uploads/employee_image/".$emp_data['emp_img'];
							  }
							  else
							  {
							  	  $img =  "../assets/images/no_image.png";
							  }
							?>
                        <label for="mobile" class="col-sm-2 form-label">
                            Image</label>
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

                    	<!-- <label for="email" class="col-sm-2 form-label">
                            Employee Id</label>
                        <div class="col-sm-4">
                            <input type="text" name="emp_id" class="form-control" id="firstname" placeholder="Employee Id" required="required"  />
                        </div> -->

                        <label for="email" class="col-sm-2 form-label">
                            Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" id="firstname" placeholder=" Name" required="required"  value="<?php echo $emp_data['name']?>"/>
                        </div>
                    </div>

                    <div class="form-group row">
                    	<label for="email" class="col-sm-2 form-label">
                            Gender</label>
                        <div class="col-sm-2" >
                            <select class="form-control"  name="gender" id="gender" >
                                <option title="I am" >I am</option>
                                <option value="Male" title="Male" <?php if($emp_data['gender'] == "Male"){echo "selected";} ?>>Male</option>
                                <option value="Female" title="Female" <?php if($emp_data['gender'] == "Female"){echo "selected";} ?>>Female</option>
                                <option value="Other" title="Other" <?php if($emp_data['gender'] == "Other"){echo "selected";} ?>>Other</option>
                            </select>
                        </div>

                    	<label for="email" class="col-sm-1 form-label">
                            D.O.B</label>
                        <div class="col-sm-3">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="dob" id="dob" value="<?php echo $emp_data['dob']?>"  required="required" placeholder="Date of Birth" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                            D.O.J</label>
                        <div class="col-sm-2" >
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="doj" id="doj" value="<?php echo $emp_data['doj']?>"  required="required" placeholder="Date of Joining" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    <div class="form-group row">

                        <label for="email" class="col-sm-2 form-label">
                            Email</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="email" id="lastname" value="<?php echo $emp_data['email']?>" placeholder="Email" required="required" />
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                            Contact</label>
                        <div class="col-sm-2">
                            <input type="text"  pattern="^\d{10}$" name="contact" class="form-control" placeholder="Contact No" value="<?php echo $emp_data['contact']?>" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>

                        <label for="email" class="col-sm-2 form-label">
                            Alt-Contact</label>
                        <div class="col-sm-2" style="margin-left:-90px;">
                            <input type="text"  pattern="^\d{10}$" name="alt_contact" class="form-control" placeholder="Optional" value="<?php echo $emp_data['alt_contact']?>" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">
                            Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="address"  placeholder="Address" ><?php echo $emp_data['address']?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label">
                            Designation </label>
                        <div class="col-sm-4">
                            <input type="text" name="designation" class="form-control"  placeholder="Designation" required="required" value="<?php echo $emp_data['designation']?>" readonly/>
                        </div>

                        <label for="email" class="col-sm-2 form-label">
                           Report To</label>
                        <div class="col-sm-4" style="margin-left:-90px;">
                            <input type="text" class="form-control" name="report_to"  placeholder="Report To" required="required" value="<?php echo $emp_data['report_to']?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label">
                            Location </label>
                        <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" placeholder="Location" required="required"  value="<?php echo $emp_data['location']?>" readonly/>
                        </div>

                        <label for="email" class="col-sm-1 form-label">
                           Role</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="role"  placeholder="Role" required="required" value="<?php echo $emp_data['role']?>" readonly/>
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