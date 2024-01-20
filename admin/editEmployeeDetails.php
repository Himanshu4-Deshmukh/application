<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
    include_once("conn.php");
	$id = $_GET['id'];
	$emp_data = getDataById('employee','id',$id);
    $adata = getDataById('employee','id',$id);
	// print_r($user_data);die();
    //echo $emp_data['emp_type'];
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
				$data['designation'] = $_POST['designation'];
				$data['report_to'] = $_POST['report_to'];
				$data['location'] = $_POST['location'];
				$data['role'] = $_POST['role'];
                $data['emp_type'] = $_POST['emp_type'];
                    // vikram start
                    if(!empty($_POST['password']))
                {
                    $data['password'] = md5($_POST['password']);
                }
                if(isset($_POST['dashboard']))
                {
                    foreach ($_POST['dashboard'] as $d)
                    {
                        $dash[] = $d ;
                    }
                    $data['dashboard'] = implode(',', $dash);
                }
                else
                {
                    $data['dashboard'] = '';
                }

                if(isset($_POST['customer']))
                {
                    foreach ($_POST['customer'] as $c)
                    {
                        $cust[] = $c ;
                    }
                    $data['cust_master'] = implode(',', $cust);
                }
                else
                {
                    $data['cust_master'] = '';
                }

                if(isset($_POST['employee']))
                {
                    foreach ($_POST['employee'] as $e)
                    {
                        $emp[] = $e ;
                    }
                    $data['emp_master'] = implode(',', $emp);
                }
                else
                {
                    $data['emp_master'] = '';
                }

                if(isset($_POST['user']))
                {
                    foreach ($_POST['user'] as $u)
                    {
                        $us[] = $u ;
                    }
                    $data['user_master'] = implode(',', $us);
                }
                else
                {
                    $data['user_master'] = '';
                }


                if(isset($_POST['vehicle']))
                {
                    foreach ($_POST['vehicle'] as $v)
                    {
                        $ve[] = $v ;
                    }
                    $data['vehicle_master'] = implode(',', $ve);
                }
                else
                {
                    $data['vehicle_master'] = '';
                }

                if(isset($_POST['admini']))
                {
                    foreach ($_POST['admini'] as $a)
                    {
                        $ad[] = $a ;
                    }
                    $data['admin_master'] = implode(',', $ad);
                }
                else
                {
                    $data['admin_master'] = '';
                }
                    // vikram end
				
				
			}
			else
			{

                // vikram start
                if(!empty($_POST['password']))
            {
                $data['password'] = md5($_POST['password']);
            }
            if(isset($_POST['dashboard']))
            {
                foreach ($_POST['dashboard'] as $d)
                {
                    $dash[] = $d ;
                }
                $data['dashboard'] = implode(',', $dash);
            }
            else
            {
                $data['dashboard'] = '';
            }

            if(isset($_POST['customer']))
            {
                foreach ($_POST['customer'] as $c)
                {
                    $cust[] = $c ;
                }
                $data['cust_master'] = implode(',', $cust);
            }
            else
            {
                $data['cust_master'] = '';
            }

            if(isset($_POST['employee']))
            {
                foreach ($_POST['employee'] as $e)
                {
                    $emp[] = $e ;
                }
                $data['emp_master'] = implode(',', $emp);
            }
            else
            {
                $data['emp_master'] = '';
            }

            if(isset($_POST['user']))
            {
                foreach ($_POST['user'] as $u)
                {
                    $us[] = $u ;
                }
                $data['user_master'] = implode(',', $us);
            }
            else
            {
                $data['user_master'] = '';
            }


            if(isset($_POST['vehicle']))
            {
                foreach ($_POST['vehicle'] as $v)
                {
                    $ve[] = $v ;
                }
                $data['vehicle_master'] = implode(',', $ve);
            }
            else
            {
                $data['vehicle_master'] = '';
            }

            if(isset($_POST['admini']))
            {
                foreach ($_POST['admini'] as $a)
                {
                    $ad[] = $a ;
                }
                $data['admin_master'] = implode(',', $ad);
            }
            else
            {
                $data['admin_master'] = '';
            }

            if($_POST['bulk'])
            {
                
                $data['bulkdata_master'] = $_POST['bulk'];
            }
            else
            {
                $data['bulkdata_master'] = '';
            }
            

            if($_POST['other'])
            {
                
                $data['other_master'] = $_POST['other'];
            }
            else
            {
                $data['other_master'] = '';
            }
            // vikram end
				$data['name'] = $_POST['name'];
				$data['dob'] = $_POST['dob'];
				$data['doj'] = $_POST['doj'];
				$data['gender'] = $_POST['gender'];
				$data['email'] = $_POST['email'];
				$data['contact'] = $_POST['contact'];
				$data['alt_contact'] = $_POST['alt_contact'];
				$data['address'] = $_POST['address'];
				$data['designation'] = $_POST['designation'];
				$data['report_to'] = $_POST['report_to'];
				$data['location'] = $_POST['location'];
				$data['role'] = $_POST['role'];
                $data['emp_type'] = $_POST['emp_type'];
			}
			
            $data['assigned_users'] = $_POST["search_data"];
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
<!-- required libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>      
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

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
   <!--  <section class="content-header">
      <h1>
        Edit Customer |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Customer</li>
      </ol>
    </section><br/> -->

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">EDIT EMPLOYEE</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				 
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<br/><br/>
			<div class="box-body " style="padding:50px;">
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
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
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

                 <!--    <div class="form-group row"> -->

                    <div class="form-group row">

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            NAME</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="name" id="lastname" value="<?php echo $emp_data['name']?>" placeholder="NAME" required="required" />
                        </div>

                        <?php
                            $sql = "SELECT assigned_users FROM employee WHERE id='$id'";
                            $result = mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                        ?>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            ASSIGNED USER</label>
                        <div class="col-sm-4">
                            <!-- assign user input box -->
                            <input type="text" name="search_data" id="search_data" placeholder="" autocomplete="off" class="form-control" value="<?php echo $row["assigned_users"]; ?>" />
                             <!-- display results -->
                            <span id="country_name"></span>

                            <!-- script to fetch and display results -->
                            <script>
                              $(document).ready(function(){
                                  
                                $('#search_data').tokenfield({
                                    autocomplete :{
                                        source: function(request, response)
                                        {
                                            jQuery.get('fetch.php', {
                                                query : request.term
                                            }, function(data){
                                                data = JSON.parse(data);
                                                response(data);
                                            });
                                        },
                                        delay: 100
                                    }
                                });

                                // $('#search').click(function(){
                                //     $('#country_name').text($('#search_data').val());
                                // });

                              });
                            </script>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            GENDER</label>
                        <div class="col-sm-2" >
                            <select class="form-control"  name="gender" id="gender" >
                                <option title="I am" >I am</option>
                                <option value="Male" title="Male" <?php if($emp_data['gender'] == "Male"){echo "selected";} ?>>Male</option>
                                <option value="Female" title="Female" <?php if($emp_data['gender'] == "Female"){echo "selected";} ?>>Female</option>
                                <option value="Other" title="Other" <?php if($emp_data['gender'] == "Other"){echo "selected";} ?>>Other</option>
                            </select>
                        </div>


                    	<label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            D.O.B</label>
                        <div class="col-sm-3">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="dob" id="dob" value="<?php echo $emp_data['dob']?>"  required="required" placeholder="Date of Birth" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
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

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            EMAIL</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="email" id="lastname" value="<?php echo $emp_data['email']?>" placeholder="Email" required="required" />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            CONTACT</label>
                        <div class="col-sm-2">
                            <input type="text"  pattern="^\d{10}$" name="contact" class="form-control" placeholder="Contact No" value="<?php echo $emp_data['contact']?>" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            ALT-CONTACT</label>
                        <div class="col-sm-2" style="margin-left:-90px;">
                            <input type="text"  pattern="^\d{10}$" name="alt_contact" class="form-control" placeholder="Optional" value="<?php echo $emp_data['alt_contact']?>" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            ADDRESS</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="address"  placeholder="Address" ><?php echo $emp_data['address']?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            DESIGNATION </label>
                        <div class="col-sm-4">
                            <input type="text" name="designation" class="form-control"  placeholder="Designation" value="<?php echo $emp_data['designation']?>" />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                           REPORT TO</label>
                        <div class="col-sm-4" style="margin-left:-90px;">
                            <input type="text" class="form-control" name="report_to"  placeholder="Report To" value="<?php echo $emp_data['report_to']?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            LOCATION </label>
                        <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" placeholder="Location" value="<?php echo $emp_data['location']?>"/>
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                           ROLE</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="role"  placeholder="Role" value="<?php echo $emp_data['role']?>"/>
                        </div>
                    </div>
                    <!-- vikram start -->
                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                                PASSWORD</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="password" placeholder="Enter Only if you forget your password" />
                            </div>
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            EMPLOYEE TYPE</label>
                        <div class="col-sm-2" >
                            <select class="form-control"  name="emp_type" id="emp_type"  class="form-control">
                                <option title="o" >Select</option>
                                <option value="admin" title="admin" <?php if($emp_data['emp_type'] == "admin"){echo "selected";} ?>>Admin</option>
                                <option value="subadmin" title="subadmin" <?php if($emp_data['emp_type'] == "subadmin"){echo "selected";} ?>>Subadmin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="color: #070432; font-size: 16px ">PRIVILLEGE</div>
                                    <div class="panel-body">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                DASHBOARD : </label>
                                            <div class="col-sm-1">
                                                <?php
                                                    $dash = $adata['dashboard'];
                                                    $dashh = explode(',', $dash);
             
                                                ?>
                                                <input type="checkbox" name="dashboard[]" value="view" <?php foreach($dashh as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="dashboard[]" value="add" <?php foreach($dashh as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="dashboard[]" value="edit" <?php foreach($dashh as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                CUSTOMER MASTER : </label>
                                                <?php
                                                    $cust = $adata['cust_master'];
                                                    $custt = explode(',', $cust);
                                                ?>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="customer[]" value="view" <?php foreach($custt as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="customer[]" value="add" <?php foreach($custt as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="customer[]" value="edit" <?php foreach($custt as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                EMPLOYEE MASTER : </label>
                                                <?php
                                                    $emp = $adata['emp_master'];
                                                    $empp = explode(',', $emp);
                                                ?>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="employee[]" value="view" <?php foreach($empp as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="employee[]" value="add" <?php foreach($empp as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="employee[]" value="edit" <?php foreach($empp as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                USER MASTER : </label>
                                                <?php
                                                    $user = $adata['user_master'];
                                                    $userr = explode(',', $user);
                                                ?>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="user[]" value="view" <?php foreach($userr as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="user[]" value="add" <?php foreach($userr as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="user[]" value="edit" <?php foreach($userr as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                VEHICLE MASTER : </label>
                                                <?php
                                                    $vehicle = $adata['vehicle_master'];
                                                    $ve = explode(',', $vehicle);
                                                ?>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="vehicle[]" value="view" <?php foreach($ve as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="vehicle[]" value="add" <?php foreach($ve as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="vehicle[]" value="edit" <?php foreach($ve as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                ADMINISTRATER MASTER : </label>
                                                <?php
                                                    $admin = $adata['admin_master'];
                                                    $ad = explode(',', $admin);
                                                ?>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="admini[]" value="view" <?php foreach($ad as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="admini[]" value="add" <?php foreach($ad as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="admini[]" value="edit" <?php foreach($ad as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                BULK DATA MASTER : </label>
                                                <?php
                                                    $admin = $adata['bulkdata_master'];
                                                    $ad = explode(',', $admin);
                                                ?>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="bulk" value="Yes" <?php foreach($ad as $val){if($val !== ''){echo 'checked';}} ?>>&nbsp;&nbsp;YES
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                                OTHER OPTION MASTER : </label>
                                                <?php
                                                    $admin = $adata['other_master'];
                                                    $ad = explode(',', $admin);
                                                ?>
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="other" value="Yes" <?php foreach($ad as $val){if($val !== ''){echo 'checked';}} ?>>&nbsp;&nbsp;YES
                                            </div>
                                        </div>
                                        
                                          
                                           
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- vikram end -->



                    
                       
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