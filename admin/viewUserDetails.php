<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	$id = $_GET['id'];
	$udata = getDataById('user','id',$id);
	if($udata['customer'])
	{
		$cust = getDataById('customer','id',$udata['customer']);

	}
	else
	{
		$cust['company_name']="Not Found";
	}
	 ?>  
<!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Details</li>
      </ol>
    </section>
 <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">USER DETAILS</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a><br/><br/><br/>
				<div class="col-sm-8" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);padding:20px;">
					<center>
						<?php 
		            		if($udata['profile_pic'])
		            		{
		            			$imgs = '../uploads/profile_pic/'.$udata['profile_pic'];
		            		}
		            		else
		            		{
		            			$imgs = '../assets/images/no_image.png';
		            		}
		            	?>
						<img src="<?php echo $imgs ?>" height="150" width="150" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);"/>
					</center>
					<br/><br/>
					<table id="example" class="table table-bordered table-hover" style="width:100%">
						<tbody>
							<tr>
								<td><b style="font-size: 12px">COMPANY : </b></td>
								<td><?php echo $cust['company_name']?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">NAME : </b></td>
								<td><?php echo $udata['firstname']." ".$udata['lastname']?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">EMAIL : </b></td>
								<td><?php echo $udata['email'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">ADDRESS : </b></td>
								<td><?php echo $udata['address'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">DATE OF BIRTH : </b></td>
								<td><?php echo date('d-m-Y',strtotime($udata['dob']));?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">GENDER  : </b></td>
								<td><?php echo $udata['gender'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">CONTACT : </b></td>
								<td><?php echo $udata['mobile_no'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">IP ADDRESS : </b></td>
								<td><?php echo $udata['ip_address'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">CREATED ON : </b></td>
								<td><?php echo date('d-m-Y',strtotime($udata['created_on']));?></td>
							</tr>
							
							<tr>
								<td><b style="font-size: 12px">STATUS: </b></td>
								<td><?php if($udata['status']=='1'){ echo "<a class='btn btn-success'>Active</a>";}else{echo "<a class='btn btn-danger'>Deactive</a>";}
								?></td>
							</tr>
							
							
							
						</tbody>
					</table>
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

        
    });

	
</script>