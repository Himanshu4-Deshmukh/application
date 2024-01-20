<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	if($_GET['id'])
	{
		$id = $_GET['id'];
		$adata = getDataById('administrator','id',$id);
		$employee = getAllData('employee');

	if($_POST)
    {
    	if(isset($_POST['upd']))
		{
			$data['emp_id'] = $_POST['emp_id'];
    		$data['email'] =  $_POST['email'];
    		if(!empty($_POST['password']))
    		{
    			$data['password'] = md5($_POST['password']);
    		}
    		if(isset($_POST['dashboard']))
    		{
    			foreach ($_POST['dashboard'] as $d)
    			{
    				$dash[] = $d ;
    			}
    			$data['dashboard'] = implode(',', $dash);
    		}
    		else
    		{
    			$data['dashboard'] = '';
    		}

    		if(isset($_POST['customer']))
    		{
    			foreach ($_POST['customer'] as $c)
    			{
    				$cust[] = $c ;
    			}
    			$data['cust_master'] = implode(',', $cust);
    		}
    		else
    		{
    			$data['cust_master'] = '';
    		}

    		if(isset($_POST['employee']))
    		{
    			foreach ($_POST['employee'] as $e)
    			{
    				$emp[] = $e ;
    			}
    			$data['emp_master'] = implode(',', $emp);
    		}
    		else
    		{
    			$data['emp_master'] = '';
    		}

    		if(isset($_POST['user']))
    		{
    			foreach ($_POST['user'] as $u)
    			{
    				$us[] = $u ;
    			}
    			$data['user_master'] = implode(',', $us);
    		}
    		else
    		{
    			$data['user_master'] = '';
    		}


    		if(isset($_POST['vehicle']))
    		{
    			foreach ($_POST['vehicle'] as $v)
    			{
    				$ve[] = $v ;
    			}
    			$data['vehicle_master'] = implode(',', $ve);
    		}
    		else
    		{
    			$data['vehicle_master'] = '';
    		}

    		if(isset($_POST['admini']))
    		{
    			foreach ($_POST['admini'] as $a)
    			{
    				$ad[] = $a ;
    			}
    			$data['admin_master'] = implode(',', $ad);
    		}
    		else
    		{
    			$data['admin_master'] = '';
    		}
			$data['utype'] = 'subadmin';
			$data['status'] = '1';   
			// print_R($data);die();

			// $ins = insertData('administrator', $data);
			// if($ins['res'] == 1)
			$up = updateData('administrator', $data, 'id',$id);
			// print_r($up);die();
			if($up['res'] == 1)
			{
				$_SESSION['success'] = $up['msg'];
				echo '<meta http-equiv="refresh" content="1">';
			}
		}
	}
	
?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Admin Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
		<!-- User Statistics-->
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><b>Update Profile</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->

			<div class="box-body">
				<div class="col-sm-12">
					<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
						<br/><br/>

	                    <div class="form-group row">
	                        <label for="email" class="col-sm-2 form-label">
	                            Select Employee</label>
	                        <div class="col-sm-4" >
	                            <select name="emp_id" class="form-control" id="emp" onchange="getEmpDet($(this).find(':selected').val())">
									<option value="0">Please Select</option>

									<?php 
									 if($employee)
									 {
									 	foreach ($employee as $val) 
									 	{
									 	?>
											<option value="<?php echo $val['id'] ?>" <?php if($val['id'] == $adata['emp_id'])  {echo 'selected';}?>><?php echo $val['name']?></option>
									 	<?php
									 	}
									 }
									?>
								</select>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="email" class="col-sm-2 form-label">
	                            Email</label>
	                        <div class="col-sm-4">
	                            <input type="email" class="form-control" name="email" id="email" value="<?php echo  $adata['email'] ?>" required="required" />
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="mobile" class="col-sm-2 form-label">
	                            Password</label>
	                        <div class="col-sm-4">
	                           	<input type="password" class="form-control" name="password" placeholder="Enter Only if you forget your password" />
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <div class="col-sm-12">
	                        	<div class="panel panel-default">
									<div class="panel-heading">Privillege</div>
									<div class="panel-body">
										<div class="form-group row">
			                                <label for="email" class="col-sm-2 form-label">
			                                    Dashboard : </label>
			                                <div class="col-sm-1">
			                                	<?php
			                                		$dash = $adata['dashboard'];
			                                		$dashh = explode(',', $dash);
			 
			                                	?>
			                                	<input type="checkbox" name="dashboard[]" value="view" <?php foreach($dashh as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;View
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="dashboard[]" value="add" <?php foreach($dashh as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;Add
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="dashboard[]" value="edit" <?php foreach($dashh as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;Edit
			                                </div>
			                            </div>

			                            <div class="form-group row">
			                                <label for="email" class="col-sm-2 form-label">
			                                    Customer Master : </label>
			                                    <?php
			                                		$cust = $adata['cust_master'];
			                                		$custt = explode(',', $cust);
			                                	?>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="customer[]" value="view" <?php foreach($custt as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;View
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="customer[]" value="add" <?php foreach($custt as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;Add
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="customer[]" value="edit" <?php foreach($custt as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;Edit
			                                </div>
			                            </div>

			                            <div class="form-group row">
			                                <label for="email" class="col-sm-2 form-label">
			                                    Employee Master : </label>
			                                    <?php
			                                		$emp = $adata['emp_master'];
			                                		$empp = explode(',', $emp);
			                                	?>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="employee[]" value="view" <?php foreach($empp as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;View
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="employee[]" value="add" <?php foreach($empp as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;Add
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="employee[]" value="edit" <?php foreach($empp as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;Edit
			                                </div>
			                            </div>

			                            <div class="form-group row">
			                                <label for="email" class="col-sm-2 form-label">
			                                    User Master : </label>
			                                    <?php
			                                		$user = $adata['user_master'];
			                                		$userr = explode(',', $user);
			                                	?>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="user[]" value="view" <?php foreach($userr as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;View
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="user[]" value="add" <?php foreach($userr as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;Add
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="user[]" value="edit" <?php foreach($userr as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;Edit
			                                </div>
			                            </div>

			                            <div class="form-group row">
			                                <label for="email" class="col-sm-2 form-label">
			                                    Vehicle Master : </label>
			                                    <?php
			                                		$vehicle = $adata['vehicle_master'];
			                                		$ve = explode(',', $vehicle);
			                                	?>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="vehicle[]" value="view" <?php foreach($ve as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;View
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="vehicle[]" value="add" <?php foreach($ve as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;Add
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="vehicle[]" value="edit" <?php foreach($ve as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;Edit
			                                </div>
			                            </div>

			                            <div class="form-group row">
			                                <label for="email" class="col-sm-2 form-label">
			                                    Administrator Master : </label>
			                                    <?php
			                                		$admin = $adata['admin_master'];
			                                		$ad = explode(',', $admin);
			                                	?>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="admini[]" value="view" <?php foreach($ad as $val){if($val == 'view'){echo 'checked';}} ?>>&nbsp;&nbsp;View
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="admini[]" value="add" <?php foreach($ad as $val){if($val == 'add'){echo 'checked';}} ?>>&nbsp;&nbsp;Add
			                                </div>
			                                <div class="col-sm-1">
			                                	<input type="checkbox" name="admini[]" value="edit" <?php foreach($ad as $val){if($val == 'edit'){echo 'checked';}} ?>>&nbsp;&nbsp;Edit
			                                </div>
			                            </div>
			                            
			                              
			                               
									</div>
								</div>
							</div>
	                    </div>
	                       
	                    <div class="row">
	                        <div class="col-sm-5">
	                        </div>
	                        <div class="col-sm-6">
	                            <input type="submit" name='upd' value="Update" class="submit btn btn-primary btn-sm">
	                        </div>
	                    </div>
	                </form>	
				</div>
				
			</div>
			<!-- /.box-body -->
      	</div>
		<!-- /.User Statistics-->
		
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include('includes/footer.php'); 

}
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
