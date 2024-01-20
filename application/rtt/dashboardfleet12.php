<?php include('includes1/header.php'); ?>
<?php include('includes1/sidebar.php'); ?>

  <!-- Left side column. contains the logo and sidebar -->
  
<?php 

if(isset($_SESSION["status"]))
{
  $status = $_SESSION['status'];
}

// if($status == 0)
// {
//    header('Location:emailVerify.php');
// } 
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
    
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol><br><br>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php
    //   $id = $_GET["id"];
      $id = $_SESSION['uid'];
    //   echo $id;
      $expFitness = getExpCountVehicle($id,'fitness_expiry_date'); 
      $activeFitness = getActiveCountVehicle($id,'fitness_expiry_date');
      $expiredFitness = getExpiredCountVehicle($id,'fitness_expiry_date');
      // echo "<pre></section>";print_r($expFitness);die();
      $expPermit = getExpCountVehicle($id,'permit_expiry_date');
       $activePermit = getActiveCountVehicle($id,'permit_expiry_date');
      $expiredPermit = getExpiredCountVehicle($id,'permit_expiry_date');

      $expInsurence = getExpCountVehicle($id,'insurence_expiry_date');
       $activeInsurence = getActiveCountVehicle($id,'insurence_expiry_date');
      $expiredInsurence = getExpiredCountVehicle($id,'insurence_expiry_date');

      $expSld = getExpCountVehicle($id,'sld_expiry_date');
        $activeSld = getActiveCountVehicle($id,'sld_expiry_date');
      $expiredSld = getExpiredCountVehicle($id,'sld_expiry_date');


      $expRt = getExpCountVehicle($id,'rt_expiry_date');
        $activeRt = getActiveCountVehicle($id,'rt_expiry_date');
      $expiredRt = getExpiredCountVehicle($id,'rt_expiry_date');


      $expTt = getExpCountVehicle($id,'tt_expiry_date');
        $activeTt = getActiveCountVehicle($id,'tt_expiry_date');
      $expiredTt = getExpiredCountVehicle($id,'tt_expiry_date');

      $expPollution = getExpCountVehicle($id,'pollution_expiry_date');
        $activePollution = getActiveCountVehicle($id,'pollution_expiry_date');
      $expiredPollution = getExpiredCountVehicle($id,'pollution_expiry_date');
    //   print_R($activePollution);die();

      ?>
      
<div class="main_content_iner ">
<div class="container-fluid p-0 ">
<div class="row ">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
<div class="quick_activity_wrap">

<div class="single_quick_activity">
<div >   <a href="totalRecDocument.php">
<p>Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3>
</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">

</div>

</div>
</div>

<div class="single_quick_activity">
<div class="count_content">   <a href="totalRecDocument.php">
<p>Total Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3><a href="#" class="notification_btn violate_btn"><?php echo $expiredFitness['count'].""; ?>&nbsp;&nbsp;Expired</a>

</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div>

<div class="single_quick_activity">
<div class="count_content">   <a href="totalRecDocument.php">
<p>Total Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3><a href="#" class="notification_btn yellow_btn"><?php echo $expiredFitness['count'].""; ?>&nbsp;&nbsp;Expired</a>

</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div>
<div class="single_quick_activity">
<div class="count_content">   <a href="totalRecDocument.php">
<p>Total Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3><a href="#" class="notification_btn yellow_btn"><?php echo $expiredFitness['count'].""; ?>&nbsp;&nbsp;Expired</a>

</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div>
<div class="single_quick_activity">
<div class="count_content">   <a href="totalRecDocument.php">
<p>Total Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3><a href="#" class="notification_btn yellow_btn"><?php echo $expiredFitness['count'].""; ?>&nbsp;&nbsp;Expired</a>

</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div><div class="single_quick_activity">
<div class="count_content">   <a href="totalRecDocument.php">
<p>Total Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3><a href="#" class="notification_btn yellow_btn"><?php echo $expiredFitness['count'].""; ?>&nbsp;&nbsp;Expired</a>

</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div><div class="single_quick_activity">
<div class="count_content">   <a href="totalRecDocument.php">
<p>Total Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3><a href="#" class="notification_btn yellow_btn"><?php echo $expiredFitness['count'].""; ?>&nbsp;&nbsp;Expired</a>

</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div><div class="single_quick_activity">
<div class="count_content">   <a href="totalRecDocument.php">
<p>Total Fitness</p><h3><?php
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?></span> </h3><a href="#" class="notification_btn yellow_btn"><?php echo $expiredFitness['count'].""; ?>&nbsp;&nbsp;Expired</a>

</div><a href="#" class="notification_btn"><?php echo $expFitness['count']." "; ?>&nbsp;&nbsp; Expiring</a>

<div id="bar2" class="barfiller">
<div class="tipWrap" style="display: inline;">
<span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">65%</span>
</div>
<span class="fill" data-percentage="65" style="background: rgb(255, 191, 67); width: 144.3px; transition: width 2.5s ease-in-out 0s;"></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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
          <!--<div class="col-sm-12">-->
          <!--  <div class="col-sm-8">-->
          <!--     User Statistics-->
          <!--      <div class="box box-success" id="vidbox">-->
          <!--        <div class="box-header with-border">-->
          <!--          <h3 class="box-title"><b>Video Tutorial</b></h3>-->

          <!--          <div class="box-tools pull-right">-->
          <!--            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
          <!--            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--         /.box-header -->

          <!--        <div class="box-body">-->
            
          <!--          <div class="col py-4">-->
          <!--              <div class="video"><iframe src="https://www.youtube.com/embed/T1eZdj-XOqs?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe></div>-->
          <!--          </div>-->
          <!--           <div class="col py-2">-->
          <!--            <div class="video"><iframe src="https://www.youtube.com/embed/I39RKjerJss?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe></div>-->
          <!--        </div>-->
          <!--          <div class="col py-2">-->
          <!--              <div class="video"><iframe src="https://www.youtube.com/embed/Dkx4LYeFnVY?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe></div> -->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
        
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <link rel="stylesheet" href="style1.css">
<?php include('includes/footer.php'); ?> 
<!-- dfv
2019-01-04
2019-01-23
1547719604.jpg -->