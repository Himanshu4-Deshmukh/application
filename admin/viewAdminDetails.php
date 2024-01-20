

<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	
	$id = $_GET['id'];
	$adata = getAdminDetails($id);
	
 ?>  


 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Details |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employee Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Employee Details</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a><br/><br/><br/>
				<div class="col-sm-12" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);padding:20px;">
					<center>
						<?php 
		            		if($adata['emp_img'])
		            		{
		            			$imgs = '../uploads/employee_image/'.$adata['emp_img'];
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
								<td><b>Employee ID : </b></td>
								<td><?php echo $adata['eid']?></td>
							</tr>
							<tr>
								<td><b>Name : </b></td>
								<td><?php echo $adata['names']?></td>
							</tr>
							<tr>
								<td><b>Email : </b></td>
								<td><?php echo $adata['email'];?></td>
							</tr>
							<tr>
								<td><b>Address : </b></td>
								<td><?php echo $adata['address'];?></td>
							</tr>
							<tr>
								<td><b>Gender : </b></td>
								<td><?php echo $adata['gender'];?></td>
							</tr>
							<tr>
								<td><b>Date Of Birth: </b></td>
								<td><?php echo date('d-m-Y',strtotime($adata['dob']));?></td>
							</tr>
							<tr>
							
							<tr>
								<td><b>Contact: </b></td>
								<td><?php echo $adata['contact']; if(!empty($adata['alt_contact'])){ echo " , ".$adata['alt_contact'];}?></td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="form-group">
				                        <div class="col-sm-12">
				                        	<div class="panel panel-default">
												<div class="panel-heading">Privillege</div>
												<div class="panel-body">
													<div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label">
						                                    Dashboard : </label>
						                                <div class="col-sm-1">
						                                	<?php
						                                		$dash = $adata['dashboard'];
						                                		$dashh = explode(',', $dash);
						 
						                                	?>
						                                	<input type="checkbox" name="dashboard[]" value="view" <?php foreach($dashh as $val){if($val == 'view'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;View
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="dashboard[]" value="add" <?php foreach($dashh as $val){if($val == 'add'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Add
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="dashboard[]" value="edit" <?php foreach($dashh as $val){if($val == 'edit'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Edit
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label">
						                                    Customer Master : </label>
						                                    <?php
						                                		$cust = $adata['cust_master'];
						                                		$custt = explode(',', $cust);
						                                	?>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="customer[]" value="view" <?php foreach($custt as $val){if($val == 'view'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;View
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="customer[]" value="add" <?php foreach($custt as $val){if($val == 'add'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Add
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="customer[]" value="edit" <?php foreach($custt as $val){if($val == 'edit'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Edit
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label">
						                                    Employee Master : </label>
						                                    <?php
						                                		$emp = $adata['emp_master'];
						                                		$empp = explode(',', $emp);
						                                	?>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="employee[]" value="view" <?php foreach($empp as $val){if($val == 'view'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;View
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="employee[]" value="add" <?php foreach($empp as $val){if($val == 'add'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Add
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="employee[]" value="edit" <?php foreach($empp as $val){if($val == 'edit'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Edit
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label">
						                                    User Master : </label>
						                                    <?php
						                                		$user = $adata['user_master'];
						                                		$userr = explode(',', $user);
						                                	?>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="user[]" value="view" <?php foreach($userr as $val){if($val == 'view'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;View
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="user[]" value="add" <?php foreach($userr as $val){if($val == 'add'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Add
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="user[]" value="edit" <?php foreach($userr as $val){if($val == 'edit'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Edit
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label">
						                                    Vehicle Master : </label>
						                                    <?php
						                                		$vehicle = $adata['vehicle_master'];
						                                		$ve = explode(',', $vehicle);
						                                	?>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="vehicle[]" value="view" <?php foreach($ve as $val){if($val == 'view'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;View
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="vehicle[]" value="add" <?php foreach($ve as $val){if($val == 'add'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Add
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="vehicle[]" value="edit" <?php foreach($ve as $val){if($val == 'edit'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Edit
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label">
						                                    Administrator Master : </label>
						                                    <?php
						                                		$admin = $adata['admin_master'];
						                                		$ad = explode(',', $admin);
						                                	?>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="admini[]" value="view" <?php foreach($ad as $val){if($val == 'view'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;View
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="admini[]" value="add" <?php foreach($ad as $val){if($val == 'add'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Add
						                                </div>
						                                <div class="col-sm-1">
						                                	<input type="checkbox" name="admini[]" value="edit" <?php foreach($ad as $val){if($val == 'edit'){echo 'checked';}} ?> disabled="disabled">&nbsp;&nbsp;Edit
						                                </div>
						                            </div>
						                            
						                              
						                               
												</div>
											</div>
										</div>
				                    </div>
								</td>
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