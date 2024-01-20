<?php 
include('includes/header.php');  
include('includes/sidebar.php');
 ?>  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size:15px !important">
        Change Password
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="col-sm-8">
			<!-- User Statistics-->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Change Password</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<!-- form -->
					<form method="post" id="adminChangePassword">
						<input type="hidden"  name="id" value="<?php echo $_SESSION['uid'] ?>">
						<div class="form-group row">
						    <label for="inputEmail3" class="col-sm-4 col-form-label">Old Password</label>
						    <div class="col-sm-8">
						      <input type="password" class="form-control name="oldpass" id="oldpass" required/>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="inputEmail3" class="col-sm-4 col-form-label">New Password</label>
						    <div class="col-sm-8">
						      <input type="password" class="form-control name="newpass" id="newpass" required>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm New Password</label>
						    <div class="col-sm-8">
						      <input type="password" class="form-control" name="cnewpass" id="cnewpass" required>
						    </div>
						</div>

						<div class="form-group row">
							<div class="col-sm-offset-5 .col-sm-4">
						   		<input type="button" name="submit" value="update"  class="update btn btn-primary" style="margin-left:15px">
							</div>

						</div>
					</form>
					
					<!-- /.form -->
				</div>
				<!-- /.box-body -->
	      	</div>
			<!-- /.User Statistics-->
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include('includes/footer.php'); 
include('includes/commonFooter.php');
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.update').click(function(){
			var oldpass = $('#oldpass').val();
            var newpass = $('#newpass').val();
            var cnewpass = $('#cnewpass').val();
            if(!oldpass)
            {  
            	var msg = 'Old Password field required';
            	showErrorMsgBox(msg);
            	$('#oldpass').focus();
            }
            else
            if(!newpass)
            {  
            	var msg = 'New Password field required'
            	showErrorMsgBox(msg);
            	$('#newpass').focus();
            }
            else
            if(!cnewpass)
            {  
            	var msg = 'confirm New Password field required'
            	showErrorMsgBox(msg);
            	$('#cnewpass').focus();
            }
            else
            if(newpass && cnewpass)
            {
            	if(newpass != cnewpass)
            	{
            		var msg = 'New Password and Confirm New Password did not matched'
	            	showErrorMsgBox(msg);
            	}
            	else
            	{
            		$.ajax({
		                url : 'includes/function.php',
						type : 'post',
						data : {
									action:'changePassword',
		                			oldpass:oldpass,
		                			newpass:newpass,
		                			cnewpass:cnewpass
		                		},/*parameter pass data is parameter name param is value */
		                success: function(msg) {
		                	var obj = jQuery.parseJSON(msg);
		                	if(obj.res == '0')
		                	{
		                		showErrorMsgBox(obj.msg);
		                		$('#oldpass').val('');
					            $('#newpass').val('');
					            $('#cnewpass').val('');
		                	}

		                	if(obj.res == '1')
		                	{
		                		showSuccessMsgBox(obj.msg);
		                		$('#oldpass').val('');
					            $('#newpass').val('');
					            $('#cnewpass').val('');
		                	}
		                }
	            	})
            	}
            }
		})
	})
</script>