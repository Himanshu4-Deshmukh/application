<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	
	$id = $_GET['id'];
	$cust_data = getDataById('jobs','id',$id);
	
 ?>  


 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jobs Details |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jobs Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Jobs Details</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a><br/><br/><br/>
				<div class="col-sm-10" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);padding:20px;">
					
					<table id="example" class="table table-bordered table-hover" style="width:100%">
						<tbody>
							<tr>
								<td><b>Jobs Title : </b></td>
								<td><?php echo $cust_data['job_title']?></td>
							</tr>
							<tr>
								<td><b>Job Description : </b></td>
								<td><?php echo $cust_data['job_description']?></td>
							</tr>
							<tr>
								<td><b>Job Location : </b></td>
								<td><?php echo $cust_data['location']?></td>
							</tr>
							<tr>
								<td><b>Skills : </b></td>
								<td><?php echo $cust_data['skill'];?></td>
							</tr>
							<tr>
								<td><b>Experience : </b></td>
								<td><?php echo $cust_data['experience'] ." years";?></td>
							</tr>
							<tr>
								<td><b>Valid Till : </b></td>
								<td><?php echo $cust_data['valid_till'];?></td>
							</tr>
							<tr>
								<td><b>Created On: </b></td>
								<td><?php echo date('d-m-Y' , strtotime($cust_data['created_on']));?></td>
							</tr>
							
							<tr>
								<td><b>Status: </b></td>
								<td><?php if($cust_data['status']=='1'){ echo "<a class='btn btn-success'>Active</a>";}else{echo "<a class='btn btn-danger'>Deactive</a>";}
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