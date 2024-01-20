

<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	
	$id = $_GET['id'];
	$udata = getDataById('applyonlinefitness','id',$id);
	
 ?>  


 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Details |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>User Details</b></h3>

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
								<td><b>Section : </b></td>
								<td><?php echo $udata['section']?></td>
							</tr>
							<tr>
								<td><b>VType : </b></td>
								<td><?php echo $udata['vtype']?></td>
							</tr>
							<tr>
								<td><b>Rto /Mvi : </b></td>
								<td><?php echo $udata['rto_mvi']?></td>
							</tr>

							<tr>
								<td><b>Address : </b></td>
								<td><?php echo $udata['address'];?></td>
							</tr>
							<tr>
								<td><b>Name : </b></td>
								<td><?php echo $udata['uname']?></td>
							</tr>
							<tr>
								<td><b>Email : </b></td>
								<td><?php echo $udata['uemail'];?></td>
							</tr>
							<tr>
								<td><b>Phone : </b></td>
								<td><?php echo $udata['uphone'];?></td>
							</tr>

							<tr>
								<td><b>Vehicle No : </b></td>
								<td><?php echo $udata['vehicle_no'];?></td>
							</tr>

							<tr>
								<td><b>Vehicle Type : </b></td>
								<td><?php echo $udata['vehicle_type'];?></td>
							</tr>

							<tr>
								<td><b>Chassis No : </b></td>
								<td><?php echo $udata['chassis_no'];?></td>
							</tr>

							<tr>
								<td><b>Engine No : </b></td>
								<td><?php echo $udata['engine_no'];?></td>
							</tr>
							<tr>
								<td><b>Rc Upload</b></td>
								<?php 
	                            if($udata['rc_upload'])
	                            {
	                            	?>
										<td >
											<a href = '../uploads/apply_fitness/rc_upload/<?php echo $udata['rc_upload'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a>
								         </td>
										
									<?php
	                            }
	                            else
	                            {
	                            	?>
	                            	<td><?php  echo "Not Found" ;?></td>
	                            	<?php
	                            }
	                            ?>
                            </tr>
                            <tr>
                            	<td><b>Insurence Document</b></td>
                            	<?php
                            		if($udata['insurence_document'])
                            		{
                            			?>
                            			<td><a href = '../uploads/apply_fitness/insurence_document/<?php echo $udata['insurence_document'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a></td>
                            			<?php
                            		}
                            	else
	                            {
	                            	?>
	                            	<td><?php  echo "Not Found" ;?></td>
	                            	<?php
	                            }
	                            ?>
                            </tr>

                            <tr>
                            	<td><b>Tax Token Document</b></td>
                            	<?php
                            		if($udata['tt_document'])
                            		{
                            			?>
                            			<td><a href = '../uploads/apply_fitness/tt_document/<?php echo $udata['tt_document'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a></td>
                            			<?php
                            		}
                            	else
	                            {
	                            	?>
	                            	<td><?php  echo "Not Found" ;?></td>
	                            	<?php
	                            }
	                            ?>
                            </tr>

                            <tr>
                            	<td><b>Fitness Document</b></td>
                            	<?php
                            		if($udata['fitness_document'])
                            		{
                            			?>
                            			<td><a href = '../uploads/apply_fitness/fitness_document/<?php echo $udata['fitness_document'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a></td>
                            			<?php
                            		}
                            	else
	                            {
	                            	?>
	                            	<td><?php  echo "Not Found" ;?></td>
	                            	<?php
	                            }
	                            ?>
                            </tr>

                            <tr>
                            	<td><b>Pollution Document</b></td>
                            	<?php
                            		if($udata['pollution_document'])
                            		{
                            			?>
                            			<td><a href = '../uploads/apply_fitness/pollution_document/<?php echo $udata['pollution_document'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a></td>
                            			<?php
                            		}
                            	else
	                            {
	                            	?>
	                            	<td><?php  echo "Not Found" ;?></td>
	                            	<?php
	                            }
	                            ?>
                            </tr>

                            <tr>
                            	<td><b>Speed Limit Device Document</b></td>
                            	<?php
                            		if($udata['sld_document'])
                            		{
                            			?>
                            			<td><a href = '../uploads/apply_fitness/sld_document/<?php echo $udata['sld_document'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a></td>
                            			<?php
                            		}
                            	else
	                            {
	                            	?>
	                            	<td><?php  echo "Not Found" ;?></td>
	                            	<?php
	                            }
	                            ?>
                            </tr>

                            <tr>
                            	<td><b>Radium Tape Document</b></td>
                            	<?php
                            		if($udata['rt_document'])
                            		{
                            			?>
                            			<td><a href = '../uploads/apply_fitness/rt_document/<?php echo $udata['rt_document'];?>' class="btn btn-primary" target="_blank" >View / Download  Document</a></td>
                            			<?php
                            		}
                            	else
	                            {
	                            	?>
	                            	<td><?php  echo "Not Found" ;?></td>
	                            	<?php
	                            }
	                            ?>
                            </tr>
                            <tr>
								<td><b>LCV Amount: </b></td>
								<td><?php echo ($udata['lcvtamount']); ?></td>
							</tr>
							<tr>
								<td><b>HCV Amount: </b></td>
								<td><?php echo ($udata['hcvtamount']); ?></td>
							</tr>
                            <tr>
								<td><b>Status: </b></td>
								<td><?php echo date('d-m-Y',strtotime($udata['apply_on'])); ?></td>
							</tr>


							<tr>
								<td><b>Status: </b></td>
								<td><?php if($udata['status']=='1'){ echo "<a class='btn btn-success'>Action Taken</a>";}else{echo "<a class='btn btn-danger'>Pending</a>";}
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