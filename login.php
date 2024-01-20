<!-- Updated by jayanti -->
<?php 
//session_start();

include_once("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | gaddiwalaonline.com</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!--<link rel="icon" type="image/png" href="assetLogin/images/icons/favicon.ico"/>-->
	<link rel="icon" href="../../images/logo1.png" type="image/png" sizes="16x16">
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetLogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetLogin/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetLogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assetLogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetLogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetLogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assetLogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assetLogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="assetLogin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<style>
		.p-t-80 {
		    padding-top: 50px;
		}

		.p-r-55 {
		    padding-right: 45px;
		}
		.p-l-55 {
		    padding-left: 45px;
		}
		.p-t-57 {
		    padding-top: 40px;
		}
		.p-b-112 {
	    	padding-bottom: 55px;
		}
		.Divbg{
	background: rgba(14,26,53,1);
    padding: 5px;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    }
		.Divbg1{
	background: rgba(14,26,53,1);
    padding: 5px;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    }

.Divbg:hover{
	background:#dd4b39;
}

.Divbg1:hover{
	background:#3B5998;
}


	</style>
	
	<div class="container-login100" style="background-color: rgba(14,26,53,1)! important;">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" style="height:600px; background-color:rgba(200,200,200,0.05) !important;">
			<form class="login100-form validate-form" action="loginvalidate.php" method="post">
				<span class="login100-form-title p-b-37" style=" padding-top: 45px; padding-bottom: 50px">
					<img src="images/logo.png" alt="LOGO" style="height:75px;">
				</span>

				<!-- new add -->
                <div class="form-group">
                  <input type="email" class="form-control" name="uname" id="username" placeholder="Username " required="required" style="background-color: rgba(14,26,53,1)! important; height: 35px; color: white ! important; font-family: SourceSansPro-Regular">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="pwd" id="password" placeholder="Password" required="required" style="background-color: rgba(14,26,53,1)! important; height: 35px; color: white; font-family: SourceSansPro-Regular">
                </div>
                <div class="form-group" style="margin-top:50px">
                 <center><button type="submit" name="Submit" id="login" class="btn btn-secondary btn-lg" style="height: 56px; font-size: 16px; background-color:rgba(14,26,53,1); font-family: SourceSansPro-Regular ; border-radius: 30px; padding: 13px 50px; border-color: none"><i class="fa fa-lock" style="color:#fff;"></i> Login</button></center>
                </div>

				<div class="text-center p-b-20" style="padding-top:30px">
					<span class="txt1">
						Or login with
					</span>
				</div>

				<div class="row">
                  <div class="col-md-6" style="width:50%">
				    <?php
					$gloginURL="";
					$authUrl = $googleClient->createAuthUrl();
					$gloginURL = filter_var($authUrl, FILTER_SANITIZE_URL);
					?>	
					<div class="Divbg"><a style="color: white;" href="<?php echo htmlspecialchars($gloginURL);?>">Google</a></div>
                  </div>
                  
                  <div class="col-md-6" style="width: 50%">
                  	<?php
					$fbloginURL =  $helper->getLoginUrl($redirectURL, $fbPermissions);
					?>
					<div class="Divbg1"><a style="color: white;" href="<?php echo htmlspecialchars($fbloginURL);?>">Facebook</a></div>
                  </div>
              </div>

                  <!-- new add -->
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assetLogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assetLogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assetLogin/vendor/bootstrap/js/popper.js"></script>
	<script src="assetLogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assetLogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assetLogin/vendor/daterangepicker/moment.min.js"></script>
	<script src="assetLogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assetLogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assetLogin/js/main.js"></script>

</body>
</html>

<!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script> -->
<?php include('includes/commonFooter.php');?>

<?php
if($_SESSION)
	{
		if(!empty($_SESSION['error']) != '')
		{
			$msg = $_SESSION['error'];
			echo "<script> showErrorMsgBox('".$msg."');</script>";
			$_SESSION['error'] = '';
		}

		if(!empty($_SESSION['success']) != '')
		{
			$msg = $_SESSION['success'];
			echo "<script> showSuccessMsgBox('".$msg."');</script>";
			$_SESSION['success'] = '';
		}
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#login').click(function(){
			var user = $('#username').val();
			var pass = $('#password').val();
			$.ajax({

				url : 'includes/function.php',
				type : 'post',
				data : {action:'checkLogin' ,user:user , pass:pass},
				success:function(data)
				{
					var obj = jQuery.parseJSON(data);
					if(obj.d == 0)
					{
                        showErrorMsgBox('Invalid Username and Password.');
					}

					if(obj.d == 1)
					{
						if(obj.utype == 'fleet_rto')
						{
							//$_SESSION["user_prev"]="fleet_rto";
							showSuccessMsgBox('LoggedIn Successfully Redirecting ...');
							setTimeout("window.location.href='dashboard.php';",3000);											
						}

						if(obj.utype == 'fleet')
						{
							//$_SESSION["user_prev"]="fleet";
							showSuccessMsgBox('LoggedIn Successfully Redirecting ...');
							setTimeout("window.location.href='dashboard.php';",3000);							
						}
						
						if(obj.utype == 'rto')
						{
							//$_SESSION["user_prev"]="rto";
							showSuccessMsgBox('LoggedIn Successfully Redirecting ...');
							setTimeout("window.location.href='rto/dashboard.php';",3000);						
						}


						if(obj.utype == 'management')
						{
							//$_SESSION["user_prev"]="management";
							showSuccessMsgBox('LoggedIn Successfully Redirecting ...');							
							setTimeout("window.location.href='management/dashboard.php';",3000);
						}

						if(obj.utype == 'admin')
						{
							showErrorMsgBox('Invalid Username and Password.');
						}
					}
				}
			})
		})
	})
</script>