<!-- Author: Sushmita
Email: sushmitasharma989@hmail.com -->
<?php session_start(); 
// error_reporting(-1);
?>


<?php
    if(!empty($_GET['code']))
    {
    	if($_GET['code'])
		{
			if($_GET['code'] == $_SESSION['code'])
			{
				
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
<link rel="stylesheet" href="assets/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- <link rel="stylesheet" href="assets/css/loginStyle.css" type="text/css" media="all" /> -->
<!-- //css files -->
<link rel="stylesheet" type="text/css" href="assetLogin/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assetLogin/fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="assetLogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="assetLogin/css/main.css">
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<!-- //web-fonts -->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('assetLogin/images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<center><img src ="assetLogin/images/logo.png " style="height:100px;width:130px;margin-top:10px;"></center><br/><br/>
	
						<div id="simpleLogin">
							<form class="login100-form " action="#" method="post">

								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<span class="label-input100">Password</span>
									<input class="input100" type="password" name="password" id="password" placeholder="*************" required="" />
									<span class="focus-input100"></span>
								</div>

								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<span class="label-input100">Confirm Password</span>
									<input class="input100" type="password" name="cpassword" id="cpassword" placeholder="*************" required="" />
									<span class="focus-input100"></span>
								</div>

								<center>
									<div class="container-login100-form-btn">
										<div class="wrap-login100-form-btn">
											<div class="login100-form-bgbtn"></div>
											<input type="button" value="Save" id="save" class="login100-form-btn" style="background: -webkit-linear-gradient(bottom, #ad3974, #8b56ab);">
										</div>
										<!-- &nbsp;&nbsp;&nbsp;&nbsp;<p id="forgot">Forgot Password</p> -->
									</div>
								</center>

								
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
            }
            else
            {
                echo  "<h3> Invalid Request ..Please Try again Later....... !!!!!</h3>";
            }
		}
    }
    else
    {
    	echo "<script>alert('Invalid Request');window.location.href='index.php';</script>";

    }
	
?>




<?php
include('includes/commonFooter.php');

if($_SESSION)
	{
		if(!empty($_SESSION['error']))
		{
			$msg = $_SESSION['error'];
			echo "<script> showErrorMsgBox('".$msg."');</script>";
			$_SESSION['error'] = '';
		}

		if(!empty($_SESSION['success']))
		{
			$msg = $_SESSION['success'];
			echo "<script> showSuccessMsgBox('".$msg."');</script>";
			$_SESSION['success'] = '';
		}
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
        $('#forgetPass').hide();

		$('#save').click(function(){
			var password = $('#password').val();
			var cpassword = $('#cpassword').val();
			$.ajax({

				url : 'includes/function.php',
				type : 'post',
				data : {action:'changeFpPassword' ,password:password , cpassword:cpassword},
				// beforeSend: function() 
			 //        { $('#loading').show(); }, 
			 //    complete: function() 
			 //        { $('#loading').hide(); },
				success:function(data)
				{
					var obj = jQuery.parseJSON(data);
					// alert(obj.res);
					if(obj.res == 0)
					{
                        showErrorMsgBox('Invalid Username and Password.');
					}

					if(obj.res == 1)
					{
						showSuccessMsgBox('Password Updated Sussessfully . Login to Continue');
						setTimeout("window.location.href='index.php';",3000);
					}
				}
			})
		})

		$('#forgot').click(function(){
			$('#simpleLogin').hide();
			$('#forgetPass').show();

		});

		$('#simple').click(function(){
			$('#forgetPass').hide();

			$('#simpleLogin').show();

		});

		$('#sendCode').click(function(){
			var email = $('#email').val();
			$.ajax({

				url : 'includes/function.php',
				type : 'post',
				data : {action:'sendFpCode' ,email:email },
				success:function(data)
				{
					var obj = jQuery.parseJSON(data);
					
				}
			})
		})
	})
</script>