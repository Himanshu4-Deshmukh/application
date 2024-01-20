<?php 
include('includes/header.php'); 
include('includes/sidebar.php');
include_once("conn.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- jquery -->


  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1> -->
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
      <?php
      $id = $_SESSION['uid'];
      $totalV = getTotalV($id);
      // echo"<pre>" ; print_r($totalV);die();
      $totalDocRecieved = getTotalDocument($id);
      $completeDocument = getCompleteDocument($id);
      $pendingDocument =getPendingDocument($id);
      // $expFitness = getExpCountVehicle($id,'fitness_expiry_date');
      // // echo "<pre></section>";print_r($expFitness);die();
      // $expPermit = getExpCountVehicle($id,'permit_expiry_date');
      // $expInsurence = getExpCountVehicle($id,'insurence_expiry_date');
      // $expSld = getExpCountVehicle($id,'sld_expiry_date');
      // $expRt = getExpCountVehicle($id,'rt_expiry_date');
      // $expTt = getExpCountVehicle($id,'tt_expiry_date');
      // $expPollution = getExpCountVehicle($id,'pollution_expiry_date');
      ?>
     
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        
        <a href="totalRecDocument.php">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file"></i></span>           
            <div class="info-box-content">
              <span class="info-box-text">Total Vehicles</span>
              
                <span class="info-box-number"><?php echo count($totalV); ?>
              
              </span>  
              <span class="small-box-footer" style="display: block; color: grey">Click to view details</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>


      

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


    



        <a href="totalRecDocument.php">
        <div class="col-md-3 col-sm-6 col-xs-12">
           <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-paper-plane"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sanitised</span>
              <span class="info-box-number"><?php echo count($completeDocument); ?></span>  
              <span class="small-box-footer" style="display: block; color: grey">Click to view details</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
    <a href="totalRecDocument.php">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-paperclip"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Unsanitize</span>
              <span class="info-box-number"><?php echo count($pendingDocument); ?></span>  
              <span class="small-box-footer" style="display: block; color: grey">Click to view details</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>

      </div>
      <!-- /.row -->  
      <section class="content-header">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->

          <!-- /.box -->
          <div class="row">
            <div class="col-md-6">
              <!-- DIRECT CHAT -->

            </div>
            <!-- /.col -->

            <div class="col-md-6">
              <!-- USERS LIST -->

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row --> <!-- Main content -->
  
      <!-- Small boxes (Stat box) -->
      <?php
      $id = $_SESSION['uid'];
      $totalV = getTotalV($id);
      // echo"<pre>" ; print_r($totalV);die();
      $totalDocRecieved = getTotalDocument($id);
      $completeDocument = getCompleteDocument($id);
      $pendingDocument =getPendingDocument($id);
      // $expFitness = getExpCountVehicle($id,'fitness_expiry_date');
      // // echo "<pre></section>";print_r($expFitness);die();
      // $expPermit = getExpCountVehicle($id,'permit_expiry_date');
      // $expInsurence = getExpCountVehicle($id,'insurence_expiry_date');
      // $expSld = getExpCountVehicle($id,'sld_expiry_date');
      // $expRt = getExpCountVehicle($id,'rt_expiry_date');
      // $expTt = getExpCountVehicle($id,'tt_expiry_date');
      // $expPollution = getExpCountVehicle($id,'pollution_expiry_date');
      ?>
      


          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" style="display: inline !important" >
                <span style="float: left;">Vehicle Details</span>
                   <!-- vikram start -->
                    <form action="" method="post" style="display: inline; float: right;">
                        <div class="input-group mb-3" style="display: inline;">
                            <input type="text" class="form-control" placeholder="Search" name="search" style="display:inline !important;width:80%">
                            <div class="input-group-append" style="display: inline !important">
                                <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                            </div>
                      <div>
                    </form>
            <!-- vikram end -->

              </h3>
             
        

             <!--  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <style type="text/css">
                @media only screen and (max-width: 900px) {
                    .mob{
                        display: none;
                    }
                }
              </style>
              <div class="table-responsive">
                <table class="no-margin table-bordered table-hover table table-striped">
                   <thead>
                      <tr>
                          <th class="mob">Sl.No.</th>
                          <th>Vehicle No</th>                       
                          <th class="mob">Owner Name</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                   <?php
                   if(isset($_POST["search"]))
                   {
                    echo '<script>
                      $(document).ready(function(){
                          document.getElementById("pagination_div").style.display="none";
                        }); 
                        </script>';
                    $s_item = strtolower($_POST["search"]);
                    $rpp=8;
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                    //number of rows
                      $num_rows = mysqli_num_rows($result);
                      //number of pages
                      $num_pages = ceil($num_rows/$rpp);
                      
                      // determine which page number visitor is currently on
                  if (!isset($_GET['page'])) {
                    $page = 1;
                  } else {
                    $page = $_GET['page'];
                  }
                  
                  // determine the sql LIMIT starting number for the results on the displaying page
                  $cur_page = ($page-1)*$rpp;

                  //creating serial number algorithm
                  $c=1;

                  $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                  $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result))
                  {
                    if(strpos(strtolower($row["reg_no"]), $s_item)!==false)
                        {
                          echo '<tr>
                            <td class="mob">'.$c.'</td>
                            <td>'.$row["reg_no"].'</td>
                            <td class="mob">'.$row["owner"].'</td>
                           
                            <td>
                              <form class="myForm" action="dashboard.php" method="post">
                                <input type="hidden" name="trk_id" value="'.$row["vid"].'">
                                <input type="hidden" name="trk_num" value="'.$row["reg_no"].'">
                                <button class="btn btn-primary" type="submit" name="trk_submit">
                                  <i class="fa fa-car"> Track</i>
                                </button>
                              </form>
                            </td>

                         </tr>';
                         $c++;
                        }
                    
                  }

                   }
                   else
                   {
                     $rpp=8;
                    $sql="SELECT * FROM display_status WHERE owner_id='$id'";
                    $result=mysqli_query($conn,$sql);
                    //number of rows
                      $num_rows = mysqli_num_rows($result);
                      //number of pages
                      $num_pages = ceil($num_rows/$rpp);
                      
                      // determine which page number visitor is currently on
                  if (!isset($_GET['page'])) {
                    $page = 1;
                  } else {
                    $page = $_GET['page'];
                  }
                  
                  // determine the sql LIMIT starting number for the results on the displaying page
                  $cur_page = ($page-1)*$rpp;

                  //creating serial number algorithm
                  $c=($page*8)-7;

                  $sql="SELECT * FROM display_status WHERE owner_id='$id' LIMIT " . $cur_page . ',' .  $rpp;
                  $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result))
                  {
                    echo '<tr>
                            <td class="mob">'.$c.'</td>
                            <td>'.$row["reg_no"].'</td>
                            <td class="mob">'.$row["owner"].'</td>
                           
                           

                            <td>
                              <form action="" method="post">
                                <input type="hidden" name="trk_id" value="'.$row["vid"].'">
                                <input type="hidden" name="trk_num" value="'.$row["reg_no"].'">
                                <button class="btn btn-primary" type="submit" name="trk_submit">
                                  <i class="fa fa-car"> Track</i>
                                </button>
                              </form>
                            </td>

                         </tr>';
                         $c++;
                  }

                   }
                   
                   ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      
                    </tr>
                  </tfoot>
                </table>
                        </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!-- pagination goes here -->
                            <?php
              if($page==1)
              {
                $prev="#";
              }
              else
              {
                $prev="dashboard.php?page=".($page-1);
              }

              if($page==$num_pages)
              {
                $nxt="#";
              }
              else
              {
                $nxt="dashboard.php?page=".($page+1);
              }
            

                  echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
                  <a href="dashboard.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
              <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
              <b>Page: '.$page.' of '.$num_pages.'</b>
              <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
              <a href="dashboard.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
              </div>';
                  ?>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
        <div id="trk_main" style="text-align: center;">
          <h3 id="reg_no" style="display:inline;">Tracking Details</h3>
          <div id="track_frame" class="info-box">
          
            <!-- track records are loaded here from javascript -->

          </div>
        </div>

       
          <?php
            if(isset($_POST["trk_submit"]))
            {
              echo '<script>
                      document.getElementById("reg_no").innerHTML="'.$_POST["trk_num"].'";
                      $("#track_frame").load("track_frame.php?id='.$_POST["trk_id"].'");
                      setTimeout(slide, 3000);
                      function slide()
                      {
                        document.getElementById("trk_main").scrollIntoView({ behavior: \'smooth\', block: \'center\' });
                      }
                    </script>';
            }
            else
            {
              $sql="SELECT * FROM display_status WHERE owner_id='$id'";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_assoc($result);
              $row_id=$row["id"];
              echo '<script type="text/javascript">
                      $(document).ready(function(){           
                            $("#track_frame").load("track_frame.php?id='.$row_id.'");
                      });
                    </script>';
            }
          ?>
          <!-- /.info-box -->
         
          <!-- /.info-box -->
          
          <!-- /.info-box -->
         
          <!-- /.info-box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?> 
<script type="text/javascript">
  
</script>