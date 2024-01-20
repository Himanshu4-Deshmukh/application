<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include('conn.php');
	$sec = $_GET['sec'];
	$id = $_SESSION['uid'];
	$customer = $_SESSION['customer'];
	$vdata = getActiveVehicleData($customer,$sec);
	// print_r($vdata);die();
	$udata = getAllUser();

	$expdate = date("Y-m-d", strtotime("+15 days"));
	$nowdate = date("Y-m-d", strtotime("+0 days"));
		
	

 ?>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include('includes/commonFooter.php');?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size: 15px !important;">
        Vehicle Details
        <!--<small>Control panel</small>-->
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
					<?php
					 $totalVehicle = getActiveCountVehicle($customer,$sec); 
					?>
					<h3 class="box-title"><b>All  &nbsp; &nbsp;<u style="font-size: 20px;"><?php echo $totalVehicle['count'] ?></u> &nbsp; &nbsp; Vehicle Details</b></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body " style="padding:20px;">
				
					<div class="table-responsive">
						<table id="example" class="table-bordered table-hover" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align: center; font-size:12px">S.No.</th>
					                <th style="text-align: center; font-size:12px">USER</th>
					                <th style="text-align: center; font-size:12px">REGISTRATION NO</th>
					                <th style="text-align: center; font-size:12px">MODEL</th>
					                <th style="text-align: center; font-size:12px">MANUFACTURED BY</th>
					                <th style="text-align: center; font-size:12px">MANUFACTURED DATE</th>
					                <th style="text-align: center; font-size:12px">REGISTRATION DATE</th>
					                <th style="text-align: center; font-size:12px">VIEW</th>
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
								                <td style="text-align: center"><?php echo $c ?></td>
								                <td style="text-align: center"><?php echo $val['firstname']." ".$val['lastname']; ?></td>
								                <td style="text-align: center"><?php echo $val['reg_no'] ?></td>
								                <td style="text-align: center"><?php echo $val['model'] ?></td>
								                
								                <td style="text-align: center"><?php echo $val['mfg_by'] ?></td>
								                <td style="text-align: center"><?php echo date('d-m-Y',strtotime($val['mfg_date'])); ?></td>
								                <td style="text-align: center"><?php echo date('d-m-Y',strtotime($val['reg_date'])); ?></td>

								                <td style="text-align: center">
								                	<a href= "viewVehicleDetails.php?id=<?php echo $val['id'] ?>" class="btn btn-primary" >View</a> &nbsp;
							                	
								                </td>
								            
								                
								            </tr>
							            	<?php
							            	$c++;
							        	}
					        		}
					        	?>
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
<script type="text/javascript">

	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })
    });

</script>