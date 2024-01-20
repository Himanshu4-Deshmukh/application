<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
		$id = $_GET['id'];
	$cust_data = getDataById('customer','id',$id);
 ?>  
 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CUSTOMER DETAILS |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 12px">CUSTOMER DETAILS</ps></h3>

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
		            		if($cust_data['company_logo'])
		            		{
		            			$imgs = '../uploads/customer_company_logo/'.$cust_data['company_logo'];
		            		}
		            		else
		            		{
		            			$imgs = '../assets/images/no_image.png';
		            		}
		            	?>
						<img src="<?php echo $imgs ?>" height="150" width="150" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);"/>
					</center>
					<br/><br/>
					<table id="example" class="table table-bordered table-hoverc" style="width:100%">
						<tbody>
							<tr>
								<td><b style="font-size: 12px">CUSTOMER ID : </b></td>
								<td><?php echo $cust_data['cust_id']?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">COMPANY NAME : </b></td>
								<td><?php echo $cust_data['company_name']?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">COMPANY EMAIL : </b></td>
								<td><?php echo $cust_data['company_email'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">COMPANY ADDRESS : </b></td>
								<td><?php echo $cust_data['company_address'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">OWNER NAME : </b></td>
								<td><?php echo $cust_data['owner_name'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">OWNER EMAIL: </b></td>
								<td><?php echo $cust_data['owner_email'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">OWNER CONTACT NO: </b></td>
								<td><?php echo $cust_data['owner_contact_no'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">CONTACT PERSON NAME : </b></td>
								<td><?php echo $cust_data['contact_p_name'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">CONTACT PERSON EMAIL: </b></td>
								<td><?php echo $cust_data['cp_email'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">CONTACT PERSON NO: </b></td>
								<td><?php echo $cust_data['cp_contact_no'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">GSTIN : </b></td>
								<td><?php echo $cust_data['gstin'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">CIN : </b></td>
								<td><?php echo $cust_data['cin'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">PAN NO : </b></td>
								<td><?php echo $cust_data['pan_no'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">STATUS : </b></td>
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