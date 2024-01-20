<!-- Author: Sushmita
Email: sushmitasharma989@hmail.com -->
<?php session_start(); 

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
<link rel="stylesheet" href="assets/css/loginStyle.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<?php include('includes/commonFooter.php');?>
<!-- //web-fonts -->
<style>
	body
	{
		background: linear-gradient(rgba(210, 156, 89, 0.32), rgba(210, 156, 89, 0.42)),  url(assets/images/email.jpg) ;
    background-size: cover;
    /*-webkit-background-size: cover;*/
	}


</style>
</head>
<body>
		<!--header-->
		<div class="header-w3l"><br/><br/>
			<!--<center><img src ="images/logo.png " style="height:100px;width:130px;margin-top:10px;"></center>-->
			<!--<h1 style="font-size: 30px;margin-top: -10px;">User Login Form</h1>*/-->
		</div><br/><br/>
		<!--//header-->
		<!--main-->

		<!-- <input type="text" name="ff" id="ff" value="<?php //echo $_SESSION['evotp'] ?>" />-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form" id="emailV">
							<h2>Verify your Email to Activate your Account !!</h2>
							<form action="#" method="post" >
								<div class="form-sub-w3">
									<input type="text" name="email" id="email" placeholder="Enter Your Registered Email " required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								
								 
								<div class="clear"></div>
								<!-- <div class="submit-agileits" style="display:none;" id="loading">
									<img src="assets/images/load.gif" style="height: 46px;width: 445px;">
								</div> -->
								<div class="submit-agileits">
									<input type="button" class="btn btn-danger" value="Send Otp" id="sotp">
								</div>
							</form>



						</div>

						<div class="wthree-form" id="otpV">
							<h2>Enter Otp And verify your Email!!</h2>
							<form action="#" method="post" >
								<div class="form-sub-w3">
									<input type="text" name="otp" id="otp" placeholder="Enter Otp " required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="button" class="btn btn-danger" value="Verify" id="votp">
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





<script type="text/javascript">
	$(document).ready(function(){

		$('#otpV').hide();
		$('#sotp').click(function()
		{
			var email = $('#email').val();
			$.ajax({

				url : 'includes/function.php',
				type : 'post',
				data : {action:'sendOtpEmail' ,email:email},
				success:function(data)
				{
					var obj= jQuery.parseJSON(data);
					console.log(obj);
					if(obj.d ==1)
					{
						showSuccessMsgBox('Email Sent Successfully!!!');
						
						$('#otpV').show('slow');
						$('#emailV').hide('slow');

					}

					if(obj.d ==0)
					{
						showErrorMsgBox('Sorry For the Technical issue .Please try again later.');
						
					}

					
				}
			})
		})

		$('#votp').click(function()
		{
			var otp = $('#otp').val();
			$.ajax({

				url : 'includes/function.php',
				type : 'post',
				data : {action:'verifyOtpEmail' ,otp:otp},
				success:function(data)
				{

					if(data ==1)
					{
						showSuccessMsgBox('Email Verified Successfully . Your Account is Activated Now');
						setTimeout("window.location.href='dashboard.php';",1000);
					}

					if(data ==0)
					{
						showErrorMsgBox('Sorry For the Technical issue .Please try again later.');
						$('#otpV').hide('slow');
						$('#emailV').show('slow');
					}

					
				}
			})
		})

		// $('#login').click(function(){
		// 	var user = $('#username').val();
		// 	var pass = $('#password').val();
		// 	$.ajax({

		// 		url : 'includes/function.php',
		// 		type : 'post',
		// 		data : {action:'checkLogin' ,user:user , pass:pass},
		// 		// beforeSend: function() 
		// 	 //        { $('#loading').show(); }, 
		// 	 //    complete: function() 
		// 	 //        { $('#loading').hide(); },
		// 		success:function(data)
		// 		{
		// 			var obj = jQuery.parseJSON(data);
		// 			if(obj.d == 0)
		// 			{
  //                       showErrorMsgBox('Invalid Username and Password.');
		// 			}

		// 			if(obj.d == 1)
		// 			{
						
		// 				if(obj.utype == 'user')
		// 				{
		// 					showSuccessMsgBox('LoggedIn Successfully Redirecting ...');
		// 					if(obj.status == '1')
		// 					{
		// 						setTimeout("window.location.href='dashboard.php';",5000);
		// 					}

		// 					if(obj.status == '0')
		// 					{
		// 						setTimeout("window.location.href='emailVerify.php';",3000);
		// 					}
		// 				}
		// 				// window.location.href = 'dashboard.html';

		// 				if(obj.utype == 'admin')
		// 				{
		// 					showErrorMsgBox('Invalid Username and Password.');
		// 				}
		// 			}
		// 		}
		// 	})
		// })
	})
</script>