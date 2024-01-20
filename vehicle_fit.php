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
  <div class="section-bg-video home-bg-video">
            <div class="videobox">
               <video autoplay x-webkit-airplay="deny" playsinline loop muted poster="https://www.dvitex.ru/upload/iblock/313/registratsiya_ooo_v_mifns_46_v_moskve_v_2021_godu.jpg">
                    <source src= "24.mp4" type="video/mp4">
               </video>
            </div>
      <div class="overlay-content home-gradient-overlay">
               <div class="container content  box-middle white text-left">
                  <hr class="space" /> 
         
                  <div class="row">
                     <div class="col-md-8 col-left col-sm-12">
                        <hr class="space l" />
                        <h4 class="roboto-c" style="font-weight: 100">Vehicle Fitness </h4>
                       <p style="color: white !important">
A certificate of fitness for vehicles is a government issued document that officiates that the vehicle is fit to be driven on the roads in terms of the vehicle's overall health. As per the law, it is mandatory to have a fitness certificate for commercial vehicles as well as private vehicles.
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

 <div class="section-bg-image bg-top video-overlay counter-home-page" style="background-image:url(../images/bg-15.png)">
      <div class="container content">
        <div class="row margin-negative-130">
          <div class="col-md-10 col-center text-left">
         
  <hr class="space"/>     <hr class="space"/>   
           
            <h4>Vehicle fitness certificate</h4><br>
 In order to ensure that vehicles that ply on the roads in India are functioning under optimum conditions, the Ministry of Road Transport and Highways (MoRTH) has laid down rules that mandate vehicle owners to have certain certifications for their vehicle, related to its health and functioning. One such very important certificate is the Vehicle Fitness Certificate. As per the Motor Vehicles Act, 1989, the registration of a vehicle is considered valid only if the vehicle has a valid Vehicle Fitness Certificate to its name. A certificate of fitness for vehicles is a government issued document that officiates that the vehicle is fit to be driven on the roads in terms of the vehicle’s overall health. As per the law, it is mandatory to have a fitness certificate for commercial vehicles as well as private vehicles. Know all about two wheeler fitness certificate, four wheeler fitness certificate, procedure of renewal of fitness certificate and the fines if you fail to have a valid fitness certificate.      </div>
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

  <div class="section-bg-image bg-top" style="background-image:url(https://d14shz2u67ig8m.cloudfront.net/images/long-2.jpg)">
        

   
   
    </div> 
    <div class="main-container faqs_container">
      <div class="container challan-wrapper">
        <div class="clearfix mb30 f16">
                  <div class="col-md-12">
                     <h4 class="f24 fw6">How to Get a Vehicle Fitness Certificate?</h4>
                     <p>In order to get a vehicle fitness certificate for your vehicle, the government of India has made the process simple with the launch of its Parivahan Sewa online portal. You can apply for the same online by filling up the vehicle fitness certificate form, and then visiting your zonal Regional Transport Office (RTO) to provide the remaining documents. You can apply for a vehicle fitness certificate online by following the steps below:
      </p>
      <ul>
        <li><strong>Step 1:</strong> Log on to the Parivahan Sewa portal</li>
        <li><strong>Step 2:</strong> Enter your vehicle’s registration number</li>
        <li><strong>Step 3:</strong> Click ‘Proceed’ on the pop-up box</li>
        <li><strong>Step 4:</strong> Go to Online Services on the menu bar</li>
        <li><strong>Step 5:</strong> From the drop down menu, select ‘Application for Fitness Certificate’</li>
        <li><strong>Step 6:</strong> You will then be prompted to fill in your Chassis number and your registered mobile number, after which click on ‘Generate OTP’</li>
        <li><strong>Step 7:</strong> After entering the OTP received, fill out all the required vehicle information and insurance details, along with the fee information for the application</li>
        <li><strong>Step 8:</strong> Click on the ‘Payment’ button to make the required payment online</li>
      </ul>
      <p>
After your payment is successfully completed, you will receive a digital receipt along with the application letter. Post completion of the above mentioned steps, you need to visit the zonal RTO to obtain your online vehicle fitness certificate. At the RTO, you need to produce the fee receipt and the application letter at the fitness counter, along with the following documents:
      </p>
      <ul>
        <li>Original registration certificate of the vehicle</li>
        <li>Vehicle’s insurance certificate</li>
        <li>Pollution Under Control (PUC) certificate of the vehicle</li>
      </ul>
                  </div>
               </div>
            <div class="col-md-12 mb30 f16">
               <h4 class="f24 fw6">How to Check the Fitness Certificate of Your Vehicle Online?</h4>
               <p>The Ministry of Road Transport and Highways curated the Parivahan Sewa portal to digitise the entire ecosystem of transportation and information in the country. From checking your vehicle fitness certificate validity, to guiding you through how to download fitness certificate of vehicle online, to checking your car fitness certificate, or vehicle fitness certificate for CVs, the portal offers all the information with a few clicks. To check the fitness certificate of your vehicle online, you need to visit the Parivahan Sewa portal, enter your vehicle’s registration number, full chassis number and engine number, after which you can see all the vehicle details, including its fitness certificate.</p>
               <div class="col-md-12 pl0">
                 <h4 class="f24 fw6">List of Documents Required for Vehicle Fitness Certificate</h4>
                 <p>To apply for a RTO fitness certificate online, you need to have the following documents in place:</p>
                 <ul>
                    <li>Form 20</li>
                    <li>Form 21</li>
                    <li>Form 22</li>
                    <li>Receipt of road tax paid</li>
                    <li>Original registration certificate of the vehicle</li>
                    <li>Valid insurance certificate</li>
                    <li>Valid Pollution Under Control (PUC) certificate</li>
                    <li>Certificate of permit</li>
                    <li>A pencil imprint of the motor vehicle chassis</li>
                    <li>Valid address proof</li>
                    <li>Valid identification proof</li>
                    <li>Passport sized photographs</li>
                    <li>Temporary registration, if any</li>
                 </ul>
                  <p>
                  After submitting the above documents, your vehicle will receive a fitness certificate RTO provides. Your vehicle will be reviewed by a Motor Vehicle Examiner during its first registration.
                  </p>
                </div>
            </div>
            <div class="col-md-12 mb30 f16">
              <h4 class="f24 fw6">How to Renew Fitness Certificate of a Vehicle</h4>
              <p>As per the guidelines, different classes of vehicles have a different validity for their vehicle fitness certificate. So according to that, their eligibility to apply for a fitness certificate RTO also differs. For instance, private vehicles have a vehicle fitness certificate validity for up to 15 years, post which it is valid for every 5 years after renewal. In case of commercial vehicles, the validity of the vehicle fitness certificate is for 2 years, and is then renewed for a year’s time.</p>
              <p>The documents required for fitness certificate renewal are:</p>
              <ul>
                <li>Form 25</li>
                <li>Registration certificate of the vehicle</li>
                <li>Proof of road tax duly paid</li>
              </ul>
              <p>The procedure of renewal of fitness certificate is very simple. On taking your vehicle, and the documents mentioned above, to the concerned RTO, it will be subject to an inspection by the Motor Vehicles Department. After the inspection, the details will be submitted on the Vahan website. After reviewing the vehicle details, and the application fee, the RTO officer will issue a renewed vehicle fitness certificate to you.</p>
            </div>

            <div class="col-md-12 mb30 f16">
              <h4 class="f24 fw6">RTO Fines for Not Having a Valid Fitness Certificate</h4>
              <p>Just as not having a valid registration certificate, PUC certificate, or other vehicle documents can have you paying a hefty penalty, not having a valid fitness certificate can also have you looking at heavy fines. According to the Motor Vehicle Act, 1989, failure to produce a fitness certificate levies a fine of Rs. 100/- for the first offence. The amount increases to Rs. 300/- for the subsequent offences. The fine for not having a valid vehicle fitness certificate ranges between Rs. 2,000/- and Rs. 5,000/-.</p>
              <p>The documents required for fitness certificate renewal are:</p>
              <ul>
                <li>Form 25</li>
                <li>Registration certificate of the vehicle</li>
                <li>Proof of road tax duly paid</li>
              </ul>
              <p>The procedure of renewal of fitness certificate is very simple. On taking your vehicle, and the documents mentioned above, to the concerned RTO, it will be subject to an inspection by the Motor Vehicles Department. After the inspection, the details will be submitted on the Vahan website. After reviewing the vehicle details, and the application fee, the RTO officer will issue a renewed vehicle fitness certificate to you.</p>
            </div>

            <section>
        <div class="container">
        
        <div class="row mb80 xsmb40">
          <div class="col-md-12">
            <h4>FAQs</h4>
              <div id="section5">
                <div class="p0">
                  <div class="panel-group e-challan-faqs f16" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="accordionTitle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            What is the validity of my vehicle fitness certificate?<span class="accordionSign"></span></a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">As mentioned before, the validity of the vehicle fitness certificate depends on the class of vehicle. For new private vehicles, the validity of the vehicle fitness certificate is up to 15 years, and then for 5 years for subsequent renewals. In case of commercial vehicles, vehicle fitness certificate validity is at 2 years, post which it is renewed for 1 year subsequently.</div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="collapsed accordionTitle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Which RTO forms are required for a vehicle fitness certificate?<span class="accordionSign"></span></a>
                        </h4>
                      </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      <div class="panel-body">
                        Apart from the vehicle’s documents, in order to procure a vehicle fitness certificate, you need to submit the following forms:
                        <ul>
                          <li>Form 20</li>
                          <li>Form 21</li>
                          <li>Form 22</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="collapsed accordionTitle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">How can I get a fitness certificate for my car after 15 years?<span class="accordionSign"></span></a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                      <div class="panel-body">
                        In order to get a fitness certificate for car after 15 years, you need to apply for a fitness certificate renewal. After submitting the required documents, you will have a renewed online car fitness certification that will be valid for subsequent 5 years.
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="collapsed accordionTitle" data-toggle="collapse" data-parent="#accordion" href="#collapse4">How can I get a duplicate vehicle fitness certificate?<span class="accordionSign"></span></a>
                        </h4>
                      </div>
                    <div id="collapse4" class="panel-collapse collapse">
                      <div class="panel-body">
                        You can apply for a duplicate vehicle fitness certificate in case of loss, theft, or damage to the original certificate. To do so, you need to submit the following documents to the zonal RTO:
                        <ul>
                        <li>Application stating the date of issue/expiry of certificate of fitness</li>
                        <li>Road tax clearance report</li>
                        <li>Copy of the FIR</li>
                        <li>Challan clearance</li>
                        <li>Photocopy of original fitness certificate</li>
                        <li>Application fee of Rs. 120/-</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="collapsed accordionTitle" data-toggle="collapse" data-parent="#accordion" href="#collapse5">Can the RTO cancel my fitness certificate issued for my car/two wheeler?<span class="accordionSign"></span></a>
                        </h4>
                      </div>
                    <div id="collapse5" class="panel-collapse collapse">
                      <div class="panel-body">
                        Yes. In case the performance and health of your vehicle is not fit and in compliance with the RTO standards, the RTO can cancel the fitness certificate of your vehicle. 
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="collapsed accordionTitle" data-toggle="collapse" data-parent="#accordion" href="#collapse6">What price do I have to pay for my bike and car fitness certificate?
<span class="accordionSign"></span></a>
                        </h4>
                      </div>
                    <div id="collapse6" class="panel-collapse collapse">
                      <div class="panel-body">
                        To get a fresh vehicle fitness certificate for your car and/or bike, you will have to pay a fee ranging from Rs. 100/- to Rs. 300/- only. 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="floating-wpp "></div> -->
          </div>
    </div>
        </div>
      </section>
         </div>
      </div>
   </div>
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

<?php
include_once('footer1.php');
// include_once('modelview.php');
?>