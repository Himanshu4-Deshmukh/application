<?php 
	include('includes/header.php');  
	include('includes/sidebar.php'); 
	include('includes/connection.php');
	date_default_timezone_set("Asia/Kolkata");
	$id = $_GET['id'];
	$vdata = getDataById('vehicle','id',$id);

	// customer details code jass
	$cust = $vdata['customer_id'];
	// echo $cust;
	$sql="SELECT * FROM customer WHERE id ='$cust'";
		$result = mysqli_query($mysqli,$sql);
		$row=mysqli_fetch_assoc($result);
		$company_name = $row["company_name"];
	
 ?>  


 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!--  <h1>
        Vehicle Details |
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vehicle Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">VEHICLE DETAILS</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a><br/><br/><br/>
				<div class="col-sm-12" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);padding:20px;">
					
					
					<table id="example" class="table table-bordered table-hover" style="width:100%">
						<tbody>
						 
							<!-- <?php 
                            if($vdata['rc_upload'])
                            {
                            	?>
                            	<tr>
									<td><b style="font-size: 12px">RC DOCUMENT : </b></td>
									<td> <a href = '../uploads/vehicle_documents/rc_upload/<?php echo $vdata['rc_upload'];?>' target="_blank" class="btn btn-primary">View Document</a></td>
								</tr>
                            		
                            	<?php
                            }
                            ?> -->
                            	

							
							
								<tr>
									<td colspan="2">
										<div class="col-sm-12">
			                            <div class="panel panel-default">
											<div class="panel-heading" style="color: #070432; font-size: 16px ">Gov Receipt</div>
											<div class="panel-body">
												<div class="form-group row">
					                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
					                                    ISSUE DATE</label>
					                                <div class="col-sm-4">
					                                	<?php echo  date('d-m-Y',strtotime($vdata['rt_issue_date'])) ?>
					                                </div>
					                            </div>
					                            <div class="form-group row">
					                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
					                                    EXPIRY DATE</label>
					                                <div class="col-sm-4">
					                                	<?php echo  date('d-m-Y',strtotime($vdata['rt_expiry_date'])) ?>
					                                </div>
					                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
							                            DOCUMENT</label>
							                        
							                        <div class="col-sm-2">    
							                        	<?php 
							                            if($vdata['rt_document'])
							                            {
							                            	?>
							                            		<a href = '../uploads/vehicle_documents/reflective_tape/<?php echo $vdata['rt_document'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a>
							                            	<?php
							                            }
							                            ?>
							                        </div>
					                            </div>
											</div>
										</div>
									</tr>
								</tr>


                        </div>
							
							
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