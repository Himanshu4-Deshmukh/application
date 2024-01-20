<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	
	$id = $_SESSION['uid'];
	$vid = $_GET['id'];
	$vehicle = getDataById('vehicle','id',$vid);
	
 ?>  


 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Track Vehicle Details  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Track Vehicle Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="box box-success" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Contact Details</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
				
				
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<?php 
					if($vehicle)
					{
						if($vehicle['rc_upload'])
						{
							?>
							<p><b>Rc Upload</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=rc" class="btn btn-primary" >View / Update Track</a></p>
							<?php
						}	
					} 
				?>
				<?php 
					if($vehicle)
					{
						if($vehicle['fitness_no'])
						{
							?>
							<p><b>Fitness</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=fitness" class="btn btn-primary" >View / Update Track</a></p>
							<?php
						}	
					} 
				?>

				<?php 
					if($vehicle)
					{
						if($vehicle['permit_no'])
						{
							?>
							<p><b>Permit</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=permit" class="btn btn-primary" >View / Update Track</a></p>
							<?php
						}	
					} 
				?>

				<?php 
					if($vehicle)
					{
						if($vehicle['insurence_no'])
						{
							?>
							<p><b>Insurence</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=insurence" class="btn btn-primary" >View / Update Track</a></p>
							<?php
						}	
					} 
				?>

				<?php 
					if($vehicle)
					{
						if($vehicle['sld_no'])
						{
							?>
							<p><b>Speed Limit Device</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=sld" class="btn btn-primary" >View / Update Track</a> </p>
							<?php
						}	
					} 
				?>

				<?php 
					if($vehicle)
					{
						if($vehicle['rt_no'])
						{
							?>
							<p><b>Reflective Tape</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=rt" class="btn btn-primary" >View / Update Track</a></p>
							<?php
						}	
					} 
				?>

				<?php 
					if($vehicle)
					{
						if($vehicle['tt_no'])
						{
							?>
							<p><b>Tax Token</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=tt" class="btn btn-primary" >View / Update Track</a></p>
							<?php
						}	
					} 
				?>

				<?php 
					if($vehicle)
					{
						if($vehicle['pollution_no'])
						{
							?>
							<p><b>Pollution</b> <a href= "trackDocument.php?id=<?php echo $vid ?>&doc=pollution" class="btn btn-primary" >View / Update Track</a></p>
							<?php
						}	
					} 
				?>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
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

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })



    });

	function changeStatus(status,id)
	{
		$.msgBox({
            title: "Are You Sure",
            content: 'you want to change the Status ??',
            type: "confirm",
            buttons: [{ value: "Yes" }, { value: "No" }, { value: "Cancel"}],
            success: function (result) 
            {
                if (result == "Yes") 
                {
                	var table = 'contact';
                    $.ajax({
						url : 'includes/function.php',
						type : 'post',
						data : {action:'changeStatus' ,id:id , status:status, table:table},
						success:function(data)
						{
							if(data == 1)
							{
								showSuccessMsgBox('Status Change Successfully');
								setTimeout("window.location.reload()",1000);
							}
						}
					})
                }
            }
        });
	}

	function getEmpDet(id)
	{
		var fielddata = id;
		var fieldname = 'id';
		var table = 'employee';
            $.ajax({
				url : 'includes/function.php',
				type : 'post',
				data : {action:'getAllDataByIdAjax' , table:table,fieldname:fieldname , fielddata:fielddata},
				success:function(data)
				{
					var obj = jQuery.parseJSON(data);
					$('#email').val(obj.email);
				}
			})
        }
	// }
	
</script>