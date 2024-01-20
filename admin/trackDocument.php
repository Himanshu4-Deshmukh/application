<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	$id = $_SESSION['uid'];
//	$doc = $_GET['doc'];
	$vid = $_GET['id'];
	$cid = $_GET['customer_id'];
	$track = getTrackDataById('track' , $vid);
	if($track)
	{
		
		$duid = $track['doc_unique_id'];
		$doc_recieved = $track['doc_recieved'];
		$challan = $track['challan'];
		$dto_passing = $track['dto_passing'];
		$mvi_passing = $track['mvi_passing'];
		$rc_card = $track['rc_card'];
		$complete = $track['complete'];
	}
	else
	{
		$duid = '';
		$doc_recieved ='';
		$challan = '';
		$dto_passing = '';
		$mvi_passing = '';
		$rc_card = '';
		$complete = '';
	}
	
 ?>  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size:15px">
        Track Document  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Track Document</li>
      </ol>
    </section><br/>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      	<div class="box box-success" >
			<div class="box-header with-border">
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">

	                <div class="col-sm-12">
						
	                        <div class="panel panel-info">
								<div class="panel-heading">Document Recieved</div>
								<div class="panel-body">
								<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
									<div class="form-group row">
										<input type="hidden" name="vehicleID" id="vid" value="<?php echo $vid ?>">
										<input type="hidden" name="cid" id="cid" value="<?php echo $cid ?>">
				                        <label for="email" class="col-sm-2 form-label"> Document recieved : </label>
				                        <div class="col-sm-1">
				                        	<input type="checkbox" name="docRec" id="docRec" value="1" <?php if($doc_recieved =='1'){ echo "checked";} ?>>&nbsp;&nbsp;
				                        </div>
										<div class="col-sm-1">
				                        	<?php if($duid == '')
				                        	{
				             					?>
				                        		<input type="button" name='add' id="addDocRec" value="Update Track" class="submit btn btn-primary ">
				                        		<?php
				                        	}
				                        	?>
				                        </div>
                             
				                    </div>
	                            </form>
								</div>  <!--  panel-body end -->
								<div class="panel-heading">Processing</div>
								<div class="panel-body">
									<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
				                        <label for="email" class="col-sm-2 form-label"> Challan : </label>
				                        <div class="col-sm-1">
				                        	<input type="checkbox" name="challan" value="1" <?php if($challan =='1'){ echo "checked";} ?>>&nbsp;&nbsp;
				                        </div>
				                        <div class="col-sm-2">
				                        	<input type="button" name='add' id="updChallan" value="Update Challan Track" class="submit btn btn-primary ">
				                        </div>
				                    </div>
				                    </form><br>
				                    <form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
				                        <label for="email" class="col-sm-2 form-label"> DTO Passing : </label>
				                        <div class="col-sm-1">
				                        	<input type="checkbox" name="dto_passing" value="1" <?php if($dto_passing =='1'){ echo "checked";} ?>>&nbsp;&nbsp;
				                        </div>
				                        <div class="col-sm-2">
				                        	<input type="button" name='add' id="updDTO" value="Update DTO Track" class="submit btn btn-primary ">
				                        </div>
				                    </div>
				                    </form><br>
				                    <form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
				                        <label for="email" class="col-sm-2 form-label"> MVI Passing : </label>
				                        <div class="col-sm-1">
				                        	<input type="checkbox" name="mvi_passing" value="1" <?php if($mvi_passing =='1'){ echo "checked";} ?>>&nbsp;&nbsp;
				                        </div>
				                        <div class="col-sm-2">
				                        	<input type="button" name='add' id="updMVI" value="Update MVI Track" class="submit btn btn-primary ">
				                        </div>
				                    </div>
				                    </form><br>
				                    <form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
				                        <label for="email" class="col-sm-2 form-label"> RC Card : </label>
				                        <div class="col-sm-1">
				                        	<input type="checkbox" name="rc_card" value="1" <?php if($rc_card =='1'){ echo "checked";} ?>>&nbsp;&nbsp;
				                        </div>
				                        <div class="col-sm-2">
				                        	<input type="button" name='add' id="updRC" value="Update RC Track" class="submit btn btn-primary ">
				                        </div>
				                    </div>
				                    </form><br>
				                    </div> <!-- panel-body end -->
								<div class="panel-heading">Document Deliver</div>
								<div class="panel-body">
								<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">
									<div class="form-group row">       
				                        <label for="email" class="col-sm-3 form-label"> Compelete : </label>
				                        <div class="col-sm-1">
				                        	<input type="checkbox" name="complete" value="1" <?php if($complete =='1'){ echo "checked";} ?>>&nbsp;&nbsp;
				                        </div>
				                        <div class="col-sm-1">
				                        	<input type="button" name='add' id="updComp" value="Update Track" class="submit btn btn-primary ">
				                        </div>        
				                    </div>
	                    		</form>
								</div> <!-- panel-body end -->
								</div>
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
<script type="text/javascript">

	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })



    });


    $('#addDocRec').click(function(){

    	var vid = $('#vid').val();
    	var doc = $('#doc').val();
    	var cid = $('#cid').val();
    	var docuid = $('#doc_unique_id').val();
    	var docrec = $('input[name="docRec"]:checked').val();

    	$.ajax({
					url : 'includes/function.php',
					type : 'post',
					data : {action:'documentRecieved' ,vid:vid ,doc:doc ,cid:cid ,docuid:docuid , docrec:docrec},
					success:function(data)
					{
						var obj = jQuery.parseJSON(data);
						if(obj.res == 1)
						{
							showSuccessMsgBox('Inserted Successfully');
							setTimeout("window.location.reload()",1000);
						}

						if(obj.res == 0)
						{
							showErrorMsgBox('Not Inserted');
							setTimeout("window.location.reload()",1000);
						}

					}
				})

    })

    $('#updChallan').click(function(){

    	var vid = $('#vid').val();
    	var doc = $('#doc').val();
    	var challan = $('input[name="challan"]:checked').val();
    	
    	$.ajax({
					url : 'includes/function.php',
					type : 'post',
					data : {action:'updChallan' ,vid:vid ,doc:doc ,challan:challan },
					success:function(data)
					{
						var obj = jQuery.parseJSON(data);
						if(obj.res == 1)
						{
							showSuccessMsgBox('Updated Successfully');
							setTimeout("window.location.reload()",1000);
						}

						if(obj.res == 0)
						{
							showErrorMsgBox('Not Updated');
							setTimeout("window.location.reload()",1000);
						}

					}
				})

    })

    $('#updDTO').click(function(){

    	var vid = $('#vid').val();
    	var doc = $('#doc').val();
    	var dto_passing = $('input[name="dto_passing"]:checked').val();

    	$.ajax({
					url : 'includes/function.php',
					type : 'post',
					data : {action:'updDTO' ,vid:vid ,doc:doc , dto_passing:dto_passing },
					success:function(data)
					{
						var obj = jQuery.parseJSON(data);
						if(obj.res == 1)
						{
							showSuccessMsgBox('Updated Successfully');
							setTimeout("window.location.reload()",1000);
						}

						if(obj.res == 0)
						{
							showErrorMsgBox('Not Updated');
							setTimeout("window.location.reload()",1000);
						}


					}
				})

    })


    $('#updMVI').click(function(){

    	var vid = $('#vid').val();
    	var doc = $('#doc').val();
    	var mvi_passing = $('input[name="mvi_passing"]:checked').val();

    	$.ajax({
					url : 'includes/function.php',
					type : 'post',
					data : {action:'updMVI' ,vid:vid ,doc:doc , mvi_passing:mvi_passing},
					success:function(data)
					{
						var obj = jQuery.parseJSON(data);
						if(obj.res == 1)
						{
							showSuccessMsgBox('Updated Successfully');
							setTimeout("window.location.reload()",1000);
						}

						if(obj.res == 0)
						{
							showErrorMsgBox('Not Updated');
							setTimeout("window.location.reload()",1000);
						}


					}
				})

    })

    $('#updRC').click(function(){

    	var vid = $('#vid').val();
    	var doc = $('#doc').val();
    	var rc_card = $('input[name="rc_card"]:checked').val();

    	$.ajax({
					url : 'includes/function.php',
					type : 'post',
					data : {action:'updRC' ,vid:vid ,doc:doc , rc_card:rc_card},
					success:function(data)
					{
						var obj = jQuery.parseJSON(data);
						if(obj.res == 1)
						{
							showSuccessMsgBox('Updated Successfully');
							setTimeout("window.location.reload()",1000);
						}

						if(obj.res == 0)
						{
							showErrorMsgBox('Not Updated');
							setTimeout("window.location.reload()",1000);
						}

					}
				})

    })

    $('#updComp').click(function(){

    	var vid = $('#vid').val();
    	var doc = $('#doc').val();
    	var comp = $('input[name="complete"]:checked').val();

    	$.ajax({
					url : 'includes/function.php',
					type : 'post',
					data : {action:'updComp' ,vid:vid ,doc:doc , comp:comp},
					success:function(data)
					{
						var obj = jQuery.parseJSON(data);
						if(obj.res == 1)
						{
							showSuccessMsgBox('Completed Successfully');
							setTimeout("window.location.reload()",1000);
						}

						if(obj.res == 0)
						{
							showErrorMsgBox('Not Completed');
							setTimeout("window.location.reload()",1000);
						}

					}
				})

    })

	
</script>