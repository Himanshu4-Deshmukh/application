<?php include('includes1/header.php'); ?>
<?php include('includes1/sidebar.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php 

if(isset($_SESSION["status"]))
{
  $status = $_SESSION['status'];
}

      $id = $_SESSION['uid'];
      $customer = $_SESSION['customer'];
      // echo $customer ;
      // echo $id ;
      $expFitness = getExpCountVehicle($customer,'fitness_expiry_date'); 
      $activeFitness = getActiveCountVehicle($customer,'fitness_expiry_date');
      $expiredFitness = getExpiredCountVehicle($customer,'fitness_expiry_date');
      // echo "<pre></section>";print_r($expFitness);die();
      $expPermit = getExpCountVehicle($customer,'permit_expiry_date');
       $activePermit = getActiveCountVehicle($customer,'permit_expiry_date');
      $expiredPermit = getExpiredCountVehicle($customer,'permit_expiry_date');

      $expInsurence = getExpCountVehicle($customer,'insurence_expiry_date');
       $activeInsurence = getActiveCountVehicle($customer,'insurence_expiry_date');
      $expiredInsurence = getExpiredCountVehicle($customer,'insurence_expiry_date');

      $expSld = getExpCountVehicle($customer,'sld_expiry_date');
        $activeSld = getActiveCountVehicle($customer,'sld_expiry_date');
      $expiredSld = getExpiredCountVehicle($customer,'sld_expiry_date');


      $expRt = getExpCountVehicle($customer,'rt_expiry_date');
        $activeRt = getActiveCountVehicle($customer,'rt_expiry_date');
      $expiredRt = getExpiredCountVehicle($customer,'rt_expiry_date');


      $expTt = getExpCountVehicle($customer,'tt_expiry_date');
        $activeTt = getActiveCountVehicle($customer,'tt_expiry_date');
      $expiredTt = getExpiredCountVehicle($customer,'tt_expiry_date');

      $expPollution = getExpCountVehicle($customer,'pollution_expiry_date');
        $activePollution = getActiveCountVehicle($customer,'pollution_expiry_date');
      $expiredPollution = getExpiredCountVehicle($customer,'pollution_expiry_date');
    //   print_R($activePollution);die();

?>


<style type="text/css">
	@-webkit-keyframes blinker {
  from {opacity: 1.0;}
  to {opacity: 0.0;}
}
.blink{
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 0.6s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction: alternate;
}

.blink-danger{
    background : rgb(221, 75, 57) !important;
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 0.6s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction: alternate;
}

.danger-box
{
  position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    /*background: rgb(221, 75, 57) !important;*/
    text-decoration: none;  
}

@media only screen and (max-width: 600px) {
  #t1 {
    display: none;
  }
}
</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="t1" style="font-size: 15px !important;">
        FLEET DASHBOARD
     <!--    <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <a href="userDetails.php" class="small-box-footer" style="padding: ">FITNESS CERTIFICATE </i></a>
              <div class="inner">
                <h3 class="counter" data-counter="counterup" data-value="<?php echo $activeFitness['count']." "; ?>" style="line-height:15px; font-weight:300; font-size: 30px"><?php echo $activeFitness['count']." "; ?></h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=fitness_expiry_date" style="color:white; ">TOTAL VEHICLES</a></p>
                
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expFitness['count'] > 0 ) { echo 'blink';} ?>"> <a href="viewExpSecDetails.php?sec=fitness_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expFitness['count']." "; ?></b>&nbsp;&nbsp; EXPIRING</a></p>

                <p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expiredFitness['count'] > 0 ) { echo 'blink-danger';} ?>"> <a href="viewExpiredSecDetails.php?sec=fitness_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expiredFitness['count'].""; ?></b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-car" style="font-size:60px;"></i>
                </div>
              <!-- <a href="viewExpSecDetails.php?sec=fitness_expiry_date" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <a href="userDetails.php" class="small-box-footer">PERMIT CERTIFICATE </i></a>
              <div class="inner">
                  
                <!--<h3 style="font-size:30px;"></h3>-->
                <h3 class="counter" data-counter="counterup" data-value="<?php echo $activePermit['count']." "; ?>" style="line-height:15px;; font-weight:300; font-size: 30px"><?php echo $activePermit['count']." "; ?></h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=permit_expiry_date" style="color:white;">TOTAL VEHICLES</a></p>
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expPermit['count'] > 0 ) { echo 'blink';} ?>"> <a href="viewExpSecDetails.php?sec=permit_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expPermit['count']." "; ?></b>&nbsp;&nbsp; EXPIRING</a></p>
                <p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expiredPermit['count'] > 0 ) { echo 'blink-danger';} ?> "> <a href="viewExpiredSecDetails.php?sec=permit_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expiredPermit['count'].""; ?></b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-card" style="font-size:60px;"></i>
                </div>
              <!-- <a href="viewExpSecDetails.php?sec=fitness_expiry_date" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <a href="userDetails.php" class="small-box-footer">INSURANCE CERTIFICATE </i></a>
              <div class="inner">
                  
                <!--<h3 style="font-size:30px;"></h3>-->
                <h3 class="counter" data-counter="counterup" data-value="<?php echo $activeInsurence['count']." "; ?>" style="line-height:15px;; font-weight:300; font-size: 30px"><?php echo $activeInsurence['count']." "; ?></h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=insurence_expiry_date" style="color:white;">TOTAL VEHICLES</a></p>
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expInsurence['count'] > 0 ) { echo 'blink';} ?>"> <a href="viewExpSecDetails.php?sec=insurence_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expInsurence['count']." "; ?></b>&nbsp;&nbsp; EXPIRING</a></p>
                <p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expiredInsurence['count'] > 0 ) { echo 'blink-danger';} ?>"> <a href="viewExpiredSecDetails.php?sec=insurence_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expiredInsurence['count'].""; ?></b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-credit-card" style="font-size:60px;"></i>
                </div>
              
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <a href="userDetails.php" class="small-box-footer">SPEED LIMIT DEVICE </i></a>
              <div class="inner">
                  
                <!--<h3 style="font-size:30px;"></h3>-->
                <h3 class="counter" data-counter="counterup" data-value="<?php echo $activeSld['count']." "; ?>" style="line-height:15px;; font-weight:300; font-size: 30px"><?php echo $activeSld['count']." "; ?></h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=sld_expiry_date" style="color:white;">TOTAL VEHICLES</a></p>
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expSld['count'] > 0 ) { echo 'blink';} ?>"> <a href="viewExpSecDetails.php?sec=sld_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expSld['count']." "; ?></b>&nbsp;&nbsp; EXPIRING</a></p>
                <p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expiredSld['count'] > 0 ) { echo 'blink-danger';} ?>"> <a href="viewExpiredSecDetails.php?sec=sld_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expiredSld['count'].""; ?></b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-dashboard" style="font-size:60px;"></i>
                </div>
              
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <a href="userDetails.php" class="small-box-footer">REFLECTIVE TAPE </i></a>
              <div class="inner">
                  
                <!--<h3 style="font-size:30px;"></h3>-->
                <h3 class="counter" data-counter="counterup" data-value="<?php echo $activeRt['count']." "; ?>" style="line-height:15px; font-weight:300; font-size: 30px"><?php echo $activeRt['count']." "; ?></h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=rt_expiry_date" style="color:white;">TOTAL VEHICLES</a></p>
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expRt['count'] > 0 ) { echo 'blink';} ?>"> <a href="viewExpSecDetails.php?sec=rt_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expRt['count']." "; ?></b>&nbsp;&nbsp; EXPIRING</a></p>
                <p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expiredRt['count'] > 0 ) { echo 'blink-danger';} ?> "> <a href="viewExpiredSecDetails.php?sec=rt_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expiredRt['count'].""; ?></b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-card" style="font-size:60px;"></i>
                </div>
              <!-- <a href="viewExpSecDetails.php?sec=fitness_expiry_date" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <a href="userDetails.php" class="small-box-footer">ROAD TAX </i></a>
              <div class="inner">
                  
                <!--<h3 style="font-size:30px;"></h3>-->
                <h3 class="counter" data-counter="counterup" data-value="<?php echo $activeTt['count']." "; ?>" style="line-height:15px; font-weight:300; font-size: 30px"><?php echo $activeTt['count']." "; ?></h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=tt_expiry_date" style="color:white;">TOTAL VEHICLES</a></p>
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expTt['count'] > 0 ) { echo 'blink';} ?>"> <a href="viewExpSecDetails.php?sec=tt_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expTt['count']." "; ?></b>&nbsp;&nbsp; EXPIRING</a></p>
                <p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expiredTt['count'] > 0 ) { echo 'blink-danger';} ?>"> <a href="viewExpiredSecDetails.php?sec=tt_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expiredTt['count'].""; ?></b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-dollar" style="font-size:60px;"></i>
                </div>
              
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <a href="userDetails.php" class="small-box-footer">POLLUTION CERTIFICATE </i></a>
              <div class="inner">
                  
                <!--<h3 style="font-size:30px;"></h3>-->
                <h3 class="counter" data-counter="counterup" data-value="<?php echo $activePollution['count']." "; ?>" style="line-height:15px; font-weight:300; font-size: 30px"><?php echo $activePollution['count']." "; ?></h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=pollution_expiry_date" style="color:white;">TOTAL VEHICLES</a></p>
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expPollution['count'] > 0 ) { echo 'blink';} ?>"> <a href="viewExpSecDetails.php?sec=pollution_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expPollution['count']." "; ?></b>&nbsp;&nbsp; EXPIRING</a></p>
                <p style="line-height:18px;font-size:13px;"  class=" danger-box <?php if($expiredPollution['count'] > 0 ) { echo 'blink-danger';} ?>"> <a href="viewExpiredSecDetails.php?sec=pollution_expiry_date" style="color:white;"> <b  style="font-size:13px;"><?php echo $expiredPollution['count'].""; ?></b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa fa-trash-o" style="font-size:60px;"></i>
                </div>
              
            </div>
          </div>
          
           <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <a href="userDetails.php" class="small-box-footer">GPS </i></a>
              <div class="inner">
                  
                <!--<h3 style="font-size:30px;"></h3>-->
                <h3 class="counter" data-counter="counterup" data-value="0" style="line-height:15px; font-weight:300; font-size: 30px">0</h3>
                <p style="line-height:25px;font-size:13px;"><a href="viewActiveSecDetails.php?sec=pollution_expiry_date" style="color:white;">TOTAL VEHICLES</a></p>
              	<p style="line-height:18px;font-size:13px;"  class=" danger-box "> <a href="viewExpSecDetails.php?sec=pollution_expiry_date" style="color:white;"> <b  style="font-size:13px;">0</b>&nbsp;&nbsp; EXPIRING</a></p>
                <p style="line-height:18px;font-size:13px;"  class=" danger-box "> <a href="viewExpiredSecDetails.php?sec=pollution_expiry_date" style="color:white;"> <b  style="font-size:13px;">0</b>&nbsp;&nbsp; EXPIRED</a></p>
                </div>
                <div class="icon">
                  <i class="fa  fa-map-marker" style="font-size:60px;"></i>
                </div>
              
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
              <div class="inner">
                <a class="hover-ripple" href="https://www.facebook.com/gaadiwalaonline" target="_blank" style="color:white;"><center><i class="fa fa-facebook"></i></center>
              
              </div>
            
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
               <a class="hover-ripple" href="https://www.twitter.com/gaadiwalaonline" target="_blank" style="color:white;"><center> <i class="fa fa-twitter"></i></center></a>
              
              </div>
            
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
              <div class="inner">
               <a class="hover-ripple" href="https://www.linkedin.com/company/gaadiwalaonline-com/about" target="_blank" style="color:white;"><center> <i class="fa fa-linkedin"></i></center>
              
              </div>
            
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                <a class="hover-ripple" href="https://www.instagram.com/gaadiwalaonlineindia/?hl=en" target="_blank" style="color:white;"><center><i class="fa fa-instagram"></i></center></a>
              
              </div>
            
          </div>
        </div>

        

<!--</div>-->

         
          <style type="text/css">
              .video {
                  height: 0;
                  position: relative;
                  padding-bottom: 56.25%; /* Если видео 16/9, то 9/16*100 = 56.25%. Также и с 4/3 - 3/4*100 = 75% */
              }
              .video iframe {
                  position: absolute;
                  left: 0;
                  top: 0;
                  width: 100%;
                  height: 100%;
              }
            </style>
        
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
<?php include('includes/footer.php'); ?> 
<!-- dfv
2019-01-04
2019-01-23
1547719604.jpg -->