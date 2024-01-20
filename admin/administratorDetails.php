<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	date_default_timezone_set("Asia/Kolkata");
	
	$id = $_SESSION['uid'];
	$admin = getAllData('administrator');
	$employee = getAllData('employee');

    // display table respective to previlages
    $sql="SELECT * FROM employee WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $col=$row["emp_master"];
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
			// CONCATINATION FOR PHP START
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

			$data['emp_id'] = "EMP_".mt_rand(100000, 999999);
			if($img)
			{
				$data['emp_img'] = $img;
			}
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
			
			$data['status']= '0';
			// print_r($data);die();
			//$ins = insertData('employee', $data);
			// print_R($ins);die();
			// if($ins['res'] == 1)
			// {
			// 	$_SESSION['success'] = $ins['msg'];
			// 	echo '<meta http-equiv="refresh" content="1">';
			// }

			// CONCATINATION FOR PHP END

			// $data['emp_id'] = $_POST['emp_id'];
     		// $data['email'] =  $_POST['email'];
    		$data['password'] = md5($_POST['password']);
    		if($_POST['dashboard'])
    		{
    			foreach ($_POST['dashboard'] as $d)
    			{
    				$dash[] = $d ;
    			}
    			$data['dashboard'] = implode(',', $dash);
    		}

    		if($_POST['customer'])
    		{
    			foreach ($_POST['customer'] as $c)
    			{
    				$cust[] = $c ;
    			}
    			$data['cust_master'] = implode(',', $cust);
    		}

    		if($_POST['employee'])
    		{
    			foreach ($_POST['employee'] as $e)
    			{
    				$emp[] = $e ;
    			}
    			$data['emp_master'] = implode(',', $emp);
    		}

    		if($_POST['user'])
    		{
    			foreach ($_POST['user'] as $u)
    			{
    				$us[] = $u ;
    			}
    			$data['user_master'] = implode(',', $us);
    		}


    		if($_POST['vehicle'])
    		{
    			foreach ($_POST['vehicle'] as $v)
    			{
    				$ve[] = $v ;
    			}
    			$data['vehicle_master'] = implode(',', $ve);
    		}

    		if($_POST['admini'])
    		{
    			foreach ($_POST['admini'] as $a)
    			{
    				$ad[] = $a ;
    			}
    			$data['admin_master'] = implode(',', $ad);
    		}
            if($_POST['bulk'])
            {
                foreach ($_POST['bulk'] as $a)
                {
                    $ad[] = $a ;
                }
                $data['bulkdata_master'] = implode(',', $ad);
            }
            if($_POST['other'])
            {
                foreach ($_POST['other'] as $a)
                {
                    $ad[] = $a ;
                }
                $data['other_master'] = implode(',', $ad);
            }
			
            //assign users
            $data['assigned_users'] = $_POST["search_data"];

			$ins = insertData('employee', $data);
			if($ins['res'] == 1)
			{
				$_SESSION['success'] = $ins['msg'];
				echo '<meta http-equiv="refresh" content="1">';
			}
		}
	}

	

 ?>  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size: 15px">
        EMPLOYEE MANAGEMENT  |
        <small>Control panel</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Adminstrator Management</li>
      </ol> -->
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">ADD NEW EMPLOYEE</p></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
					<br/><br/>

					<!-- CONCATINATION START -->

										<div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            IMAGE</label>
                        <div class="col-sm-3">
                            <input type="file"  class="form-control" name="img" id="img" onchange="readURL(this);" />
                            <img  id="blah" src="../assets/images/no_image.png"  alt="your image" height="100" width="100" style="box-shadow:0px 0px 20px 0px;"/>
                        </div>
                        <div class="col-sm-6">
                            <p> <b style="color:red;">Note :</b> 1. file size should not be less than <b style="color:red;">500 kb</b>. </p>
                            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. File type must be <b style="color:red;">jpg | jpeg | png | gif</b>.</p>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>

                    <div class="form-group row">

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            NAME</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" id="firstname" placeholder=" NAME" required="required"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            ASSIGN USERS</label>
                        <div class="col-sm-4">
                           
    
                            <!-- assign user input box -->
                            <input type="text" name="search_data" id="search_data" placeholder="" autocomplete="off" class="form-control" />
                            <!-- <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-lg" id="search">Get Value</button>
                            </div> -->

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
                                <option value="Male" title="Male" >Male</option>
                                <option value="Female" title="Female" >Female</option>
                                <option value="Other" title="Other" >Other</option>
                            </select>
                        </div>

                    	<label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            DATE OF BIRTH</label>
                        <div class="col-sm-3">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="dob" id="dob"   required="required" placeholder="DATE OF BIRTH" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            DATE OF JOINING</label>
                        <div class="col-sm-2" >
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="doj" id="doj"   required="required" placeholder="DATE OF JOINING" >
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
                            <input type="email" class="form-control" name="email" id="lastname" placeholder="EMAIL" required="required" />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            CONTACT</label>
                        <div class="col-sm-2">
                            <input type="text"  pattern="^\d{10}$" name="contact" class="form-control" placeholder="CONTACT NO" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            ALT-CONTACT</label>
                        <div class="col-sm-2" style="margin-left:-90px;">
                            <input type="text"  pattern="^\d{10}$" name="alt_contact" class="form-control" placeholder="OPTIONAL"  />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            ADDRESS</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="address"  placeholder="ADDRESS" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            DESIGNATION </label>
                        <div class="col-sm-4">
                            <input type="text" name="designation" class="form-control"  placeholder="DESIGNATION" />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                           REPORT TO</label>
                        <div class="col-sm-4" style="margin-left:-90px;">
                            <input type="text" class="form-control" name="report_to"  placeholder="REPORT TO" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            LOCATION </label>
                        <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" placeholder="LOCATION"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                           ROLE</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="role"  placeholder="ROLE" />
                        </div>
                    </div>

					<!-- CONCATINATION END -->

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            PASSWORD</label>
                        <div class="col-sm-4">
                           	<input type="password" class="form-control" name="password" placeholder="PASSWORD" required="required" />
                        </div>

                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            EMPLOYEE TYPE</label>
                        <div class="col-sm-4">
                            <select class="form-control"  name="emp_type" required="required" />
                                <option title="0" >Select</option>
                                <option value="admin" title="admin" >Admin</option>
                                <option value="subadmin" title="subadmin" >Subadmin</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                        	<div class="panel panel-default">
								<div class="panel-heading" style="color: #070432; font-size: 16px ">PREVILLEGE</div>
								<div class="panel-body">
									<div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    DASHBOARD : </label>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="dashboard[]" value="view">&nbsp;&nbsp;VIEW
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="dashboard[]" value="add">&nbsp;&nbsp;ADD
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="dashboard[]" value="edit">&nbsp;&nbsp;EDIT
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    CUSTOMER MASTER : </label>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="customer[]" value="view">&nbsp;&nbsp;VIEW
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="customer[]" value="add">&nbsp;&nbsp;ADD
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="customer[]" value="edit">&nbsp;&nbsp;EDIT
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EMPLOYEE MASTER : </label>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="employee[]" value="view">&nbsp;&nbsp;VIEW
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="employee[]" value="add">&nbsp;&nbsp;ADD
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="employee[]" value="edit">&nbsp;&nbsp;EDIT
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    USER MASTER : </label>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="user[]" value="view">&nbsp;&nbsp;VIEW
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="user[]" value="add">&nbsp;&nbsp;Add
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="user[]" value="edit">&nbsp;&nbsp;EDIT
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    VEHICLE MASTER : </label>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="vehicle[]" value="view">&nbsp;&nbsp;VIEW
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="vehicle[]" value="add">&nbsp;&nbsp;ADD
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="vehicle[]" value="edit">&nbsp;&nbsp;EDIT
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    ADMINISTRATER MASTER : </label>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="admini[]" value="view">&nbsp;&nbsp;VIEW
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="admini[]" value="add">&nbsp;&nbsp;ADD
		                                </div>
		                                <div class="col-sm-1">
		                                	<input type="checkbox" name="admini[]" value="edit">&nbsp;&nbsp;EDIT
		                                </div>
		                            </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                            BULK DATA MASTER : </label>
                                        <div class="col-sm-1">
                                            <input type="checkbox" name="bulk[]" value="Yes">&nbsp;&nbsp;YES
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                                            OTHER OPTION MASTER : </label>
                                        <div class="col-sm-1">
                                            <input type="checkbox" name="other[]" value="Yes">&nbsp;&nbsp;YES
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
                        </div>
                    </div>
                </form>
			</div>
				<!-- /.box-body -->
	    </div>
      	<div class="box box-success" >
				<div class="box-header with-border">
					<h3 class="box-title"><p style="font-size: 14px">ALL EMPLOYEE DETAILS</p></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body " style="padding:20px;">
					<!-- <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add Administrator</a><br/><br/> -->
					
                				<!-- vikram start -->
                                <form action="" method="post">
                                    <div class="input-group mb-3" style="display: inline;">
                                        <input type="text" class="form-control" placeholder="Search" name="search" style="width: 20%">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                                            <?php
                                                $emp = $admData['emp_master'];
                                                $empp = explode(',', $emp);
                                                foreach($empp as $vals)
                                                {
                                                    if($vals == 'add')
                                                    {
                                                        ?>
                                            <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add Employee</a>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                	<div>
                                </form>
                				<!-- vikram end -->
                				
                				
                	<style type="text/css">
                		td {
                			word-break:break-all;
                		}
                	</style>
					<div class="table-responsive table table-striped">
						<table id="tbl_admin" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align:center; font-size: 12px">Sl.No.</th>
					                <th style="text-align:center; font-size: 12px">IMAGE</th>
					                <th style="text-align:center; font-size: 12px">EMPLOYEE ID</th>
					                <th style="text-align:center; font-size: 12px">NAME</th>
					                <th style="text-align:center; font-size: 12px">CONTACT</th>
					                <th style="text-align:center; font-size: 12px">EMAIL ID</th>
					                <th style="text-align:center; font-size: 12px">ADDRESS</th>
					                <th style="text-align:center; font-size: 12px">DESIGNATION</th>
					                <th style="text-align:center; font-size: 12px">ROLE</th>
					                <th style="text-align:center; font-size: 12px">STATUS</th>
					                <th style="text-align:center; font-size: 12px">VIEW</th>
					                <th style="text-align:center; font-size: 12px">EDIT</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
					        	<!-- vikram start -->
					        	<?php
					        	if(isset($_POST["search"]))
					        	{
					        		echo '<script>
					        		$(document).ready(function(){
										  document.getElementById("pagination_div").style.display="none";
										});	
										</script>';
									$s_item = strtolower($_POST["search"]);
					        		$rpp=10;
					        		$sql="SELECT * FROM employee";
					        		$result=mysqli_query($conn,$sql);
					        		//number of rows
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

									$sql='SELECT * FROM employee';
									$result=mysqli_query($conn,$sql);
					        		while($row=mysqli_fetch_assoc($result))
					        		{
					        			if(strpos(strtolower($row["email"]), $s_item)!==false)
					        			{
					        				//Get Image path
					        			if($row['emp_img'])
				                		{
				                			$img =  "../uploads/employee_image/".$row['emp_img'];
				                		}
				                		else
				                		{
				                			$img = '../assets/images/no_image.png';
				                		}
				                		//Get Status Type
				                		if($row["status"]=="1")
				                		{
				                			$st='<span class="btn btn-success">Active</span>';
				                		}
				                		else
				                		{
				                			$st='<span class="btn btn-danger">Inactive</span>';
				                		}

					        			echo '<tr>
					        					<td style="text-align:center">'.$c.'</td>
					        					<td style="text-align:center"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50"></a></td>
					        					<td style="text-align:center">'.$row["emp_id"].'</td>
					        					<td style="text-align:center">'.$row["name"].'</td>
					        					<td style="text-align:center">'.$row["contact"].'</td>
					        					<td style="text-align:center">'.$row["email"].'</td>
					        					<td style="text-align:center">'.$row["address"].'</td>
					        					<td style="text-align:center">'.$row["designation"].'</td>
					        					<td style="text-align:center">'.$row["role"].'</td>
                                            <td><a onclick="changeStatus('.$row['status'].' , '.$row['id'].' )" id="status">'.$st.'</a></td>';
                                                if($tview!=0)
                                                {
                                                    echo '<td style="text-align:center">
                                                            <a href= "viewEmployeeDetails.php?id='.$row["id"].'" class="" >
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
                                                            <a href= "editEmployeeDetails.php?id='.$row["id"].'" class="" >
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
					        		$sql="SELECT * FROM employee";
					        		$result=mysqli_query($conn,$sql);
					        		//number of rows
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

									$sql='SELECT * FROM employee LIMIT ' . $cur_page . ',' .  $rpp;
									$result=mysqli_query($conn,$sql);
					        		while($row=mysqli_fetch_assoc($result))
					        		{
					        			//Get Image path
					        			if($row['emp_img'])
				                		{
				                			$img =  "../uploads/employee_image/".$row['emp_img'];
				                		}
				                		else
				                		{
				                			$img = '../assets/images/no_image.png';
				                		}
				                		//Get Status Type
				                		if($row["status"]=="1")
				                		{
				                			$st='<span class="btn btn-success">Active</span>';
				                		}
				                		else
				                		{
				                			$st='<span class="btn btn-danger">Inactive</span>';
				                		}

					        			echo '<tr>
					        					<td style="text-align:center">'.$c.'</td>
					        					<td style="text-align:center"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50"></a></td>
					        					<td style="text-align:center">'.$row["emp_id"].'</td>
					        					<td style="text-align:center">'.$row["name"].'</td>
					        					<td style="text-align:center">'.$row["contact"].'</td>
					        					<td style="text-align:center">'.$row["email"].'</td>
					        					<td style="text-align:center">'.$row["address"].'</td>
					        					<td style="text-align:center">'.$row["designation"].'</td>
					        					<td style="text-align:center">'.$row["role"].'</td>
                                            <td><a onclick="changeStatus('.$row['status'].' , '.$row['id'].' )" id="status">'.$st.'</a></td>';
					        					
					        					if($tview!=0)
                                                {
                                                    echo '<td style="text-align:center">
                                                            <a href= "viewEmployeeDetails.php?id='.$row["id"].'" class="" >
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
                                                            <a href= "editEmployeeDetails.php?id='.$row["id"].'" class="" >
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
					        		
					        	?>
					        	<!-- vikram end -->
					        </tbody>
					    </table>
					    <?php
					    if($page==1)
					    {
					    	$prev="#";
					    }
					    else
					    {
					    	$prev="administratorDetails.php?page=".($page-1);
					    }

					    if($page==$num_pages)
					    {
					    	$nxt="#";
					    }
					    else
					    {
					    	$nxt="administratorDetails.php?page=".($page+1);
					    }
					  

		            	echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="administratorDetails.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: '.$page.' of '.$num_pages.'</b>
					    <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="administratorDetails.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
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

	function changeStatus(status,id)
	{
		$.msgBox({
            title: "Are You Sure",
            content: 'you want to change the Status ??',
            type: "confirm",
            buttons: [{ value: "Yes" }, { value: "No" }, { value: "Cancel"}],
            success: function (result) 
            {
                if (result == "Yes") 
                {
                	var table = 'employee';
                    $.ajax({
						url : 'includes/function.php',
						type : 'post',
						data : {action:'changeStatus' ,id:id , status:status, table:table},
						success:function(data)
						{
							if(data == 1)
							{
								showSuccessMsgBox('Status Change Successfully');
								setTimeout("window.location.reload()",1000);
							}
						}
					})
                }
            }
        });
	}

	function getEmpDet(id)
	{
		var fielddata = id;
		var fieldname = 'id';
		var table = 'employee';
            $.ajax({
				url : 'includes/function.php',
				type : 'post',
				data : {action:'getAllDataByIdAjax' , table:table,fieldname:fieldname , fielddata:fielddata},
				success:function(data)
				{
					var obj = jQuery.parseJSON(data);
					$('#email').val(obj.email);
				}
			})
        }
	// }									
</script>
<script type="text/javascript">

	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })
    });

</script>
