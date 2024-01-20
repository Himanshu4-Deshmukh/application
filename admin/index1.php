<!-- Author: Sushmita
Email: sushmitasharma989@hmail.com -->
<?php //session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login | gaddiwalaonline.com</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" /> -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="../assets/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="../assets/css/adminLoginStyle.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<?php include('includes/commonFooter.php');?>
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1 style="font-size: 30px;">Admin</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Fill out the form below to login</h2>
							<form action="#" method="post">
								<div class="form-sub-w3">
									<input type="text" name="username" id="username" placeholder="Username " required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="password" id="password" placeholder="Password" required="" />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<label class="anim">
								<input type="checkbox" class="checkbox">
									<span>Remember Me</span> 
									<a href="#">Forgot Password</a>
								</label> 
								<div class="clear"></div>
								<!-- <div class="submit-agileits" style="display:none;" id="loading">
									<img src="assets/images/load.gif" style="height: 46px;width: 445px;">
								</div> -->
								<div class="submit-agileits">
									<input type="button" value="Login" id="login">
								</div>
							</form>

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p></p>
		</div>
		<!--//footer-->
</body>
</html>



<?php
if(isset($_SESSION['error']) or isset($_SESSION['success']))
	{
		if(isset($_SESSION['error']))
		{
			$msg = $_SESSION['error'];
			echo "<script> showErrorMsgBox('".$msg."');</script>";
			$_SESSION['error'] = '';
		}

		if(isset($_SESSION['success']))
		{
			$msg = $_SESSION['success'];
			//echo "<script> showSuccessMsgBox('".$msg."');</script>";
			$_SESSION['success'] = '';
		}
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
// 		alert('abcd');
		$('#login').click(function(){
			var user = $('#username').val();
			var pass = $('#password').val();
			$.ajax({

				url : 'includes/function.php',
				type : 'post',
				data : {action:'checkLogin' ,user:user , pass:pass},
				// beforeSend: function() 
			 //        { $('#loading').show(); }, 
			 //    complete: function() 
			 //        { $('#loading').hide(); },
				success:function(data)
				{
				    // console.log(data);
					var obj = jQuery.parseJSON(data);
					if(obj.d == 0)
					{
                        showErrorMsgBox('Invalid Username and Password.');
					}

					if(obj.d == 1)
					{
						if(obj.utype == 'admin')
						{
							showSuccessMsgBox('LoggedIn Successfully Redirecting ...');
							setTimeout("window.location.href='dashboard.php';",3000);
						}

						if(obj.utype == 'subadmin')
						{
							showSuccessMsgBox('LoggedIn Successfully Redirecting ...');
							if(obj.dashboard == '')
							{
								setTimeout("window.location.href='udashboard.php';",3000);

							}
							else
							{
								setTimeout("window.location.href='dashboard.php';",3000);

							}
						}

						if(obj.utype == 'user')
						{
							showErrorMsgBox('Invalid Username and Password.');
						}
					}
				}
			})
		})
	})
</script>