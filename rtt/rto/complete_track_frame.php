<?php 
error_reporting(E_ALL & E_NOTICE);
include('includes/function.php');
$doc = '';
$vid = $_GET['id'];
$track = getTrackDataById('track' , $vid,$doc);
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
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net/jquery.dataTables.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <input type="hidden" value="<?php echo $_SESSION['uid'] ?>" id="uid">
</head>
<body>

  <div class="content-wrapper" style="margin-left:0px;border-top: 3px solid #d2d6de;">
       <section id="prepend_div" class="content">
      <div class="row">
        <div class="col-md-12">
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
                <h3 class="timeline-header"><a href="#">Process</a>.</h3>
              </div>
            </li>
            <?php
              }
            ?>
            <br/>
            <?php
              if($doc_recieved)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php $date = date('d-m-Y',($track['doc_rec_date_time']));
                        echo date("d-m-Y",strtotime($date.' +5 days'));?></span>
                    <h3 class="timeline-header"><a href="#">Expected<br> Delivery</a></h3>
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
                <h3 class="timeline-header"><a href="#">Expected Delivery</a></h3>
              </div>
            </li>
            <?php
              }
            ?>
            <br/>
            <?php
              if($complete)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y' ,(intval($track['complete_time'])))."<br>".date('h:i:s' ,(intval($track['complete_time']))) ?></span>
                    <h3 class="timeline-header"><a href="#"> Delivered<br>On</a></h3>
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
                <h3 class="timeline-header"><a href="#"> Delivered On</a></h3>
              </div>
            </li>
            <?php
              }
            ?>
            <?php
              if($complete)
              {
                ?>
                <li>
                  <i class="fa fa-circle bg-green"></i>
                  <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i><br> <?php
                        $dates = date('d-m-Y',($track['complete_time']));
                                $dates1 = date("d-m-Y",strtotime($date.' +5 days'));
                                $dates2 = date('d-m-Y',($track['complete_time']));
                        $date1=date_create($dates1);
                        $date2=date_create($dates2);
                        $diff=date_diff($date1,$date2);
                        $date = $diff->format("%R%a days");
                        $findme   = '+';
                        $pos = strpos($date, $findme);
                        if($pos === 0)
                        {
                          echo $date ." Delay";
                        }
                        else
                        {
                          echo $date ." Before";
                        }
                        ?></span>
                    <h3 class="timeline-header"><a href="#">Our <br> Performance</a></h3>
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
                <h3 class="timeline-header"><a href="#">Our Performance</a></h3>
              </div>
            </li>
            <?php
              }
            ?>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
</body>
</html>