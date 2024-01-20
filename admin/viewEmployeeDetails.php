<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	$id = $_GET['id'];
	$adata = $emp_data = getDataById('employee','id',$id);
	 ?>  
 <!-- Content Wrapper. Contains page content -->
 <!-- required libraries -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EMPLOYEE DETAILS |
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
				<h3 class="box-title"><p style="font-size: 14px">EMPLOYEE DETAILS</p></h3>

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
		            		if($emp_data['emp_img'])
		            		{
		            			$imgs = '../uploads/employee_image/'.$emp_data['emp_img'];
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
								<td><b style="font-size: 12px">EMPLOYEE ID : </b></td>
								<td><?php echo $emp_data['emp_id']?></td>
							</tr>
							<tr> 
								<?php
		                            $sql = "SELECT assigned_users FROM employee WHERE id='$id'";
		                            $result = mysqli_query($conn,$sql);
		                            $row=mysqli_fetch_assoc($result);
		                        ?>
							   <td><b style="font-size: 12px">ASSIGNED USERS :</b></td>
							   <td><?php echo $row["assigned_users"]; ?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">NAME : </b></td>
								<td><?php echo $emp_data['name']?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">EMAIL : </b></td>
								<td><?php echo $emp_data['email'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">ADDRESS : </b></td>
								<td><?php echo $emp_data['address'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">GENDER : </b></td>
								<td><?php echo $emp_data['gender'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">DATE OF BIRTH : </b></td>
								<td><?php echo date('d-m-Y',strtotime($emp_data['dob']));?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">DATE OF JOINING : </b></td>
								<td><?php echo date('d-m-Y',strtotime($emp_data['doj']));?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">CONTACT : </b></td>
								<td><?php echo $emp_data['contact']; if(!empty($emp_data['alt_contact'])){ echo " , ".$emp_data['alt_contact'];}?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">DESIGNATION : </b></td>
								<td><?php echo $emp_data['designation'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">REPORT TO : </b></td>
								<td><?php echo $emp_data['report_to'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">LOCATION : </b></td>
								<td><?php echo $emp_data['location'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">ROLE : </b></td>
								<td><?php echo $emp_data['role'];?></td>
							</tr>
							<tr>
								<td><b style="font-size: 12px">STATUS: </b></td>
								<td><?php if($emp_data['status']=='1'){ echo "<a class='btn btn-success'>Active</a>";}else{echo "<a class='btn btn-danger'>Deactive</a>";}
								?></td>
							</tr>
							<!-- vikram start -->
														<tr>
								<td colspan="2">
									<div class="form-group">
				                        <div class="col-sm-12">
				                        	<div class="panel panel-default">
												<div class="panel-heading" style="color: #070432; font-size: 16px ">PRIVILLEGE</div>
												<div class="panel-body">
													<div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
						                                    DASHBOARD : </label>
						                                <div class="col-sm-2">
						                                	<?php
						                                		$dash = $adata['dashboard'];
						                                		$dashh = explode(',', $dash);
						 
						                                	?>
						                                	<input type="checkbox" name="dashboard[]" value="view" <?php foreach($dashh as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="dashboard[]" value="add" <?php foreach($dashh as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="dashboard[]" value="edit" <?php foreach($dashh as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
						                                    CUSTOMER MASTER : </label>
						                                    <?php
						                                		$cust = $adata['cust_master'];
						                                		$custt = explode(',', $cust);
						                                	?>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="customer[]" value="view" <?php foreach($custt as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="customer[]" value="add" <?php foreach($custt as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="customer[]" value="edit" <?php foreach($custt as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
						                                    EMPLOYEE MASTER : </label>
						                                    <?php
						                                		$emp = $adata['emp_master'];
						                                		$empp = explode(',', $emp);
						                                	?>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="employee[]" value="view" <?php foreach($empp as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="employee[]" value="add" <?php foreach($empp as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="employee[]" value="edit" <?php foreach($empp as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
						                                    USER MASTER : </label>
						                                    <?php
						                                		$user = $adata['user_master'];
						                                		$userr = explode(',', $user);
						                                	?>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="user[]" value="view" <?php foreach($userr as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="user[]" value="add" <?php foreach($userr as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="user[]" value="edit" <?php foreach($userr as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
						                                    VEHICLE MASTER : </label>
						                                    <?php
						                                		$vehicle = $adata['vehicle_master'];
						                                		$ve = explode(',', $vehicle);
						                                	?>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="vehicle[]" value="view" <?php foreach($ve as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="vehicle[]" value="add" <?php foreach($ve as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="vehicle[]" value="edit" <?php foreach($ve as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
						                                </div>
						                            </div>

						                            <div class="form-group row">
						                                <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
						                                    ADMINISTRATER MASTER : </label>
						                                    <?php
						                                		$admin = $adata['admin_master'];
						                                		$ad = explode(',', $admin);
						                                	?>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="admini[]" value="view" <?php foreach($ad as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;VIEW
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="admini[]" value="add" <?php foreach($ad as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;ADD
						                                </div>
						                                <div class="col-sm-2">
						                                	<input type="checkbox" name="admini[]" value="edit" <?php foreach($ad as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;EDIT
						                                </div>
						                            </div>

			                            <div class="form-group row">
                                            <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
                                                BULK DATA MASTER : </label>
                                                <?php
                                                    $admin = $adata['bulkdata_master'];
                                                    $ad = explode(',', $admin);
                                                ?>
                                            <div class="col-sm-2">
                                                <input type="checkbox" name="bulk[]" value="Yes" <?php foreach($ad as $val){if($val !== ''){echo 'checked';}} ?>>&nbsp;&nbsp;YES
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 form-label" style="font-size: 12px">
                                                OTHER OPTION MASTER : </label>
                                                <?php
                                                    $admin = $adata['other_master'];
                                                    $ad = explode(',', $admin);
                                                ?>
                                            <div class="col-sm-2">
                                                <input type="checkbox" name="bulk[]" value="Yes" <?php foreach($ad as $val){if($val !== ''){echo 'checked';}} ?>>&nbsp;&nbsp;YES
                                            </div>
                                        </div>
						                            
						                              
						                               
												</div>
											</div>
										</div>
				                    </div>
								</td>
							</tr>
							<!-- vikram end -->
							
							
							
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