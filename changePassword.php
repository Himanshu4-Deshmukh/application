<?php 
include('includes/header.php');  
include('includes/sidebar.php');
 ?>  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        CHANGE PASSWORD
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section><br/>

    <!-- Main content -->
 

	
	<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;

    }

    .content {
      width: 100%;
      max-width: 600px;
      padding: 20px;
	  margin-top: 50px;
    }

    .box {
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .box-header {
      background-color: #f0f0f0;
      padding: 10px 15px;
      border-bottom: 1px solid #ddd;
    }

    .box-title {
      margin: 0;
    }

    .box-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-size: 14px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      color: #fff;
    }

    .btn-primary {
      background-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-box-tool {
      background: none;
      border: none;
      cursor: pointer;
      outline: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <section class="content">
      <div class="col">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">CHANGE PASSWORD</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form method="post" id="adminChangePassword">
              <input type="hidden" name="id" value="<?php echo $_SESSION['uid'] ?>">
              <div class="form-group">
                <label for="oldpass">OLD PASSWORD</label>
                <input type="password" class="form-control" name="oldpass" id="oldpass" required>
              </div>
              <div class="form-group">
                <label for="newpass">NEW PASSWORD</label>
                <input type="password" class="form-control" name="newpass" id="newpass" required>
              </div>
              <div class="form-group">
                <label for="cnewpass">CONFIRM NEW PASSWORD</label>
                <input type="password" class="form-control" name="cnewpass" id="cnewpass" required>
              </div>
              <div class="form-group">
                <input type="button" name="submit" value="Update" class="update btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>


 
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