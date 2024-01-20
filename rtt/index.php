<?php
    include_once('header1.php');
    include_once("conn.php");
   if(isset($_POST["Submit"]))
   {
      $uname=$_POST["uname"];
      $mob=$_POST["mob"];
      $email=$_POST["email"];
      $pwd=$_POST["pwd"];

      $sql="SELECT * FROM user WHERE email='$email' or mobile_no='$mob'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
      {
         echo '<script>alert("Account already exist with same mobile number or email!");</script>';
      }
      else
      {
         $sql="INSERT INTO user (firstname, email, mobile_no, password) VALUES ('$uname','$email','$mob','$pwd')";
         if(mysqli_query($conn,$sql))
         {
            echo '<script>alert("REGISTRATION SUCCESSFULL. LOGIN TO CONTINUE!");</script>';
         }
         else
         {
            echo '<script>alert("SOMETHING WENT WRONG. PLEASE CONTACT ADMINISTRATOR!");</script>';
         }

      }
   }
?>

</script> <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" /><script data-minify="1" type='text/javascript' src="5.js"></script>
</script> <script data-minify="1" type='text/javascript' src="1.js"></script>
<script data-minify="1" type='text/javascript' src="2.js"></script>
<script data-minify="1" type='text/javascript' src="3.js"></script>   <div class="section-bg-video home-bg-video">
            <div class="videobox">
               <video autoplay x-webkit-airplay="deny" playsinline loop muted poster="https://www.gaadiwalaonline.com/images/poster1.png">
                    <source src= "main24.mp4" type="video/mp4">
               </video>
            </div>
      <div class="overlay-content home-gradient-overlay">
               <div class="container content  box-middle white text-center">
                  <hr class="space" /> 
         
                  <div class="row">
                     <div class="col-md-8 col-center col-sm-12">
                        <hr class="space l" />
                        <h2 class="roboto-c" style="font-weight: 100"><strong>EXPEDITED RTO SERVICES</strong>  </h2>
                        <p class="white roboto-c" style="color:#FFF !important; font-weight: 100">
                     		<h4>Services available in 100+ locations and  300+  RTO <br /> <span id="changingword">RJ14 Jaipur South</span></h4>
                        </p>
                        <!-- new line -->
                        <div id="container">
                           <div id="text"></div><div id="cursor"></div>
                        </div>
                        <hr class="space l" />
                        <p class="text-s width-80">
                        </p>
                     </div>
                  </div>
                  <hr class="space" />  </div>
                  <hr class="space" />    
        
               </div>
            </div>
         </div>
         <div class="section-bg-image video-overlay text-center counter-home-page"  style="background-image:url(support1/images/bg-15.png)"  >
            <div class="container content">
               <div class="row margin-negative-130">
                  <div class="col-md-3">
                     <div class="icon-box counter-box-icon shadow-1" >
                        <div class="icon-box-cell">
                           <i class="fa fa-car text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                           <label class="counter text-l" data-speed="50" data-to="100" data-trigger="scroll" data-separator=",">100 +</label>
                           <p>Automobile Brands</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="icon-box counter-box-icon shadow-1">
                        <div class="icon-box-cell">
                           <i class="fa fa-car text-xl" style="font-size:35px !important;"></i>
                        </div>
                        <div class="icon-box-cell">
                           <label class="counter text-l" data-speed="50" data-to="500" data-trigger="scroll" data-separator=",">500 +</label>
                           <p>Automobile Dealers</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="icon-box counter-box-icon shadow-1" >
                        <div class="icon-box-cell">
                           <i class="fa fa-smile-o text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                           <label class="counter text-l" data-speed="50" data-to="5000" data-trigger="scroll" data-separator=",">5000 +</label>
                           <p>Happy Customers</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="icon-box counter-box-icon shadow-1" >
                        <div class="icon-box-cell">
                           <i class="fa fa-location-arrow text-xl"></i>
                        </div>
                        <div class="icon-box-cell">
                           <label class="counter text-l" data-speed="50" data-to="5" data-trigger="scroll" data-separator=",">5 +</label>
                           <p>Years of Experience</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="section-bg-image bg-top home-highlight-container lazy" data-bg-image="url(https://d14shz2u67ig8m.cloudfront.net/images/long-2.jpg)" >       
         <div class="container content box-middle">
                <div class="title-modern title-modern-2 st-icon text-center">
                  <h2>We cater  RTO based  products and services</h2>
               </div>  <div class="row vertical-row">
                   
                    <div class="col-md-7 app-btn-download">
                        <h4> </h4>
                        <p>India's first online platform catering to all  RTO based products and services at an affordable cost in a professional way. Our experts combined the elements of technology and experience together to make the work easy, swift And care-free. We work directly with the concerned authority, so you can get your RTO documents fast without the hassle of doing it Yourself.</p>
                        <hr class="space m" />
                      
                        
                    </div> <div class="col-md-5">
                        <img class="lazy" data-src="https://irvinevirtualoffice.com/themes/ivo/resources/images/home-about-img.png" alt="Gaadiwalaonline" />
                    </div>
                </div>
            </div>
 
    
     <div class="container ">    <div class="title-modern title-modern-2 st-icon text-center gps-integrated-device-modern">
        <h2>Sector-Specific Solutions</h2>
        	<hr>
			  Designed upon thousands of user experience, with an understanding beyond regular vehicle RTO services.
  
      
      </div>
    <div class="row vertical-row even">
                <div class="col-md-6"><br>
              <h3 class="light">Fleet Owner
</h3>
             <br> 
       We have introduced vehicle documents renewal online.

Vehicle owners can opt for online/door step services for vehicle documents renewal<br> <strong>Benefits</strong>
                    <p>Online dashboard for easy access of all the documents at one place.
 <br>
                  Central login system to access branch-wise documents and vehicle document status.
 
                    <br>Account manager for each fleet owner for one-to-one assistance.<br>
<strong>Services</strong>

<br>Vehicle Registration<br>Renewals of  
Fitness and Permit<br>
Hypothecation Endorse/Terminate<br>
Transfer of ownership<br>
NOC No objection certificate<br>
     
 


                   
.

</p>
<a class="popup-youtube" href="https://www.youtube.com/watch?v=CGL5Q-lfZIo"><img src="https://www.logo.wine/a/logo/YouTube/YouTube-Logo.wine.svg" width="130" height="50"></a>
 </p>
                        

                </div>
                <div class="col-md-6"><br>
                    <img class="lazy" data-src="https://media.istockphoto.com/vectors/vehicles-on-road-with-traffic-jam-vector-id843313792?k=6&m=843313792&s=170667a&w=0&h=zDmVADu53iWyQSW4nEEck2ZuLYKENcDUVQTHWlpVzVs=" alt="image" data-anima="fade-right" data-time="1000" />
                </div>
            </div>
               
            
       <hr class="space" />
            <div class="row vertical-row">
                <div class="col-md-6">
                    <img class="lazy" data-src="https://i1.wp.com/gadgetsgaadi.com/wp-content/uploads/2021/06/quotes-for-automobile-gadgetsgaadi.jpg?resize=768%2C499&ssl=1" alt="image" data-anima="fade-left" data-time="1000" />
                </div>
                <div class="col-md-6">
                    <h3 class="light">Automobile Dealers
</h3>
                                  <p></p>We have introduced vehicle registration on call services for automobile dealers. <br>
                    It can be applied for registration certificate for the newly sold vehicles with just a call/filling an online form. 
                    <br>An online platform, to track the whole procedure with just one click. <br>
                    The vehicle document management dashboard is provided free of cost. <br>
                    No need to run after middlemen, to get the work done on time, or employ extra workforce just for RTO work. 
                    <br>  <strong>Services </strong>
                               
                             <br>
Vehicle registration<br>
Trade licenses and  renewals<br>


</p>    
<a href="https://gaadiwalaonline.com/auto.php" ><img src="https://th.bing.com/th/id/OIP.__bjAD_B84SfWA_A6xLflgHaDF?pid=ImgDet&rs=1" width="130" height="50"></a>
              
              </div>

    
                </div>
            </div>
             <div class="container content">
  
    <div class="col-md-6">
         <h3 class="light"> Pre-owned vehicle companies<br>
</h3><br>
                 
              
             

 We have introduced vehicle transfer on call services for Pre-owned  vehicle and asset company <br>Pre owned company can apply for transfer vehicles with just a call/filling an online form.
  <br>  <strong>Services </strong>
                               
                              <br> Duplicate Registration Certificate<br>
Fresh  Registration Certificate<br>
Hypothecation Endorse/Terminate <br>
RC transfer with complete documents<br>
RC transfer without complete documents<br>

RC transfer to financer<br>
<a href="https://gaadiwalaonline.com/preown.php" ><img src="https://th.bing.com/th/id/OIP.__bjAD_B84SfWA_A6xLflgHaDF?pid=ImgDet&rs=1" width="130" height="50"></a>

                </div>
                <div class="col-md-6"><br><br>
                    <img class="lazy" data-src="https://media.istockphoto.com/vectors/car-auction-and-bidding-vector-concept-for-web-banner-website-page-vector-id1194209502?k=6&m=1194209502&s=170667a&w=0&h=tgq-0AdZlwoZDbdeC3g-kUZCW63W0IW4udwss5VYrp4=" alt="image" data-anima="fade-right" data-time="1000" />
                </div>
            </div>
               
            
    
          
            </div>
            </div>
  

          <div class="container content">
  
    <div class="col-md-6">
                    <img class="lazy" data-src="https://www.tomorrowmakers.com/sites/default/files/2021-12/5%20Ways%20to%20pay%20off%20your%20car%20loan%20early-min.jpg" alt="image" data-anima="fade-left" data-time="1000" />
                </div>
                <div class="col-md-6">
                    <h4 class="light">Banking and Financial Markets
</h4>
                                  <p>We provides complete support for paper work and certification in affordable cost in professional way
                                  
                               <br>   Outsource your RTO process operations to Gaadiwalaonline.com to benefit from the immediate value, Pan India capability, and scale.
                               
                               <br>  <strong>Services </strong>
                               
                              <br> Duplicate Registration Certificate<br>
Fresh  Registration Certificate<br>
Hypothecation Endorse/Terminate <br>
RC transfer with complete documents<br>
RC transfer without complete documents<br>

RC transfer to financer<br>

</p>    
<a href="https://gaadiwalaonline.com/nbfc.php" ><img src="https://th.bing.com/th/id/OIP.__bjAD_B84SfWA_A6xLflgHaDF?pid=ImgDet&rs=1" width="130" height="50"></a>
              
              </div>

    
                </div>
            </div>
            <div class="container content">
               <div class="title-modern title-modern-2 st-icon text-center">
                  <h1>Dashboard</h1> <br>Our experts combined the elements of technology and experience together to make your work easy, swift And care-free. 
                     
               </div>
               <div class="row vertical-row even">
                  <div class="col-md-6">
                   
                     <h3 class="light">Fleet Dashboard</h3>
                     
                    
                      <br>   Free web and android based application to helping fleet owners to keep their vehicle documents online and get online access to see and download vehicle document on your computer or smartphone anywhere and anytime. even get statutory due date alerts. like Fitness, Permit, Road tax, Pollution, and Insurance.
                     </p>
                     
                  </div>
                  <div class="col-md-6"><br><br>
                     <img class="lazy" data-src="https://www.todayposting.com/wp-content/uploads/2021/06/best-selling-app.png" alt="image" data-anima="fade-right" data-time="1000" />
                  </div>
               </div>
               <hr class="space" />
               <div class="row vertical-row">
                  <div class="col-md-6">
                     <img class="lazy" data-src="https://mlj3zym49x2o.i.optimole.com/wl28rms-AdbG3R7C/w:596/h:385/q:90/https://www.wowapps.com/wp-content/uploads/2020/05/design-work.png" alt="image" data-anima="fade-left" data-time="1000" />
                  </div>
                  <div class="col-md-6">
                     <h4 class="light">Real-time status RTO applied files</h4>
                     <p>It's easy to navigate and much user-friendly. It's available in web and android in a single click, you can go through your entire RTO applied files status.
                     </p>
                     <br>
                     <div class="feature-icon-list icon-list model-list-partner" >
                        <div class="list-item">
                          <label><strong>Received files:</strong> It indicates how many files you have given to the service provider for applying for vehicle fitness or other services.
                           </label>
                        </div>
                        <div class="list-item">
                           <label><strong>Process:</strong> it indicates the real-time status of the process, such as document received date & time, govt fees, RTO passing,Certification and Document Delivery.
                           </label>
                        </div>
                        <div class="list-item">
             <label><strong>Pending:</strong> It indicates the pending status of the documents.
                           </label>
                        </div>
                        <div class="list-item">
                        <label><strong>Delivered:</strong> It indicates the entire performance of the service provider.</label>
                        </div>
 
                     </div>
                  </div>
               </div>
         
          
  
<div class="container ">    <div class="title-modern title-modern-2 st-icon text-center gps-integrated-device-modern"> <br>
        <h3>Get Your RTO Dcouments in<strong> 3 Easy Steps</strong> </h3>
        <hr><br>
        
      <br>
      </div><ul class="row _1z3BN"><li id="step-one" class="col-md-4 _37amu">
        <span class="_2JrwN"></span><img src="images/business-team-discussing-ideas-startup_74855-4380.jpg" atl="Sell Car Step" class="img-fluid"/><strong><br><br>
Apply Online</strong><p>Apply Online Through Our Mobile/Web Application. Upload Documents Or Take Help Of The Account Manager .</p></li>
<li id="step-two" class="col-md-4 _37amu"><span></span>
<img src="https://cdn.searchenginejournal.com/wp-content/uploads/2019/01/5-Things-I-Wish-I-Knew-Before-Hiring-an-SEO-Vendor-1520x800.png" atl="Sell Car Step" style="margin-top: 15px" class="img-fluid"/><br><br><strong>Application Processing</strong>
<p>Our team reviews and submits your documents while your Account Manager keeps you informed throughout the entire process.</p></li>
<li id="step-three" class="col-md-4 _37amu"><span></span>
<img src="https://www.vippng.com/png/full/188-1887070_heres-when-you-should-consider-hiring-a-virtual.png" atl="Sell Car Step" style="width: 90%" class="img-fluid"/>
<strong>
Document Delivery</strong><p>Document Delivered To Cusomer’s Doorstep Via Registered Courier Service. Softcopy Sent Via Email And Available on Gaadiwalaonline.com Account.</p></li></ul></div></div>
  
<hr class="space " />
   
<div class="container ">    <div class="title-modern title-modern-2 st-icon text-center gps-integrated-device-modern">
        <h2>We're already making a difference</h2>
        	<hr>
			   <h4>Some of the largest organisations around India are already seeing a difference
from switching to the Gaadiwalaonline Platform.
</h4> 
        
      <br>
      </div> <div class="section-bg-image bg-top">
        <div class="container gps-tracker-logo-container">
            <!--<hr class="space" />-->
            <div class="flexslider carousel png-over" data-options="numItems:5,controlNav:false,directionNav:false">
                <ul class="slides">  <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="https://content.timesjobs.com/img/62755632/Master.jpg" alt="" style="width: 40% !important; margin-top:10px; opacity: 0.2 !important">
                        </a>
                    </li>
                     <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="https://scontent.fpat2-3.fna.fbcdn.net/v/t1.6435-9/118859288_3187317904722971_6235506505357771497_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=Euqp-Ft5oL4AX-gvXyE&_nc_ht=scontent.fpat2-3.fna&oh=00_AT8O9Lg7VrdLD7j7L134QEjatk35cRNB9b6P7-b5jt-NKw&oe=6358ED06" alt="" style="width: 40% !important; margin-top:10px; opacity: 0.2 !important">
                        </a>
                    </li>
                    <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQiILFCXJFkrI5rHEZhL7-PxlaQWnwUSRVEtw&usqp=CAU" alt="" style="width: 40% !important; margin-top:10px; opacity: 0.2 !important">
                        </a>
                    </li>                     <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="images/uber.png" alt="" style="width: 40% !important; margin-top:10px; opacity: 0.2 !important">
                        </a>
                    </li>   
                  
                    <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="https://play-lh.googleusercontent.com/41ZC6Vs2wxvNErlhFuhCg__qMI-alqFBrriZpa5B0eHmeTTMhNQttCth3MIJkh12Gw=s180-rw" alt="" style="width: 40% !important; opacity: 0.3 !important">
                        </a>
                    </li>
                    <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQdyXaUaZZOPSXU233cPggmS80p5FDsEVaQfw&usqp=CAU" alt="" style="width: 50% !important; opacity: 0.3 !important">
                        </a>
                    </li>
                    <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="https://scontent-del1-1.xx.fbcdn.net/v/t31.0-8/13116209_586961881469511_3575029689030585495_o.png?_nc_cat=110&_nc_sid=09cbfe&_nc_ohc=_PObrliDiPMAX97I89D&_nc_oc=AQmN1xpf8VbtDUdQvC3sB7pS5qEFl546s31jTMSVCQrGJv2P_g9M8UmUzCJ6EJu_YEA&_nc_ht=scontent-del1-1.xx&oh=0ac4ba311939c1baa96ab3bc3c08005d&oe=5F82D153" alt="" style="width: 40% !important; opacity: 0.3 !important">
                        </a>
                    </li>
                 
                    <li>
                        <a class="img-box" rel="noopener noreferrer">
                            <img src="https://assets.thehansindia.com/hansindia-bucket/safe_3101.jpg" alt="" style="width: 40% !important; margin-top: 20px; opacity: 0.3 !important">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div></div></div>

<br><br>

<div class="container ">
    <div class="title-modern title-modern-2 st-icon text-center gps-integrated-device-modern">
        <h2>  Official Partner </h2>
        <hr><br>
      </div>
      <div class="row">
         <div class="col-md-6" id="partner">
           <img src="https://www.logo.wine/a/logo/Axis_Bank/Axis_Bank-Logo.wine.svg" atl="Sell Car Step" style=" width: 50%; float: right; margin-top: 15px" id="official" class="img-fluid"/>
        </div>
         <div class="col-md-6" id="partner">
            <img src="https://www.logo.wine/a/logo/Paytm/Paytm-Bank-Logo.wine.svg" atl="Sell Car Step" style="width: 50%;" class="img-fluid"/><br/><br/>
        </div>
    </div>
 </div>


                   <hr class="space " />      
                     <div class="site-section site-section-sm pb-0" style="margin-bottom: 2%">
 

</div>
	<div class="et_pb_code_inner"><script data-minify="1" type='text/javascript' src="4.js"></script></div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
$(function() {
    $('.popup-youtube, .popup-vimeo').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});
</script>
 


<?php
include_once('footer.php');

?>