<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login | Vahanfin.com.com</title>
<link rel="icon" type="image/png" href="https://vahanfin.com/vahanicon.png"/>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<body style="background-color: rgba(14,26,53,1)! important;">
		<!--header-->
		<div class="header-w3l">
			<h1 style="font-size: 30px;"></h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo" style="width:25%;">
	           <!--form-stars-here-->
			
          <div class="section-gap">&nbsp;</div>			<div class="wthree-form" style="height:480px">
							<center>
          <img src="http://vahanfin.com/logo1.png" alt="Vahanfin" width="128"></center>
						
          <div class="section-gap">&nbsp;</div><div class="section-gap">&nbsp;</div>	
							<form action="#" method="post">
								<div class="form-sub-w3">
									<input type="text" name="username" id="username" placeholder="Username " required="" />
								</div>
								<div class="form-sub-w3">
									<input type="password" name="password" id="password" placeholder="Password" required="" />
								</div>
								<label class="anim">
							
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="button" value="Login" id="login"  class="btn btn-secondary btn-lg" style="height: 56px; font-size: 16px; background-color:rgba(14,26,53,1); border-radius: 30px; padding: 13px 50px; border-color: none">
								</div>
							</form>

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p><span class="mx-1"><a href="https://wa.me/919324580342" target="_blank" class="text-white"><i class="fa fa-whatsapp my-floa" aria-hidden="true"></i></a></span>
                <span class="mr-1"><a href="https://twitter.com/vahanfin" target="_blank" class="text-white"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
                <span class="mx-1"><a href="https://www.facebook.com/vahanfin"  target="_blank" class="text-white"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
                <span class="mx-1"><a href="https://www.linkedin.com/company/vahanfin" target="_blank" class="text-white"><i class="fa fa-linkedin" aria-hidden="true"></i></a></span></p>
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