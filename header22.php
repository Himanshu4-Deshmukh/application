<?php
include_once("dashboard/gwonline/glog/config.php");
include_once("dashboard/gwonline/fblog/config.php");
include_once("conn.php");
echo '<!DOCTYPE html><!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
<style>
		iframe {
			width: 100%;
			height: 600px;
		}
	</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    		<title>RTO services Gaadiwalaonline </title>
		<meta name="description" content="Gaadiwalaonline.com is a service platform catering to all your RTO based services and products at an affordable cost in a professional way. Established in 2005, the company has over 500 clients at present. We have our head office in Mumbai with operations all over India. At present, we have over 50 automobile brands and 250+ automobile dealers registered with us."/>
		<meta name="keywords" content="rto Services, online RTO Services,rto service in hyderabad,rto service in banglore,rto service banglore,rto service in delhi,rto service in noida,rto service in gurgaon,rto service chennai,rto service mumbai,rto service in faridabad,rto service injamshedpur,rto service in ranchi,rto service in patna,rto service in ahmedabad,rto service in jaipur,rto service in kanpur,rto service in lucknow"/>
		
	    <meta property="og:title" content="RTO based products and services at an affordable cost in a professional way" />
	    
	    <meta property="og:url" content="https://www.gaadiwalaonline.com" />
	    <meta property="og:type" content="website" />
	    <meta property="og:description" content="Gaadiwalaonline.com is a service platform catering to all your RTO based services and products at an affordable cost in a professional way. Established in 2005, the company has over 500 clients at present. We have our head office in Mumbai with operations all over India. At present, we have over 50 automobile brands and 250+ automobile dealers registered with us." />
	    <meta property="og:image" content="https://www.gaadiwalaonline.com/images/poster.png" />
	    <meta property="twitter:title" content="RTO based products and services at an affordable cost in a professional way" />
	    <meta property="twitter:url" content="index.php" />
	    <meta property="twitter:type" content="website" />
	    <meta property="twitter:description" content="Gaadiwalaonline.com is a service platform catering to all your RTO based services and products at an affordable cost in a professional way. Established in 2005, the company has over 500 clients at present. We have our head office in Mumbai with operations all over India. At present, we have over 50 automobile brands and 250+ automobile dealers registered with us." />
	    <meta property="twitter:image" content="" />
	<link rel="canonical" href="https://www.gaadiwalaonline.com/">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.gaadiwalaonline.com/images/logo1.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.gaadiwalaonline.com/images/logo1.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://www.gaadiwalaonline.com/images/logo1.png">
<!--<link rel="manifest" href="https://d14shz2u67ig8m.cloudfront.net/images/favicon/site.webmanifest">
<link rel="mask-icon" href="https://d14shz2u67ig8m.cloudfront.net/images/favicon/safari-pinned-tab.svg" color="#5bbad5">-->
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

	<script type="application/ld+json">
 { "@context": "https://schema.org",
 "@type": "Organization",
 "name": "Gaadiwalaonline",
 "url": "https://www.gaadiwalaonline.com/",
 "logo": "https://www.gaadiwalaonline.com/images/logo1.png",
 "address": {
 "@type": "PostalAddress",
 "streetAddress": "Nabibux House, 3rd Floor,Above Citizen
Credit Co-Op Bank,
Vakola Bridge
Road, Santacruz (E),Mumbai
400 055",
 "addressLocality": "Mumbai",
 "addressRegion": "Maharashtra",
 "postalCode": "400 055",
 "addressCountry": "India"
 },
 "sameAs": [ 
 "https://www.facebook.com/Gaadiwalaonlinecom-100269678138857",
 "https://www.instagram.com/gaadiwalaonline_india/?igshid=1r3bvki9hp6c1"
 ]}
</script>

   
	    <link rel="stylesheet" href="support1/HTWF/scripts/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="support1/HTWF/style.css">
    <link rel="stylesheet" href="support1/HTWF/css/animations.css">
    <link rel="stylesheet" href="support1/HTWF/scripts/flexslider/flexslider.css">
    <link rel="stylesheet" href="support1/HTWF/scripts/magnific-popup.css">
    <!--<link rel="stylesheet" href="support1/css/skin83f1.css?up=8">-->
    <link rel="stylesheet" href="support1/HTWF/css/content-box.css">
    <link rel="stylesheet" href="support1/HTWF/css/image-box.css">
    <link rel="stylesheet" href="support1/HTWF/css/components.css">
    <link rel="stylesheet" href="support1/HTWF/scripts/php/contact-form.css">
    <link rel="stylesheet" href="support1/HTWF/scripts/social.stream.css">
    <link rel="stylesheet" href="support1/css/skin.css">

<!-- add cdn update -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script src="support1/HTWF/scripts/jquery.min.js" defer="defer"></script>
    <script defer="defer" src="support1/HTWF/scripts/script.js"></script>
</head>

<body>
     <style type="text/css">
     .sanitize{
      background: #ff0068;
    border-radius: 3px;
    color: #fff;
    font-size: 11px;
    line-height: 1;
    letter-spacing: 0.01em;
    padding: 4px 10px;
    position: absolute;
    right: 19px;
    top: 1px;
    text-transform: uppercase;
    }
            /*@import url(http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900);*/
            /*@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700);*/
            @font-face {
              font-family: "Roboto Condensed";
              font-style: normal;
              font-weight: 300;
              src: local("Roboto Condensed Light"), local("RobotoCondensed-Light"), url(https://fonts.gstatic.com/s/robotocondensed/v18/ieVi2ZhZI2eCN5jzbjEETS9weq8-33mZGCkYb8td.woff2) format("woff2");
              unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }
            /* cyrillic */
            @font-face {
              font-family: "Roboto Condensed";
              font-style: normal;
              font-weight: 300;
              src: local("Roboto Condensed Light"), local("RobotoCondensed-Light"), url(https://fonts.gstatic.com/s/robotocondensed/v18/ieVi2ZhZI2eCN5jzbjEETS9weq8-33mZGCAYb8td.woff2) format("woff2");
              unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }
            /* greek-ext */
            @font-face {
              font-family: "Roboto Condensed";
              font-style: normal;
              font-weight: 300;
              src: local("Roboto Condensed Light"), local("RobotoCondensed-Light"), url(https://fonts.gstatic.com/s/robotocondensed/v18/ieVi2ZhZI2eCN5jzbjEETS9weq8-33mZGCgYb8td.woff2) format("woff2");
              unicode-range: U+1F00-1FFF;
            }
            /* greek */
            @font-face {
              font-family: "Roboto Condensed";
              font-style: normal;
              font-weight: 300;
              src: local("Roboto Condensed Light"), local("RobotoCondensed-Light"), url(https://fonts.gstatic.com/s/robotocondensed/v18/ieVi2ZhZI2eCN5jzbjEETS9weq8-33mZGCcYb8td.woff2) format("woff2");
              unicode-range: U+0370-03FF;
            }
            /* vietnamese */
            @font-face {
              font-family: "Roboto Condensed";
              font-style: normal;
              font-weight: 300;
              src: local("Roboto Condensed Light"), local("RobotoCondensed-Light"), url(https://fonts.gstatic.com/s/robotocondensed/v18/ieVi2ZhZI2eCN5jzbjEETS9weq8-33mZGCsYb8td.woff2) format("woff2");
              unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }
            /* latin-ext */
            @font-face {
              font-family: "Roboto Condensed";
              font-style: normal;
              font-weight: 300;
              src: local("Roboto Condensed Light"), local("RobotoCondensed-Light"), url(https://fonts.gstatic.com/s/robotocondensed/v18/ieVi2ZhZI2eCN5jzbjEETS9weq8-33mZGCoYb8td.woff2) format("woff2");
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: "Roboto Condensed";
              font-style: normal;
              font-weight: 300;
              src: local("Roboto Condensed Light"), local("RobotoCondensed-Light"), url(https://fonts.gstatic.com/s/robotocondensed/v18/ieVi2ZhZI2eCN5jzbjEETS9weq8-33mZGCQYbw.woff2) format("woff2");
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }



            .roboto {
            font-family: "Roboto Condensed";
            }
            .roboto-c {
            font-family: "Roboto Condensed";
            }

          </style>

          <style type="text/css">
  /*// applyform*/
  #form1, #form2{
    display: none;
  }

  .applyform{
        width: 950px;
        position: absolute;
        z-index: 9998;
        top: 0;
        right: 0;
    }
    #apply_form{
        display: none;
    }
    #log4{
        background-color: rgba(14,26,53,1) !important;
        padding: 30px;
    }
    @media screen and (max-width: 600px) {
  .applyform {
    width: 400px;
    }
  }

@media screen and (max-width: 900px) and (min-width: 600px) {
  .applyform {
    width: 700px;
  }
}
 
 @media screen and (min-width: 920px) {
  #log4 {
    height: 500px;
    overflow-y: scroll;
  }
}
</style>


<style type="text/css">
    h3,h1,h2,h4 {
            font-family: "Roboto Condensed";
            font-weight: 100;
            }
    p, label, button, {
        font-family: "Roboto Condensed";
        font-weight: 300;
            }
    .log1{
        background-color: rgba(14,26,53,1) !important;
        padding: 30px;
    }
    #log2{
    <!-- font-family: "Lucida Sans Unicode"; -->
        font-family: "Roboto Condensed";
        font-weight: 200
    height: 78px;
    color: white;
    background-color: rgba(14,26,53,1) !important;
    border-color: white;
    text-align: left;
    margin-bottom: 0px;
    padding: 20px 50px;
    }

    #log3{
        color: white;
        margin-bottom: 13px;
        <!-- font-family: "Lucida Sans Unicode"; -->
        font-family: "Roboto Condensed";
        font-weight: 300
    }

    .loginform{
        width: 320px;
        position: absolute;
        z-index: 9998;
        top: 0;
        right: 0;
    }

    .form-control{
         background-color: #153753;
         border: 1px solid #1a4d78;
        height: 46px;
        width: 100%;
        padding: 1px 6px;
        border-radius: none;
       font-family: "efraBold";
        color: #818384;
    }

    .form-group{
        margin: 5px;
    }

    form input{
        background-color: #153753;
        color: #bad5df;
        font-family: "Roboto Condensed";
        font-weight: 300;

    }

    form label{
   /* font-family: "Lucida Sans Unicode";*/
   font-family: "Roboto Condensed";
   font-weight: 300;
    }

    form div{
        margin-bottom: 15px;
    }
    #login_form
    {
        display: none;
    }
    #signup_form{
        display: none;
    }
</style>
<script type="text/javascript">
  // apply online form
    $(function () {
        $("#apply").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
            // alert("Selected Text: " + selectedText + " Value: " + selectedValue);
            if(selectedValue == "Fitness"){
              document.getElementById("form1").style.display = "block";
              document.getElementById("form2").style.display = "none";
            }
            // else if(selectedValue == "Petmit"){
            //  document.getElementById("form2").style.display = "block";
            // }
            else{
              document.getElementById("form2").style.display = "block";
              document.getElementById("form1").style.display = "none";

            }
        });
    });
</script>
<script type="text/javascript">
        // apply online form
    function applyForm()
        {
             if ($("#apply_form").is(":hidden")){
                      $("#apply_form").slideDown("slow");
                      document.getElementById("anchor2").style.display="none";
            }
            else{
                $("#apply_form").slideUp("fast");
                document.getElementById("anchor2").style.display="block";
            }
        }

    // login form
    function openForm()
        {
             if ($("#login_form").is(":hidden")){
                      $("#login_form").slideDown("slow");
                      document.getElementById("anchor").style.display="none";
            }
            else{
                $("#login_form").slideUp("fast");
                document.getElementById("anchor").style.display="block";
            }
        }

        // signup form
    function signupForm()
        {
             if ($("#signup_form").is(":hidden")){
                      $("#signup_form").slideDown("slow");
                      document.getElementById("anchor1").style.display="none";
            }
            else{
                $("#signup_form").slideUp("fast");
                document.getElementById("anchor1").style.display="block";
            }
        }
</script>

	<!-- Menu -->
    <!--
<header class="fixed-top scroll-change" data-menu-anima="fade-bottom">-->
<header class="fixed-top scroll-change bg-transparent menu-transparent" data-menu-anima="fade-bottom">
<div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
      
      <div class="navbar navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.php">
                        <img id="logo1" style="height: 45px;" class="logo-default" src="www.gaadiwalaonline.com/images/logo1.png" alt="logo" />
                        <img id="logo" style="height: 90px; width: 115px; max-height: 90px; max-width: 115px" class="logo-retina" src="www.gaadiwalaonline.com/images/logo.png" alt="logo" />
                        </a>
                        <style type="text/css">
                           @media only screen and (max-width: 900px) {
                           #logo,#logo1 {
                           max-width: 50px !important;
                           max-height: 50px !important;
                           /*width: 50px !important;*/
                           }
                           }
                        </style>
                    </div>
                    <div class="collapse navbar-collapse">
                      
                      
                      
                      
                        <div class="nav navbar-nav navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="dropdown ">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Discover Gaadiwalaonline 
                                       <span class="caret"></span></a>
                                        <ul class="dropdown-menu multi-level">
                                        <li><a class=dropdown-item href="about.php">About Us </a></li>
                                        <li><a class=dropdown-item href="https://gaadiwalaonline.com/career.php" target="myFrame">Careers  </a></li>
                                        <li><a  class=dropdown-item href="legal.php">Legal and Admin Policies</a></li>
                                        </ul>
                                </li>
                                <li class="dropdown ">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu multi-level">
                                        <li><a class=dropdown-item href="moter.php">Motor Insurance</a></li>
                                        <li><a class=dropdown-item href="speedlimit.php">Speed Limit Device</a></li>
                                        <li><a class=dropdown-item href="fastage.php">Fastag</a></li>
                                        <li><a class=dropdown-item href="gpstracker.php">Gps tracker</a></li>
                                         <li><a class=dropdown-item href="reflective.php">Reflective tape</a></li>
                                         <li><a class=dropdown-item href="about-hsrp.php">HSRP </a></li>
                                        </ul>
                                </li>
                                <li class="dropdown ">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services                           <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-level">
                                    <li><a class=dropdown-item href="vehicle_reg.php">Vehicle Registration </a></li> 
                                    <li><a class=dropdown-item href="vehicle_fit.php">Vehicle Fitness </a></li>
                                    <li><a class=dropdown-item href="vehicle_permit.php">Vehicle Permit</a></li>
                                    <li><a class=dropdown-item href="road_tax.php">Road Tax</a></li>
                                    <li><a class=dropdown-item href="hypothecation.php">Hypothecation</a></li>
                                    <li><a class=dropdown-item href="certification.php">No Objection Certificate </a></li>
                                    </ul>
                            <li class="dropdown ">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Solution                           <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level">
                                    <li><a class=dropdown-item href="auto.php">Automobile Dealer </a></li> 
                                    <li><a class=dropdown-item href="fo.php">Fleet Owner </a></li>
                            </ul> <li>
                            <li class=nav-item><a href="contactus.php">Contact Us</a></li>
           <li class=nav-item>
            <a id="anchor" href="#" onClick="openForm()"><i class="fa fa-sign-in"></i> Login</a>
            <!-- login form -->
            <div id="login_form" class="loginform">
                <p id="log2"  style=" font-weight:300; font-family: Roboto Condensed;">
                    <i class="fa fa-sign-in" style="margin-right: 2%; color:#cb3333"></i> Login
                    <a href="#" onClick="openForm()" style="float: right; color: #cb3333;">
                            <i class="fa fa-times" style="color:#cb3333;"></i>
                    </a>
                </p>
            <form action="loginvalidate.php" method="post" class="log1" style="height:450px">
                <div class="form-group">
                  <label for="email" id="log3">User name</label>
                  <input type="email" class="form-control" id="uname" name="uname">
                </div>
                <div class="form-group">
                  <label for="pwd" id="log3">Password</label>
                  <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <div class="form-group form-check">
                  <label class="form-check-label" id="log3">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                  </label>
                </div>
                <div class="form-group">
                 <center><button type="submit" name="Submit" class="circle-btn btn btn-danger btn-sm" style="border-radius:25px; font-weight:200; font-size:18px; font-family: Roboto Condensed;"><i class="fa fa-lock" style="color:#cb3333;"></i> Login</button></center>
                </div>  <center> <p style=" color: #fff;  font-weight:300; font-family: Roboto Condensed;">Or connect with</p></center>
              <div>
                  <div class="col-sm-12">
                    <div style="width:100%; padding:5px; margin:5px; text-align:center; background-color:white; border-radius:5px">';
                          $gloginURL = "";
                          $authUrl = $googleClient->createAuthUrl();
                          $gloginURL = filter_var($authUrl, FILTER_SANITIZE_URL);
                      echo '<a  class="login100-social-item" href="'.htmlspecialchars($gloginURL).'">Google</a>
                      </div>
                  </div>
                  
                  <div class="col-sm-12">
                    <div style="width:100%; padding:5px; margin:5px; text-align:center; background-color:white; border-radius:5px">';
                  $fbloginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
                  echo '<a  class="login100-social-item" href="'.htmlspecialchars($fbloginURL).'">Facebook</a>
                    </div>
                  </div>
              </div>
              </form>
              </div>
              <!-- //login form -->
                    </li>

                      <ul class="nav navbar-nav">
                       <li class=nav-item>
                       <a href="index.php"><i class="fa fa-home"></i></a>
                       </ul>
                </div>
            </div>
        </div>
      </div>
</div>
</header>
';

?>