<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Email Verify| gaddiwalaonline.com</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" /> -->
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- Meta tag Keywords -->
<!-- css files -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php include('includes/commonFooter.php');?>
<?php //include('includes/sidebar.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <style>
   .skin-purple .wrapper, .skin-purple .main-sidebar, .skin-purple .left-side {
    background-color: #fbfcfd;
}
 </style> 
  <section class="content-header">
      <h3>
        Dashboard
        <small>Control panel</small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="height:500px;">
      <div class="container">    
        <div id="emailV">
          <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
          <div class="panel panel-primary" > 
            <div class="panel-heading" 
            style="background-image: linear-gradient(rgb(96, 92, 168), rgb(96, 92, 168)), url(images/gradient.jpg) ;background-size: cover;">
                <center><h4 style="color:white;line-height: 25px;margin-top: 0px;">Email Verification <br> <h5 style="color:white;">Verify your email to activate your account.<h5></h4></center>

            </div>
            <div style="padding-top:30px" class="panel-body" >
              <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form">
                  <div style="margin-bottom: 25px;height:50px;" class="input-group ">
                    <span class="input-group-addon" style="background:#605ca8;"><i class="fa fa-envelope" style="font-size:35px;color:white;"></i></span>
                    <input type="text" name="email" id="email" placeholder="Enter Your Registered Email " class="form-control" required=""style="height:50px;" />                                        
                  </div>

                  <center><input type="button" class="btn btn-primary" value="Send Otp" id="sotp" style="background: rgb(96, 92, 168);"></center>
                </form>
              </div>
            </div>
          </div>
          </div>
        </div>
         
        <div id="otpV">
          <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
          <div class="panel panel-primary" > 
            <div class="panel-heading" 
            style="background:rgb(96, 92, 168) ;">
                <center><h4 style="color:white;line-height: 25px;margin-top: 0px;">Email Verification <br> <h5 style="color:white;">Enter Otp to activate your Account.<h5></h4></center>

            </div>
            <div style="padding-top:30px" class="panel-body" >
              <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form">
                  <div style="margin-bottom: 25px;height:50px;" class="input-group ">
                    <span class="input-group-addon" style="background:#605ca8;"><i class="fa fa-pencil" style="font-size:35px;color:white;"></i></span>
                    <input type="text" name="otp" id="otp" placeholder="Enter Otp " required="" class="form-control" style="height:50px;" />                                        
                  </div>

                  <center>
                    <input type="button" class="btn btn-danger" value="Verify" id="votp" style="background: rgb(96, 92, 168);">
                  </center>
                </form>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      
                          
    </section><br/><br/><br/>
    <!-- /.content -->
  </div>
<?php include('includes/footer.php'); ?> 
<?php include('includes/commonFooter.php');?>
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

     })
</script>