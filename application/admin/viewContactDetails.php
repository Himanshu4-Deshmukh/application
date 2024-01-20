<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
		$id = $_GET['id'];
	$cust_data = getDataById('contact','id',$id);
 ?>  
 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Details |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contact Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Contact Details</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a><br/><br/><br/>
				<div class="col-sm-8" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);padding:20px;">
					
					<table id="example" class="table table-bordered table-hover" style="width:100%">
						<tbody>
							
							<tr>
								<td><b>Name : </b></td>
								<td><?php echo $cust_data['name']?></td>
							</tr>
							<tr>
								<td><b>Email : </b></td>
								<td><?php echo $cust_data['email'];?></td>
							</tr>
							
							<tr>
								<td><b>Phone : </b></td>
								<td><?php echo $cust_data['phone'];?></td>
							</tr>
							<tr>
								<td><b>Subject : </b></td>
								<td><?php echo $cust_data['subject'];?></td>
							</tr>
							<tr>
								<td><b>Message : </b></td>
								<td><?php echo $cust_data['msg'];?></td>
							</tr>
							
							<tr>
								<td><b>Send On: </b></td>
								<td><?php echo $cust_data['send_on'];?></td>
							</tr>
							<tr>
								<td><b>Status: </b></td>
								<td><?php if($cust_data['status']=='1'){ echo "<a class='btn btn-success'>Action Taken</a>";}else{echo "<a class='btn btn-danger'>Pending</a>";}
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