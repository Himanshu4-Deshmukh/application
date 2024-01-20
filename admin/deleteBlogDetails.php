<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	$id = $_GET['id'];
	//$cust_data = getDataById('blogs','id',$id);
	include('conn.php');
	if(isset($_POST['Submit']))
	{
	$sql="DELETE FROM blogs WHERE id='$id'";
	if(mysqli_query($conn,$sql))
	{
		echo '<script> 
	  alert("Blog has been deleted.");
	  window.location.href = "newBlog.php";
	   </script>';
	}
	else
	{
		echo 'mysqli_error($conn)';
	}
	}
 ?>  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog Details |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blog Details</li>
      </ol>
    </section><br/>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Blog Details</b></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<a onclick="window.history.back();" style="left:20px;" class="btn btn-primary pull-right" ><i class="fa fa-arrow-left"></i> &nbsp; Go back</a><br/><br/><br/>
				<div class="col-sm-10" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);padding:20px;">
					<form action="" method="post">
					<div style="text-align: center;">
						<p>Are you sure to permanently delete this Blog ?</p>
                        <input type="submit" name='Submit' value="Delete" class="submit btn btn-primary ">
					</div>
					</form>
				</div>
			</div>
				<!-- /.box-body -->
	    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>
<?php include('includes/commonFooter.php');?>
<?php
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