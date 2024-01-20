<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	
	$id = $_SESSION['uid'];
	//$user_data = getAllUser();
	$cdata = getAllData('customer');
	
	// display table respective to previlages
    $sql="SELECT * FROM employee WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $col=$row["user_master"];
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
					
					$path = "../uploads/profile_pic/";
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
				$data['profile_pic'] = $img;
			}
			$data['customer'] = $_POST['customer'];
			$data['firstname'] = $_POST['firstname'];
			$data['lastname'] = $_POST['lastname'];
			$data['email'] = $_POST['email'];
			$data['password'] = md5($_POST['password']);
			$data['mobile_no'] = $_POST['mobile_no'];
			$data['dob'] = $_POST['dob'];
			$data['gender'] = $_POST['gender'];
			$data['user_type'] = $_POST['user_type'];
			$data['address'] = $_POST['address'];
			$data['location'] = $_POST['location'];
			$data['ip_address']= $_SERVER['REMOTE_ADDR'];
			// $data['user_type']= 'user';
			$data['created_on']= date('Y-m-d');
			$data['status']= '0';
			// print_r($data);die();
			$ins = insertData('user', $data);
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
      <h1 style="font-size: 15px">
        USER DETAILS
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">ADD NEW USER</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>

					<div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12PX">
                            IMAGE</label>
                        <div class="col-sm-2">
                            <input type="file"  class="form-control" name="img" id="img" onchange="readURL(this);" />
                            <img  id="blah" src="../assets/images/no_image.png"  alt="your image" height="100" width="100" style="box-shadow:0px 0px 20px 0px;"/>
                        </div>
                        <div class="col-sm-4">
                            <p> <b style="color:red;">Note :</b> 1. file size should not be less than <b style="color:red;">500 kb</b>. </p>
                            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. File type must be <b style="color:red;">jpg | jpeg | png | gif</b>.</p>
                        </div>
                        <!-- <div class="col-sm-4"> -->
                        	<label for="email" class="col-sm-1 form-label" style="font-size: 12PX">COMPANY</label>
	                        <div class="col-sm-3">
	                            <select class="form-control"  name="customer" id="customer" >
	                            	<option value=''>Select</option>
	                                <?php
	                                if($cdata)
	                                {
	                                	foreach ($cdata as $val) 
	                                	{
	                                		?>
	                                		  <option value='<?php echo $val['id'] ?>'> <?php echo $val['company_name'] ?></option>
	                                		<?php
	                                	}
	                                 
	                                }
	                                ?>
	                            </select>
	                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">
                            FIRST NAME</label>
                        <div class="col-sm-4">
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="FIRST NAME" required="required"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">
                            LAST NAME</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="LAST NAME" required="required" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12PX">
                            EMAIL</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" required="required" />
                        </div>
                        
                         <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">
		                            LOCATION </label>
		                        <div class="col-sm-4">
		                        	 <input type="text" class="form-control"  name="location" id="location"   required="required" placeholder="LOCATION" >
		                        </div>
    
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12PX">
                            PASSWORD</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="password" id="password" placeholder="PASSWORD" required="required" />
                        </div>

                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12PX">
                            RETYPE PASSWORD</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="PASSWORD" required="required" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">
                            MOBILE </label>
                        <div class="col-sm-4">
                            <input type="text"  pattern="^\d{10}$" name="mobile_no" class="form-control" id="mobile_no" placeholder="MOBILE NO" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">
                            D.O.B</label>
                        <div class="col-sm-4">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="dob" id="dob"   required="required" placeholder="DATE OF BIRTH" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">
                            GENDER</label>
                        <div class="col-sm-4">
                            <select class="form-control"  name="gender" id="gender" >
                                <option title="I am" >I am</option>
                                <option value="Male" title="Male" >Male</option>
                                <option value="Female" title="Female" >Female</option>
                                <option value="Other" title="Other" >Other</option>
                            </select>
                        </div>

                         <label for="email" class="col-sm-2 form-label" style="font-size: 12PX">
                            USER TYPE</label>
                        <div class="col-sm-4">
                            <select class="form-control"  name="user_type" id="user_type" >
                                <option title="Select" >Select</option>
                                <option value="fleet">Fleet User</option>
                                <option value="rto">RTO Applied</option>
                                <option value="fleet_rto">Fleet + RTO</option>
                                <option value="management">Management</option>
                                <option value="super_user">Super User</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12PX">
                            ADDRESS</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="address" id="address" placeholder="ADDRESS" required="required"></textarea>
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
					<h3 class="box-title"><p style="font-size: 14px">ALL USER DETAILS</p></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body " style="padding:20px;">
					<!-- <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New User</a><br/><br/> -->

					
                				<!-- vikram start -->
                                <form action="" method="post">
                                    <div class="input-group mb-3" style="display: inline;">
                                        <input type="text" class="form-control" placeholder="Search" name="search" style="width: 20%">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                                            <?php
					                		$emp = $admData['user_master'];
					                		$empp = explode(',', $emp);
					                		foreach($empp as $vals)
					                		{
					                			if($vals == 'add')
					                			{
					                				?>
                                            <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New User</a>
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
						<table id="tbl_user" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align:center; font-size: 12px">Sl.No.</th>
					                <th style="text-align:center; font-size: 12px">COMPANY NAME</th>
					                <th style="text-align:center; font-size: 12px">IMAGE</th>
					                <th style="text-align:center; font-size: 12px">USERNAME</th>
					                <th style="text-align:center; font-size: 12px">EMAIL</th>
					                <th style="text-align:center; font-size: 12px">MOBILE</th>
					                <th style="text-align:center; font-size: 12px">GENDER</th>
					                <th style="text-align:center; font-size: 12px">TYPE</th>
					                <th style="text-align:center; font-size: 12px">CREATED</th>
					                <th style="text-align:center; font-size: 12px">VEHICLES</th>
					                <th style="text-align:center; font-size: 12px">ACCOUNT</th>
					                <th style="text-align:center; font-size: 12px">VIEW</th>
					                <th style="text-align:center; font-size: 12px">EDIT</th>
					            </tr>
					        </thead>
					        <tbody>
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
					        		$sql="SELECT * FROM user";
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

									$sql='SELECT * FROM user';
									$result=mysqli_query($conn,$sql);

									while($row=mysqli_fetch_assoc($result))
					        		{
										$data[] = $row;
									}
									foreach($data as $val)
									{
					        			if(strpos(strtolower($val["email"]), $s_item)!==false)
					        			{
					        									        			//Get Image path
					        			if($val['profile_pic'])
				                		{
				                			$img =  "../uploads/profile_pic/".$val['profile_pic'];
				                		}
				                		else
				                		{
				                			$img = '../assets/images/no_image.png';
				                		}
				                		//Get Status Type
				                		if($val["status"]=="1")
				                		{
				                			$st='<span class="btn btn-success">Active</span>';
				                		}
				                		else
				                		{
				                			$st='<span class="btn btn-danger">Inactive</span>';
				                		}
				                		

					        			echo '<tr>
					        					<td style="text-align:center">'.$c.'</td>';
								        		?>

								        		<td style="text-align:center">
								        			<?php $company_name =$val["customer"];
                                                    $sql = "SELECT * FROM customer WHERE id = '$company_name'";
                                                    $result= mysqli_query($conn,$sql);
                                                    $row=mysqli_fetch_assoc($result);
                                                     $company_name = $row["company_name"];
                                                     echo $company_name;
								        			?></td>
								          <?php
					        				echo'<td style="text-align:center"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50"></a></td>
					        					<td style="text-align:center">'.$val["firstname"]." ".$val["lastname"].'</td>
					        					<td style="text-align:center">'.$val["email"].'</td>
					        					<td style="text-align:center">'.$val["mobile_no"].'</td>
					        					<td style="text-align:center">'.$val["gender"].'</td>
					        					<td style="text-align:center">'.$val["user_type"].'</td>
					        					<td style="text-align:center">'.date('d-m-Y',strtotime($val['created_on'])).'</td>
					        					<td style="text-align:center">
					        					<a href ="viewUserVDetails.php?id='.$val["id"].'" target="_blank" class="btn btn-primary">
					        						<i class="fa fa-car"></i><br>'.getVehicleCountByUid($val['id'],$val['user_type']).'
					        					</a>
					        					</td>

					        					<td style="text-align:center">'.date('d-m-Y',strtotime($val['applied_on'])).'</td>
							                <td><a onclick="changeStatus('.$val['status'].' , '.$val['id'].' )" id="status">'.$st.'</a></td>';
					        					if($tview!=0)
                                                {
                                                    echo '<td style="text-align:center">
                                                            <a href= "viewUserDetails.php?id='.$val["id"].'" class="" >
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
                                                            <a href= "editUserDetails.php?id='.$val["id"].'" class="" >
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
					        					
				        					echo'</tr>';
					        			$c++;
					        			}

					        		}
				        			}
				        			else
				        			{
				        				$rpp=10;
					        		$sql="SELECT * FROM user";
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

									$sql='SELECT * FROM user LIMIT ' . $cur_page . ',' .  $rpp;
									$result=mysqli_query($conn,$sql);

									while($row=mysqli_fetch_assoc($result))
					        		{
										$data[] = $row;
									}
									foreach($data as $val)
									{
					        			//Get Image path
					        			if($val['profile_pic'])
				                		{
				                			$img =  "../uploads/profile_pic/".$val['profile_pic'];
				                		}
				                		else
				                		{
				                			$img = '../assets/images/no_image.png';
				                		}
				                		//Get Status Type
				                		if($val["status"]=="1")
				                		{
				                			$st='<span class="btn btn-success">Active</span>';
				                		}
				                		else
				                		{
				                			$st='<span class="btn btn-danger">Inactive</span>';
				                		}

					        			echo '<tr>
					        					<td style="text-align:center">'.$c.'</td>';
								        		?>

								        		<td style="text-align:center">
								        			<?php $company_name =$val["customer"];
                                                    $sql = "SELECT * FROM customer WHERE id = '$company_name'";
                                                    $result= mysqli_query($conn,$sql);
                                                    $row=mysqli_fetch_assoc($result);
                                                     $company_name = $row["company_name"];
                                                     echo $company_name;
								        			?></td>
								          <?php
					        				echo'<td style="text-align:center"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50"></a></td>
					        					<td style="text-align:center">'.$val["firstname"]." ".$val["lastname"].'</td>
					        					<td style="text-align:center">'.$val["email"].'</td>
					        					<td style="text-align:center">'.$val["mobile_no"].'</td>
					        					<td style="text-align:center">'.$val["gender"].'</td>
					        					<td style="text-align:center">'.$val["user_type"].'</td>
					        					<td style="text-align:center">'.date('d-m-Y',strtotime($val['created_on'])).'</td>
					        					<td style="text-align:center"><a href ="viewUserVDetails.php?id='.$val["id"].'" target="_blank" class="btn btn-primary">
					        						<i class="fa fa-car"></i><br>'.getVehicleCountByUid($val['id']).'</a></td>
							                <td><a onclick="changeStatus('.$val['status'].' , '.$val['id'].' )" id="status">'.$st.'</a></td>';
					        					
					        					if($tview!=0)
                                                {
                                                    echo '<td style="text-align:center">
                                                            <a href= "viewUserDetails.php?id='.$val["id"].'" class="" >
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
                                                            <a href= "editUserDetails.php?id='.$val["id"].'" class="" >
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
					        </tbody>
					    </table>
					    <?php
					    if($page==1)
					    {
					    	$prev="#";
					    }
					    else
					    {
					    	$prev="userDetails.php?page=".($page-1);
					    }

					    if($page==$num_pages)
					    {
					    	$nxt="#";
					    }
					    else
					    {
					    	$nxt="userDetails.php?page=".($page+1);
					    }
					  

		            	echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="userDetails.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: '.$page.' of '.$num_pages.'</b>
					    <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="userDetails.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
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

	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })

        $('#cpassword').mouseout(function(){
        	var pass = $('#password').val();
        	var cpass = $('#cpassword').val();
        	if(pass != cpass)
        	{
        		showErrorMsgBox('Password and Confirm Password did not matched');
        	}
        })
    });

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
                	var table = 'user';
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
        })
	}
</script>