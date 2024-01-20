<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	
	$id = $_GET['id'];
	$vdata = getAllVehicleDataByUid($id);
	$udata = getAllUser();
	
	

 ?>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vehicle Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vehicle Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><b>Add New Vehicle</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			
	    </div>
      	<div class="box box-success" >
				<div class="box-header with-border">
					<h3 class="box-title"><b>All Vehicle Details</b></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body " style="padding:20px;">
					<!-- <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Vehicle</a><br/><br/> -->
					<?php
                		$emp = $admData['vehicle_master'];
                		$empp = explode(',', $emp);
                	?>
					<div class="table-responsive">
						<table id="vehicle_tbl" class="table-bordered table-hover" style="width:100%">
					        <thead>
					            <tr>
					                <th>Sl.No.</th>
					                <th>User</th>
					                <th>Reg No</th>
					                <th>Model</th>
					                <th>Mfg By</th>
					                <th>Mfg Date</th>
					                <th>Reg Date</th>
					                <th>Gross Weight</th>
					                <th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php 
					        		if($vdata)
					        		{
					        			$c = 1;
					        			foreach ($vdata as $val) 
					        			{

					        				?>
						        			<tr>
								                <td><?php echo $c ?></td>
								                <td><a href ="viewUserDetails.php?id=<?php echo $val['uid'] ?>"><?php echo $val['firstname']." ".$val['lastname']; ?></a></td>
								                <td><?php echo $val['reg_no'] ?></td>
								                <td><?php echo $val['model'] ?></td>
								                
								                <td><?php echo $val['mfg_by'] ?></td>
								                <td><?php echo date('d-m-Y',strtotime($val['mfg_date'])); ?></td>
								                <td><?php echo date('d-m-Y',strtotime($val['reg_date'])); ?></td>
								                <td><?php echo $val['gross_weight'] ?></td>

								                <th>
								                	<?php
								                	foreach($empp as $vals)
							                		{
							                			if($vals == 'view')
							                			{
							                				?>
							                				<a href= "viewVehicleDetails.php?id=<?php echo $val['id'] ?>" class="btn btn-primary" >View</a> &nbsp;
							                				<?php
							                			}
							                		}

							                		foreach($empp as $vals)
							                		{
							                			if($vals == 'edit')
							                			{
							                				?>
							                				<a href= "editVehicleDetails.php?id=<?php echo $val['id'] ?>" class="btn btn-primary" >Edit</a>
							                				<?php
							                			}
							                		}
								                	?>
								                </th>
								            
								                
								            </tr>
							            	<?php
							            	$c++;
							        	}
					        		}
					        	?>
					        </tbody>
					        <tfoot>
					            <tr>
					                <th>Sl.No.</th>
					                <th>User</th>
					                <th>Reg No</th>
					                <th>Model</th>
					                <th>Mfg By</th>
					                <th>Mfg Date</th>
					                <th>Reg Date</th>
					                <th>Gross Weight</th>
					                <th>Action</th>
					            </tr>
					        </tfoot>
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
<script type="text/javascript">

	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })
    });

</script>