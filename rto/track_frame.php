<?php 
error_reporting(E_ALL & E_NOTICE);
include('includes/function.php');


$doc = '';
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

<!DOCTYPE html>
<html>
<head>
  <title>Track Frame</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="bower_components/datatables.net/jquery.dataTables.min.css">
  <!-- jquery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <input type="hidden" value="<?php echo $_SESSION['uid'] ?>" id="uid">
</head>
<body>

  <div class="content-wrapper" style="margin-left:0px;border-top: 3px solid #d2d6de;">
       <section id="prepend_div" class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">

            <?php
              if($doc_recieved)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i>
                     <?php echo date('d-m-Y' ,($track['doc_rec_date_time']))."<br>".date('h:i:s' ,($track['doc_rec_date_time'])) ?>
                    </span>

                    <h3 class="timeline-header"><a href="#">Document<br> Recieved</a>.</h3>
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
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y' ,($track['challan_date_time']))."<br>".date('h:i:s' ,($track['challan_date_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">Government<br> Fees</a>.</h3>
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
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y' ,($track['dto_date_time']))."<br>".date('h:i:s' ,($track['dto_date_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">RTO<br> Aproval</a>.</h3>
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
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y' ,($track['mvi_data_time']))."<br>".date('h:i:s' ,($track['mvi_data_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">Inspection<br></a>.</h3>

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
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y' ,($track['rc_data_time']))."<br>".date('h:i:s' ,($track['rc_data_time'])) ?></span>

                    <h3 class="timeline-header"><a href="#">Certificate<br></a>.</h3>
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
<span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y' ,(intval($track['complete_time'])))."<br>".date('h:i:s' ,(intval($track['complete_time']))) ?></span>
                    <h3 class="timeline-header"><a href="#">Document <br> Delivered</a>.</h3>
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

</body>
</html>