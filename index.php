<!-- Updated by jayanti -->
<?php 
//session_start();

include_once("conn.php");
?>



<!DOCTYPE html>
<html lang="en">
	
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Login </title>
		<link rel="icon" type="image/png" href="https://vahanfin.com/vahanicon.png"/>
		<meta name="description" content="Login to the vahanfin">

		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="loginvahan/css/bootstrap.css">
		<link rel="stylesheet" href="loginvahan/style.css">
		<!-- Global site tag (gtag.js) - Google Analytics -->
    	<!-- logRocket starts -->


  <!-- logrocket is enabled ENABLE_LOGROCKET=True-->
  <script src="../../../cdn.logrocket.io/LogRocket.min.js" crossorigin="anonymous"></script>
  
    <script>
      window.LogRocket && window.LogRocket.init('efo3aj/consoleplivocom');
    </script>
  

		
  <script src='../../../www.google.com/recaptcha/api.js' async defer></script>
  <script type="text/javascript">
    function invisibleCaptchaCallback (token) {
        IS_CAPTCHA_SUCCESS = true;
        $('#form-login-error').addClass('d-none');
        $('#form-login-error .error-message').html('');
        $('#login').submit();
      }
  </script>

		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXJNN5');</script>
<!-- End Google Tag Manager -->
		<style>
				@import url("../../../use.typekit.net/ljk3gsz.css");
    </style>
	</head>
	<body class="public-base">
	    
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXJNN5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<div id="wrapper" class="wrapper-v2">
			<div class="wrapper-v2-auth">
				<div class="wrapper-v2-auth-wrap">
					
<div class="container-fluid responsive-auth-page" style="overflow:auto;background:#F7FAFE;">
    <div class="row container-public-v2 responsive-container">
        <div class="d-flex flex-column justify-content-center align-items-end col-sm-12 col-md-6 right-auth-pane-v2">
           
            <div class="wrapper-v2-auth-right">
            
<link href="../../../cdnjs.cloudflare.com/ajax/libs/spinkit/1.2.5/spinkit.css" rel="stylesheet" type="text/css"></link>

<div class="login-form-section panel">
  <div class="wrapper-v2-auth-title">
   
 <div class="wrapper-v2-auth-title">
    Log in to your account
  </div>
  
  </div>
<form class="login100-form validate-form" action="loginvalidate.php" method="post">
			
				<!-- new add -->
                <div class="form-group"> <label for="id_username">User Name</label>
                  <input type="email" class="form-control" name="uname" id="username" placeholder="Username " required="required" >
                </div>
                <div class="form-group">
                <label for="id_username">Password</label>
                  <input type="password" class="form-control" name="pwd" id="password" placeholder="Password" required="required" >
                </div>
                <div class="form-group" style="margin-top:50px">
      
   <center>   <button type="submit" name="Submit" id="login" class="btn btn-secondary btn-lg">Log In</button></center>
      
    </div>
    
  </form>
</div>

            </div>
           
            <div class="d-flex w-100" aria-hidden role="presentation" style="height:72px;"></div>
            <div class="d-flex justify-content-center mt-1 pt-1 legal-links-container position-absolute" style="bottom:0px;">
            <nav class="nav footer-links" style="font-size:12px;padding:16px 8px;">
                  <span style="color:#B4BDCA;" class="nav-link copyright">By continuing past this page, you agree to our</span>

                  <span class="nav-dot"></span>
                  <a class="nav-link" style="color:#B4BDCA;" href="https://www.vahanfin.com/legal/privacy/terms.php" target="_blank" rel="noopener noreferrer">Terms of Service</a>
                  <span class="nav-dot"></span>
                  <a class="nav-link" style="color:#B4BDCA;" href="https://www.vahanfin.com/legal/privacy/privacy.php" target="_blank" rel="noopener noreferrer">Privacy Policy</a> 
                  

                  
                </nav>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 left-auth-pane-v2">
            <div class="wrapper-v2-auth-left" style="margin: 0 auto;">
                <div class="wrapper-v2-auth-left-wrap-v2 clearfix">
                    <div class="promotion-section">
                        <img class="promotion-img mt5 mb2" alt="phlo" src="https://cdn.console.plivo.com/9/images/premium-support-plans.svg" />
                        <div>
                           
                        </div>

                        <div class="promotion-description p1 mv2">
                        Our experts combined the elements of technology and experience together to make RTO work easy, swift And care-free.<br>
We work directly with the concerned authorities to provide expedited RTO services.
                        </div>

                        <a class="btn btn-primary btn-lg" href="https://vahanfin.com/demo.php" target="_blank" rel="noopener noreferrer">Schedule Live Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

				</div>
			</div>
		</div>

		<script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
		<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="../../../maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script src="loginvahan/js/bootstrap-datepicker.min.js"></script>
		<script src="loginvahan/js/jquery.main.js"></script>
		<link href="loginvahan/css/chosen.css" rel="stylesheet" type="text/css">
		<script src="loginvahan/js/chosen.jquery.js"></script>
		<script src="loginvahan/js/ajax.chosen.jquery.js"></script>
		<script src="loginvahan/js/basic.js"></script>
		<script src="loginvahan/js/toast.js"></script>
<!--		<script>-->
<!--			$(document).ready(function(){-->
<!--			 var sessionCookie = getCookieAsObject("plivo_session");-->
<!--			 if (!sessionCookie) {-->
<!--				 setSessionCookie("plivo_session", null, 30);-->
<!--			 }-->
<!--				sessionCookie = getCookieAsObject('plivo_session');-->
<!--				if (sessionCookie){-->
<!--					var _session_id = sessionCookie.p_s_id;-->
<!--				} else {-->
<!--					var _session_id = 'unknown';-->
<!--				}-->
<!--				var _sift = window._sift = window._sift || [];-->
<!--				_sift.push(['_setAccount', '']);-->
<!--				_sift.push(['_setUserId', '']);-->
<!--				_sift.push(['_setSessionId', _session_id]);-->
<!--				_sift.push(['_trackPageview']);-->
<!--				(function() {-->
<!--				   function ls() {-->
<!--					 var e = document.createElement('script');-->
<!--					 e.src = 'https://cdn.siftscience.com/s.js';-->
<!--					 document.body.appendChild(e);-->
<!--				   }-->
<!--				   if (window.attachEvent) {-->
<!--					 window.attachEvent('onload', ls);-->
<!--				   } else {-->
<!--					 window.addEventListener('load', ls, false);-->
<!--				   }-->
<!--				 })();-->
<!--				-->
<!--					function fetch_sift_score(){-->
<!--					$.ajax({-->
<!--					  url: "/analytics/siftfetch/",-->
<!--					  type: "get",-->
<!--					  success: function(response) {-->
<!--						  try{-->
<!--							var sift_payment_abuse_score = response['score']-->
<!--						  }-->
<!--						  catch(e){-->
<!--							  console.log(e)-->
<!--						  }-->

<!--					  },-->
<!--					  error: function(xhr) {-->

<!--					  }-->
<!--					});-->
<!--					}-->
<!--					setTimeout(fetch_sift_score, 100);-->
<!--				-->
<!--		  });-->
<!--		</script>-->
			
		
		<script src="https://js.stripe.com/v3/"></script>
		
		
  <script>
    var IS_CAPTCHA_SUCCESS = false;
    $(document).ready(function(){
      var Cookie = {
          create: function (name, value, days) {
            var expires = "";
            if (days) {
              var date = new Date();
              date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
              expires = "; expires=" + date.toGMTString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
          },
          read: function (name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(";");
            for (var i = 0; i < ca.length; i++) {
              var c = ca[i];
              while (c.charAt(0) == " ") c = c.substring(1, c.length);
              if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
          },
          erase: function (name) {
              Cookie.create(name, "", -1);
          }
        };

      $("#login").on("submit", function(e) {
        $('.login-info-alerts').addClass('d-none');
        Cookie.create('v2_enabled', '1', 10000);
        var form = this;
        if (IS_CAPTCHA_SUCCESS) {
          // disable submit button
          $("#login-submit").attr("disabled", "disabled");
          // change submit button text
          $("#login-submit .text").text('');
          // show loading button animation
          $(".button-load-spinner").show();
          return true;
        } else {
          $('#form-login-error .error-message').html('Please verify that you are a human being.');
          $('#form-login-error').removeClass('d-none');
          return false;
        }
      });

      $('#sso-submit').click(function(){
        var url = "https://console.plivo.com/sso/auth/"
        window.location.replace(url);
      });

    });
    function captchaExpired() {
      IS_CAPTCHA_SUCCESS = false;
      $('#form-login-error .error-message').html('Please verify that you are a human being.');
      $('#form-login-error').removeClass('d-none');
    }
  </script>

		
<script src="js/fp.min.js"></script>
<script>
    const getBrowserFingerprint = async () => {
        const fp = await FingerprintJS.load({token: "Puha4YIps5UL0JwXbbPo", endpoint: "https://fp.plivo.com" })
        const result = await fp.get()
        const fingerprint_string = result.visitorId
        setCookie('ubfp', fingerprint_string, 1, 'strict');
        };
    async function set_fingerprint_cookie(){
        try{
            await getBrowserFingerprint()
        } catch (e) {
            console.log('Fingerprint error', e)
        }
    }

    async function initFingerprintJS() {
         const fp = await FingerprintJS.load({token: "Puha4YIps5UL0JwXbbPo", endpoint: "https://fp.plivo.com" })
         const result = await fp.get({"linkedId": "","tag": { "Auth_Id": "", "PageName": $(document).attr('title'),"Email": "" }})
         const fingerprint_string = Fingerprint2.x64hash128(result.visitorId, 31);

         setCookie('ubfp', fingerprint_string, 1, 'strict');

         $.ajax({
            url: "/check-login-anomalies/",
            method: "POST",
            data: {'visitorId':result.visitorId},
            success: function (data) {
                console.log("Login Anomaly: Success");
            },
            error: function(xhr) {
                console.log("Login Anomaly: Failure");
            }
         });
    }

</script>


    <script async src="../../../cdn.jsdelivr.net/npm/%40fingerprintjs/fingerprintjs-pro%403/dist/fp.min.js" onload="set_fingerprint_cookie()"></script>



	</body>



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
