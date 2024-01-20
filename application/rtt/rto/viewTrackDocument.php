<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php 

$status = $_SESSION['status'];
// print_R($status);die();
if($status == 0)
{
   header('Location:emailVerify.php');
} 

$doc = $_GET['doc'];
  $vid = $_GET['id'];
$track = getTrackDataById('track' , $vid,$doc);

  // print_r($track);die();

  if($track)
  {
    
    $duid = $track['doc_unique_id'];
    $doc_recieved = $track['doc_recieved'];
    $challan = $track['challan'];
    $dto_passing = $track['dto_passing'];
    $mvi_passing = $track['mvi_passing'];
    $rc_card = $track['rc_card'];
    $complete = $track['complete'];
  }
  else
  {
    $duid = '';
    $doc_recieved ='';
    $challan = '';
    $dto_passing = '';
    $mvi_passing = '';
    $rc_card = '';
    $complete = '';
  }
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Real time Document Track 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Document Track </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Track Document
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <?php
              if($doc_recieved)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y  h:i:s' ,($track['doc_rec_date_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">Document Recieved</a>.</h3>

                    <!-- <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div> -->
                  </div>
                </li>
                <?php
              }
              else
              {
                ?>
                 <li>
              <i class="fa fa-circle bg-grey"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                <h3 class="timeline-header"><a href="#">Process</a>.</h3>

              
              </div>
            </li>
            <?php
              }
            ?>
             
            <br/>
            <!-- END timeline item -->
            <!-- timeline item -->

            <?php
              if($challan)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y  h:i:s' ,($track['challan_date_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">Government Fees</a>.</h3>

                    <!-- <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div> -->
                  </div>
                </li>
                <?php
              }
              else
              {
                ?>
                 <li>
              <i class="fa fa-circle bg-grey"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                <h3 class="timeline-header"><a href="#">Government Fees</a>.</h3>

              
              </div>
            </li>
            <?php
              }
            ?>
            
            <br/>

            <?php
              if($dto_passing)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y  h:i:s' ,($track['dto_date_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">RTO Aproval</a>.</h3>

                    <!-- <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div> -->
                  </div>
                </li>
                <?php
              }
              else
              {
                ?>
                 <li>
              <i class="fa fa-circle bg-grey"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                <h3 class="timeline-header"><a href="#">RTO Aproval</a>.</h3>

              
              </div>
            </li>
            <?php
              }
            ?>
            
            <br/>

            <!-- timeline item -->

            <?php
              if($mvi_passing)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y  h:i:s' ,($track['mvi_data_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">Inspection</a>.</h3>

                    <!-- <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div> -->
                  </div>
                </li>
                <?php
              }
              else
              {
                ?>
                 <li>
              <i class="fa fa-circle bg-grey"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                <h3 class="timeline-header"><a href="#">Inspection.</a>.</h3>

              
              </div>
            </li>
            <?php
              }
            ?>
            
            <br/>

            <!-- timeline item -->
            <?php
              if($rc_card)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y  h:i:s' ,($track['rc_data_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">Certificate</a>.</h3>

                    <!-- <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div> -->
                  </div>
                </li>
                <?php
              }
              else
              {
                ?>
                 <li>
              <i class="fa fa-circle bg-grey"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                <h3 class="timeline-header"><a href="#">Certificate</a>.</h3>

              
              </div>
            </li>
            <?php
              }
            ?>
            
            <br/>

            <!-- timeline item -->
            <?php
              if($complete)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">
                    <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->
<span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y  h:i:s' ,(intval($track['complete_time']))) ?></span>
                    <h3 class="timeline-header"><a href="#">Document Delivered</a>.</h3>

                    <!-- <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div> -->
                  </div>
                </li>
                <?php
              }
              else
              {
                ?>
                 <li>
              <i class="fa fa-circle bg-grey"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                <h3 class="timeline-header"><a href="#">Document Delivered</a>.</h3>

              
              </div>
            </li>
            <?php
              }
            ?>
            
                        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
<?php include('includes/footer.php'); ?> 