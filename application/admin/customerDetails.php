<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	date_default_timezone_set("Asia/Kolkata");
	
	$id = $_SESSION['uid'];
	$cust_data = getAllData('customer');
	
	// display table respective to previlages
    $sql="SELECT * FROM employee WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $col=$row["cust_master"];
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
    	// print_r($_FILES);die();
    	if(isset($_POST['add']))
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

			$data['cust_id'] = "CUST_".mt_rand(100000, 999999);
			if($img)
			{
				$data['company_logo'] = $img;
			}
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
			
			$data['status']= '1';
			// print_r($data);die();
			$ins = insertData('customer', $data);
			// print_R($ins);die();
			if($ins['res'] == 1)
			{
				$_SESSION['success'] = $ins['msg'];
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
        CUSTOMER MANAGEMENT  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer Management</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">ADD NEW COMPANY</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>

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
                            COMPANY NAME</label>
                        <div class="col-sm-4">
                            <input type="text" name="company_name" class="form-control" id="firstname" placeholder="COMPANY NAME" required="required"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            COMPANY EMAIL</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="company_email" id="lastname" placeholder="COMPANY EMAIL" required="required" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
                            COMPANY ADDRESS</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="company_address"  placeholder="COMPANY ADDRESS" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            OWNER NAME </label>
                        <div class="col-sm-3">
                            <input type="text" name="owner_name" class="form-control" id="firstname" placeholder="OWNER NAME" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                           EMAIL</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="owner_email" id="lastname" placeholder="OWNER EMAIL" required="required" />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            CONTACT</label>
                        <div class="col-sm-2">
                            <input type="text"  pattern="^\d{10}$" name="owner_contact_no" class="form-control" id="mobile_no" placeholder="OWNER MOBILE NO" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            CONTACT PERSON NAME </label>
                        <div class="col-sm-3">
                            <input type="text" name="contact_p_name" class="form-control" id="firstname" placeholder="CONTACT PERSON NAME" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                           EMAIL</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="cp_email" id="lastname" placeholder="CONTACT PERSON EMAIL" required="required" />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            CONTACT</label>
                        <div class="col-sm-2">
                            <input type="text"  pattern="^\d{10}$" name="cp_contact_no" class="form-control" id="mobile_no" placeholder="CONTACT PERSON MOBILE NO" required="required" />
                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            GSTIN </label>
                        <div class="col-sm-3">
                            <input type="text" name="gstin" class="form-control" id="firstname" placeholder="GSTIN" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                           CIN</label>
                        <div class="col-sm-3">
                            <input type="text" name="cin" class="form-control" id="firstname" placeholder="CIN" required="required"  />
                        </div>

                        <label for="email" class="col-sm-1 form-label" style="font-size: 12px">
                            PAN NO.</label>
                        <div class="col-sm-2">
                            <input type="text" name="pan_no" class="form-control" id="firstname" placeholder="PAN No." required="required"  />
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
					<h3 class="box-title"><p style="font-size: 14px">ALL CUSTOMER DETAILS</p></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body " style="padding:20px;">
					<!-- <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Customer</a><br/><br/> -->

					
                				<!-- vikram start -->
                                <form action="" method="post">
                                    <div class="input-group mb-3" style="display: inline;">
                                        <input type="text" class="form-control" placeholder="Search" name="search" style="width: 20%">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                                            <?php
						                		$emp = $admData['cust_master'];
						                		$empp = explode(',', $emp);
						                		foreach($empp as $vals)
						                		{
						                			if($vals == 'add')
						                			{
						                				?>
                                            <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Company</a>
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
						<table id="tbl_company" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align:center; font-size:12px">Sl.No.</th>
					                <th style="text-align:center; font-size:12px">Image</th>
					                <th style="text-align:center; font-size:12px">NAME</th>
					                <th style="text-align:center; font-size:12px">EMAIL</th>
					                <th style="text-align:center; font-size:12px">ADDRESS</th>
					                <th style="text-align:center; font-size:12px">OWNER NAME</th>
					                <th style="text-align:center; font-size:12px">OWNER NO</th>
					                <th style="text-align:center; font-size:12px">CONTACT NAME</th>
					                <th style="text-align:center; font-size:12px">CONTACT NO</th>
					                <th style="text-align:center; font-size:12px">STATUS</th>
					                <th style="text-align:center; font-size:12px">VIEW</th>
					                <th style="text-align:center; font-size:12px">EDIT</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
					        		$sql = "SELECT * FROM customer";
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

									$sql='SELECT * FROM customer';
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_assoc($result))
									{
										if(strpos(strtolower($row["company_email"]), $s_item)!==false)
					        			{
					        				//Get Image path
					        			if($row['company_logo'])
				                		{
				                			$img =  "../uploads/customer_company_logo/".$row['company_logo'];
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
				                				<td style="text-align:center"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50" ></a></td>
				                				<td style="text-align:center">'.$row["company_name"].'</td>
				                				<td style="text-align:center">'.$row["company_email"].'</td>
				                				<td style="text-align:center">'.$row["company_address"].'</td>
				                				<td style="text-align:center">'.$row["owner_name"].'</td>
				                				<td style="text-align:center">'.$row["owner_contact_no"].'</td>
				                				<td style="text-align:center">'.$row["contact_p_name"].'</td>
				                				<td style="text-align:center">'.$row["cp_contact_no"].'</td>
				                				<td><a onclick="changeStatus('.$row['status'].' , '.$row['id'].' )" id="status">'.$st.'</a></td>';
				                				if($tview!=0)
                                                {
                                                    echo '<td style="text-align:center">
                                                            <a href= "viewCustDetails.php?id='.$row["id"].'" class="" >
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
                                                            <a href= "editCustDetails.php?id='.$row["id"].'" class="" >
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
				                				
			                			echo '<tr>';
				                		$c++;
					        			}
										
									}
					        	}
					        	else
					        	{
					        		$rpp=10; 
					        		$sql = "SELECT * FROM customer";
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

									$sql='SELECT * FROM customer LIMIT ' . $cur_page . ',' .  $rpp;
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_assoc($result))
									{
										//Get Image path
					        			if($row['company_logo'])
				                		{
				                			$img =  "../uploads/customer_company_logo/".$row['company_logo'];
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
				                				<td style="text-align:center"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50" ></a></td>
				                				<td style="text-align:center">'.$row["company_name"].'</td>
				                				<td style="text-align:center">'.$row["company_email"].'</td>
				                				<td style="text-align:center">'.$row["company_address"].'</td>
				                				<td style="text-align:center">'.$row["owner_name"].'</td>
				                				<td style="text-align:center">'.$row["owner_contact_no"].'</td>
				                				<td style="text-align:center">'.$row["contact_p_name"].'</td>
				                				<td style="text-align:center">'.$row["cp_contact_no"].'</td>
				                				<td><a onclick="changeStatus('.$row['status'].' , '.$row['id'].' )" id="status">'.$st.'</a></td>';
				                				if($tview!=0)
                                                {
                                                    echo '<td style="text-align:center">
                                                            <a href= "viewCustDetails.php?id='.$row["id"].'" class="" >
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
                                                            <a href= "editCustDetails.php?id='.$row["id"].'" class="" >
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
					    	$prev="customerDetails.php?page=".($page-1);
					    }

					    if($page==$num_pages)
					    {
					    	$nxt="#";
					    }
					    else
					    {
					    	$nxt="customerDetails.php?page=".($page+1);
					    }
					  

		            	echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="customerDetails.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: '.$page.' of '.$num_pages.'</b>
					    <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="customerDetails.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
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
                	var table = 'customer';
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
	
</script>