<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	if($_GET['id'])
	{


	$id = $_GET['id'];
	$user_data = getDataById('user','id',$id);
	$cdata = getAllData('customer');
    if($_POST)
    {
    	if(isset($_POST['upd']))
		{
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
					if($user_data)
					{
						if(!empty($user_data['profile_pic']))
						{
							$oldImg = '../uploads/profile_pic/'.$user_data['profile_pic'];
							unlink($oldImg);
						}
					}
					$path = "../uploads/profile_pic/";
					$path = $path . time().".". $file_ext;;
					if(move_uploaded_file($_FILES['img']['tmp_name'], $path))
					{
						$img_upd = time().".". $file_ext;
					}
					else{
						$img_upd = '';
						$msg = "Failed to upload image";
					}
				}
			}
		    if(!empty($img_upd))
		    {
		    	$data['customer'] = $_POST['customer'];
		    	$data['firstname'] = $_POST['firstname'];
				$data['lastname'] = $_POST['lastname'];
				$data['email'] = $_POST['email'];
				$data['mobile_no'] = $_POST['mobile_no'];
				$data['dob'] = $_POST['dob'];
				$data['gender'] = $_POST['gender'];
				$data['user_type'] = $_POST['user_type'];
$data['location'] = $_POST['location'];
$data['address'] = $_POST['address'];
				$data['profile_pic'] = $img_upd;
		    }
		    else
		    {
		    	$data['customer'] = $_POST['customer'];
		    	$data['firstname'] = $_POST['firstname'];
				$data['lastname'] = $_POST['lastname'];
				$data['email'] = $_POST['email'];
				$data['mobile_no'] = $_POST['mobile_no'];
				$data['dob'] = $_POST['dob'];
				$data['gender'] = $_POST['gender'];
				$data['user_type'] = $_POST['user_type'];
$data['location'] = $_POST['location'];
				$data['address'] = $_POST['address'];
		    }
		    
			$up = updateData('user', $data, 'id',$id);
			if($up['res'] == 1)
			{
				$_SESSION['success'] = $up['msg'];
				// header('Location:myProfile.php');
				// sleep(4);
				echo '<meta http-equiv="refresh" content="2">';
			}
		}
    }
	

 ?>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
        Edit User Details
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="col-sm-4">
			<!-- User Statistics-->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><b><?php echo ucfirst($user_data['firstname'])." ".ucfirst($user_data['lastname']);?></b></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
					</div>
				</div>
				<!-- /.box-header -->
				<?php 
            		if($user_data['profile_pic'])
            		{
            			$img = '../uploads/profile_pic/'.$user_data['profile_pic'];
            		}
            		else
            		{
            			$img = '../assets/images/no_image.png';
            		}
            	?>
				<div class="box-body">
					<center>
						<img src="<?php echo $img ?>" height="150" width="150" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);"/>
					</center>
					<br/><br/>
					<table id="example" class="table" style="width:100%">
						<tbody>
							<tr>
								<td><b style="font-size: 12px">NAME : </b></td>
								<td><?php echo $user_data['firstname']." ".$user_data['lastname']?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">EMAIL : </b></td>
								<td><?php echo $user_data['email'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">PHONE NO : </b></td>
								<td><?php echo $user_data['mobile_no'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">ADDRESS : </b></td>
								<td><?php echo $user_data['address'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">IP ADDRESS : </b></td>
								<td><?php echo $user_data['ip_address']?></td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
	      	</div>
			<!-- /.User Statistics-->
		</div>
      	<div class="col-sm-8">
			<!-- User Statistics-->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><p style="font-size: 14px">UPDATE PROFILE</p></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					
 					
					
					<!-- form -->
						<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">

							<?php 
							  if($user_data['profile_pic'])
							  {
							  	  $img = "../uploads/profile_pic/".$user_data['profile_pic'];
							  }
							  else
							  {
							  	  $img =  "../assets/images/no_image.png";
							  }
							?>
							<div class="form-group">
                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                                    IMAGE</label>
                                <div class="col-sm-3">
                                    <input type="file"  class="form-control" name="img" id="img" onchange="readURL(this);" />
                                    <img  id="blah" src="<?php echo $img ?>" alt="your image" height="100" width="100" style="box-shadow:0px 0px 20px 0px;"/>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <p> <b style="color:red;">Note :</b> 1. file size should not be less than <b style="color:red;">500 kb</b>. </p>
                                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. File type must be <b style="color:red;">jpg | jpeg | png | gif</b>.</p>
                                </div> -->
                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">COMPANY</label>
		                        <div class="col-sm-5">
		                            <select class="form-control"  name="customer" id="customer" >
		                            	<option value=''>Select</option>
		                                <?php
		                                if($cdata)
		                                {
		                                	foreach ($cdata as $val) 
		                                	{
		                                		?>
		                                		  <option value='<?php echo $val['id'] ?>' <?php if($user_data['customer'] == $val['id']){ echo "selected";} ?>> <?php echo $val['company_name'] ?></option>
		                                		<?php
		                                	}
		                                 
		                                }
		                                ?>
		                            </select>
		                        </div>
			                </div>

		                    <div class="form-group row">
		                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                            FIRST NAME</label>
		                        <div class="col-sm-4">
		                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname" required="required"  value="<?php echo $user_data['firstname']?>"/>
		                        </div>

		                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                            LAST NAME</label>
		                        <div class="col-sm-4">
		                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastame" required="required" value="<?php echo $user_data['lastname']?>"/>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
		                            EMAIL</label>
		                        <div class="col-sm-4">
		                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required" value="<?php echo $user_data['email']?>"/>
		                        </div>
		                        
		                         <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                            LOCATION </label>
		                        <div class="col-sm-4">
		                        	 <input type="text" class="form-control"  name="location" id="location"   required="required" placeholder="location" value="<?php echo $user_data['location']?>">
		                        </div>
		                    </div>

		                    
		                    

		                    <div class="form-group">
		                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                            MOBILE </label>
		                        <div class="col-sm-4">
		                            <input type="text"  pattern="^\d{10}$" name="mobile_no" class="form-control" id="mobile_no" placeholder="Mobile No" required="required" value="<?php echo $user_data['mobile_no']?>"/>
		                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
		                        </div>

		                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                            D.O.B</label>
		                        <div class="col-sm-4">
		                            <div class="input-group date" data-provide="datepicker" >
		                                <input type="text" class="form-control"  name="dob" id="dob"   required="required" placeholder="Date of Birth" value="<?php echo $user_data['dob']?>">
		                                <div class="input-group-addon">
		                                    <span class="glyphicon glyphicon-th"></span>
		                                </div>
		                            </div>
		                        </div>

		                        <!--  -->
		                    </div>

		                    <div class="form-group">
		                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                            GENDER</label>
		                        <div class="col-sm-4">
		                            <select class="form-control"  name="gender" id="gender" >
		                                <option title="I am" >I am</option>
		                                <option value="Male" title="Male" <?php if($user_data['gender'] == "Male"){echo "selected";} ?>>Male</option>
		                                <option value="Female" title="Female" <?php if($user_data['gender'] == "Female"){echo "selected";} ?>>Female</option>
		                                <option value="Other" title="Other" <?php if($user_data['gender'] == "Other"){echo "selected";} ?>>Other</option>
		                            </select>
		                        </div>

		                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                            USER TYPE</label>
		                        <div class="col-sm-4">
		                            <select class="form-control"  name="user_type" id="user_type" >
		                                <option title="Select" >Select</option>
		                                <option value="fleet" <?php if($user_data['user_type'] == "fleet"){echo "selected";} ?>>Fleet User</option>
		                                <option value="rto" <?php if($user_data['user_type'] == "rto"){echo "selected";} ?>>RTO Applied</option>
		                                <option value="fleet_rto" <?php if($user_data['user_type'] == "fleet_rto"){echo "selected";} ?>>Fleet + RTO</option>
		                                <option value="management" <?php if($user_data['user_type'] == "management"){echo "selected";} ?>>Management</option>
		                                <option value="super_user" <?php if($user_data['user_type'] == "super_user"){echo "selected";} ?>>super User</option>
		                                <option value="rtt" <?php if($user_data['user_type'] == "rtt"){echo "selected";} ?>>RTT</option>
		                            </select>
		                        </div>
		                    </div>

		                    
		                   
		                    <div class="form-group">
		                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
		                            ADDRESS</label>
		                        <div class="col-sm-10">
		                            <textarea type="text" class="form-control" name="address" id="address" placeholder="Address" required="required"><?php echo $user_data['address']?></textarea>
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
					<!-- </div> -->
					<!-- /.form -->
				</div>
				<!-- /.box-body -->
	      	</div>
			<!-- /.User Statistics-->
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include('includes/footer.php'); 

}
?>
