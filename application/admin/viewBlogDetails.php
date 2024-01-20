<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	$id = $_GET['id'];
	$udata = getDataById('blogs','id',$id);
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
				<div class="col-sm-8" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);padding:20px;">
					<center>
						<?php 
		            		if($udata['blog_image'])
		            		{
		            			$imgs = 'uploads/BlogFile/'.$udata['blog_image'];
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
								<td><b>Blog Title : </b></td>
								<td><?php echo $udata['blog_title']?></td>
							</tr>
							<tr>
								<td><b>Description : </b></td>
								<td><?php echo $udata['description']?></td>
							</tr>
							<tr>
								<td><b>Post Date: </b></td>
								<td><?php echo date('d-m-Y',strtotime($udata['post_date']));?></td>
							</tr>
							<tr>
								<td><b>Post Time: </b></td>
								<td><?php echo date('h:i:s',strtotime($udata['post_time']));?></td>
							</tr>
							<!-- 
							<tr>
								<td><b>Status: </b></td>
								<td><?php if($udata['status']=='1'){ echo "<a class='btn btn-success'>Active</a>";}else{echo "<a class='btn btn-danger'>Deactive</a>";}
								?></td>
							</tr> -->
							
							
							
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