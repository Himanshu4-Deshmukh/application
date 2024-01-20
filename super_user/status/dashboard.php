<?php 
include('includes/header.php'); 
include('includes/sidebar.php');
include_once("conn.php");
      $id = $_SESSION['uid'];
      $customer = $_SESSION['customer'];
      $totalV = getTotalV($customer);
      $totalDocRecieved = getTotalDocument($customer);
      $completeDocument = getCompleteDocument($customer);
      $pendingDocument =getPendingDocument($customer);
?>
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
   <div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
      <div class="row">
        <a href="totalVehicle.php">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-file"></i></span>           
            <div class="info-box-content">
              <span class="info-box-text">Total Documents</span>
                <span class="info-box-number" style="font-weight:400"><?php
                    $sql="SELECT * FROM `display_status` WHERE `customer_id`=".$customer;
                    $result=mysqli_query($conn,$sql);
                    //number of rows
                      $totalV = mysqli_num_rows($result);
                      echo $totalV; ?>
                      <!--<?php echo count($totalV); ?>-->
              </span>  
              <span class="small-box-footer" style="display: block; color: grey">Click to view details</span>
            </div>
          </div>
        </div>
        </a>


        <a href="totalRecDocument.php">
        <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-file-text"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Processed Docs</span>
              <span class="info-box-number" style="font-weight:400"><?php
                    $sql="SELECT * FROM `track` LEFT JOIN `vehicle` ON track.vehicle_id = vehicle.id WHERE vehicle.customer_id='$customer'";
                    $result=mysqli_query($conn,$sql);
                    //number of rows
                      $totalDocRecieved = mysqli_num_rows($result);
                      echo $totalDocRecieved; ?>
                      <!-- <?php echo count($totalDocRecieved); ?> -->
                      </span>    
              <span class="small-box-footer" style="display: block; color: grey">Click to view details</span>
            </div>
          </div>
        </div>
      </a>

        <div class="clearfix visible-sm-block"></div>
      <a href="pendingDocument.php">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-paperclip"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pending Docs</span>
              <span class="info-box-number" style="font-weight:400"><?php
                    $sql="SELECT * FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id WHERE  track.complete = '0' AND vehicle.customer_id = ".$customer;
                    $result=mysqli_query($conn,$sql);
                    //number of rows
                      $pendingDocument = mysqli_num_rows($result);
                      echo $pendingDocument; ?>
                      <!-- <?php echo count($pendingDocument); ?> --></span>  
              <span class="small-box-footer" style="display: block; color: grey">Click to view details</span>
            </div>
          </div>
        </div>
        </a>



        <a href="completeDocument.php">
        <div class="col-md-3 col-sm-6 col-xs-12">
           <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-paper-plane"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Delivered Docs</span>
              <span class="info-box-number" style="font-weight:400"><?php
                    $sql="SELECT *  FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id WHERE track.complete = '1' AND vehicle.customer_id = ".$customer;
                    $result=mysqli_query($conn,$sql);
                    //number of rows
                      $completeDocument = mysqli_num_rows($result);
                      echo $completeDocument; ?>
                     <!--  <?php echo count($completeDocument); ?> --></span> 
              <span class="small-box-footer" style="display: block; color: grey">Click to view details</span>
            </div>
          </div>
        </div>
      </a>


      </div>
      <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
            </div>
           </div>


          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" style="display: inline !important" >
                <span style="float: left; font-size:15px">VEHICLE DETAILS</span><br>
                    <form action="" method="post" style="display: inline; float: right;">
                        <div class="input-group mb-3" style="display: inline;">
                            <input type="text" class="form-control" placeholder="Search" name="search" style="display:inline !important;width:80%">
                            <div class="input-group-append" style="display: inline !important">
                                <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                            </div>
                      <div>
                    </form>
              </h3>
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
                          <th class="mob" style="text-align: center; font-size:12px">Sl.No.</th>
                          <th style="text-align: center; font-size:12px">REGISTRATION NO</th></th>                       
                          <th class="mob" style="text-align: center; font-size:12px">OWNER NAME</th>
                          <th style="text-align: center; font-size:12px">STATUS</th>
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
                    $rpp=2;
                    $sql="SELECT * FROM display_status WHERE customer_id='$customer'";
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

                  $sql="SELECT * FROM display_status WHERE customer_id='$customer'";
                  $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result))
                  {
                    if(strpos(strtolower($row["reg_no"]), $s_item)!==false)
                        {
                          echo '<tr>
                            <td class="mob" style="text-align: center;">'.$c.'</td>
                            <td style="text-align: center;">'.$row["reg_no"].'</td>
                            <td class="mob" style="text-align: center;">'.$row["owner"].'</td>
                            <td style="text-align: center;">
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
                     $rpp=2;
                    $sql="SELECT * FROM display_status WHERE customer_id='$customer'";
                    $result=mysqli_query($conn,$sql);
                      $num_rows = mysqli_num_rows($result);
                      $num_pages = ceil($num_rows/$rpp);
                  if (!isset($_GET['page'])) {
                    $page = 1;
                  } else {
                    $page = $_GET['page'];
                  }
                  $cur_page = ($page-1)*$rpp;
                  $c=($page*2)-1;
                  $sql="SELECT * FROM display_status WHERE customer_id='$customer' LIMIT " . $cur_page . ',' .  $rpp;
                  $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result))
                  {
                    echo '<tr> 
                            <td class="mob" style="text-align: center;">'.$c.'</td>
                            <td style="text-align: center;">'.$row["reg_no"].'</td>
                            <td class="mob" style="text-align: center;">'.$row["owner"].'</td>
                            <td style="text-align: center;">
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
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>