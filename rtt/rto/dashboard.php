<?php
include('includes/header.php');
include('includes/sidebar.php');
include('conn.php');
$id = $_SESSION['uid'];
$totalV = getTotalV($id);
$track = getTotalDocument($id);
?>
<?php
$id = $_SESSION['uid'];
$totalV = getTotalV($id);
$totalDocRecieved = getTotalDocument($id);
$completeDocument = getCompleteDocument($id);
$pendingDocument = getPendingDocument($id);
?>
<style type="text/css">
  .box.box-info {
    border-top-color: #e2dede !important;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"></li>
    </ol>
  </section><br />

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
                      <div class="count_content"> <a href="totalVehicle.php">
                          <p>RECIEVED VEHICLES </p>
                          <h3><span class="counter"><?php
                                                    $sql = "SELECT * FROM display_status WHERE owner_id='$id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $totalV = mysqli_num_rows($result);
                                                    echo $totalV; ?></span> </h3>
                      </div>
                      <a href="totalVehicle.php" class="notification_btn">Track</a>
                      <div id="bar1" class="barfiller">
                        <div class="tipWrap" style="display: inline;">

                        </div>
                        <span class="fill" data-percentage="100" style="background: rgb(80, 143, 244); width: 500px; transition: width 2s ease-in-out 0s;"></span>
                      </div>
                    </div>

                    <div class="single_quick_activity">
                      <div class="count_content"> <a href="totalRecDocument.php">
                          <p>PROCESSED</p>
                          <h3><span class="counter"><?php
                                                    $sql = "SELECT * FROM `track` LEFT JOIN `vehicle` ON track.vehicle_id = vehicle.id  LEFT JOIN  `user` ON vehicle.user_id = user.id WHERE user.id='$id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    //number of rows
                                                    $totalDocRecieved = mysqli_num_rows($result);
                                                    echo $totalDocRecieved; ?></span> </h3>
                      </div>
                      <a href="https://demo.dashboardpack.com/marketing-html/#" class="notification_btn yellow_btn">Track</a>
                      <div id="bar2" class="barfiller">
                        <div class="tipWrap" style="display: inline;">
                          <span class="tip" style="left: 121.1px; transition: left 2.5s ease-in-out 0s;">
                            <!-- 65% -->
                          </span>
                        </div>
                        <span class="fill" data-percentage="100" style="background: rgb(255, 191, 67); width: 500px; transition: width 2.5s ease-in-out 0s;"></span>
                      </div>
                    </div>

                    <div class="single_quick_activity">
                      <div class="count_content"> <a href="pendingDocument.php">
                          <p>PENDING</p>
                          <h3><span class="counter"><?php
                                                    $sql = "SELECT * FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id  LEFT JOIN  `user` ON vehicle.user_id = user.id WHERE  track.complete = '0' AND user.id = " . $id;
                                                    $result = mysqli_query($conn, $sql);
                                                    //number of rows
                                                    $pendingDocument = mysqli_num_rows($result);
                                                    echo $pendingDocument; ?></span> </h3>
                      </div>
                      <a href="https://demo.dashboardpack.com/marketing-html/#" class="notification_btn red_btn">Track</a>
                      <div id="bar3" class="barfiller">
                        <div class="tipWrap" style="display: inline;">
                          <span class="tip" style="left: 143.3px; transition: left 3s ease-in-out 0s;">
                            <!-- 75% -->
                          </span>
                        </div>
                        <span class="fill" data-percentage="75" style="background: rgb(255,0,0); width:500px; transition: width 3s ease-in-out 0s;"></span>
                      </div>
                    </div>

                    <div class="single_quick_activity">
                      <div class="count_content"> <a href="completeDocument.php">
                          <p>DELIVERED</p>
                          <h3><span class="counter"><?php
                                                    $sql = "SELECT *  FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id  LEFT JOIN  `user` ON vehicle.user_id = user.id WHERE    track.complete = '1' AND user.id = " . $id;
                                                    $result = mysqli_query($conn, $sql);
                                                    //number of rows
                                                    $completeDocument = mysqli_num_rows($result);
                                                    echo $completeDocument; ?></span> </h3>
                      </div>
                      <a href="https://demo.dashboardpack.com/marketing-html/#" class="notification_btn green_btn">Track</a>
                      <div id="bar4" class="barfiller">
                        <div class="tipWrap" style="display: inline;">
                          <span class="tip" style="left: 165.5px; transition: left 3.5s ease-in-out 0s;">

                            <!-- 85% -->
                          </span>
                        </div>
                        <span class="fill" data-percentage="85" style="background: rgb(0,128,0); width: 500px; transition: width 3.5s ease-in-out 0s;"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
                  <h3 class="box-title" style="display: inline !important">
                    <span style="float: left; font-size:15px">RECIEVED VEHICLES</span><br>
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
                <div class="box-body">
                  <style type="text/css">
                    @media only screen and (max-width: 900px) {
                      .mob {
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
                        if (isset($_POST["search"])) {
                          echo '<script>
                      $(document).ready(function(){
                          document.getElementById("pagination_div").style.display="none";
                        }); 
                        </script>';
                          $s_item = strtolower($_POST["search"]);
                          $rpp = 6;
                          $sql = "SELECT * FROM display_status WHERE owner_id='$id'";
                          $result = mysqli_query($conn, $sql);
                          $num_rows = mysqli_num_rows($result);
                          $num_pages = ceil($num_rows / $rpp);
                          if (!isset($_GET['page'])) {
                            $page = 1;
                          } else {
                            $page = $_GET['page'];
                          }
                          $cur_page = ($page - 1) * $rpp;
                          $c = 1;
                          $sql = "SELECT * FROM display_status WHERE owner_id='$id'";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_assoc($result)) {
                            if (strpos(strtolower($row["reg_no"]), $s_item) !== false) {
                              echo '<tr>
                            <td class="mob">' . $c . '</td>
                            <td>' . $row["reg_no"] . '</td>
                            <td class="mob">' . $row["company_name"] . '</td>
                           
                            <td>
                              <form class="myForm" action="dashboard.php" method="post">
                                <input type="hidden" name="trk_id" value="' . $row["vid"] . '">
                                <input type="hidden" name="trk_num" value="' . $row["reg_no"] . '">
                                <button class="btn btn-primary" type="submit" name="trk_submit">
                                  <i class="fa fa-car"> Track</i>
                                </button>
                              </form>
                            </td>

                         </tr>';
                              $c++;
                            }
                          }
                        } else {
                          $rpp = 6;
                          $sql = "SELECT * FROM display_status WHERE owner_id='$id'";
                          $result = mysqli_query($conn, $sql);
                          $num_rows = mysqli_num_rows($result);
                          $num_pages = ceil($num_rows / $rpp);
                          if (!isset($_GET['page'])) {
                            $page = 1;
                          } else {
                            $page = $_GET['page'];
                          }
                          $cur_page = ($page - 1) * $rpp;
                          $c = ($page * 6) - 5;
                          $sql = "SELECT * FROM display_status WHERE owner_id='$id' LIMIT " . $cur_page . ',' .  $rpp;
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                            <td class="mob">' . $c . '</td>
                            <td>' . $row["reg_no"] . '</td>
                            <td class="mob">' . $row["company_name"] . '</td>
                            <td>
                              <form action="" method="post">
                                <input type="hidden" name="trk_id" value="' . $row["vid"] . '">
                                <input type="hidden" name="trk_num" value="' . $row["reg_no"] . '">
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
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <?php
                  if ($page == 1) {
                    $prev = "#";
                  } else {
                    $prev = "dashboard.php?page=" . ($page - 1);
                  }
                  if ($page == $num_pages) {
                    $nxt = "#";
                  } else {
                    $nxt = "dashboard.php?page=" . ($page + 1);
                  }
                  echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
                  <a href="dashboard.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
              <a href="' . $prev . '" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
              <b>Page: ' . $page . ' of ' . $num_pages . '</b>
              <a href="' . $nxt . '" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
              <a href="dashboard.php?page=' . $num_pages . '" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
              </div>';
                  ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div id="trk_main" style="text-align: center;">
                <h3 id="reg_no" style="display:inline;">Tracking Details</h3>
                <div id="track_frame" class="info-box">
                </div>
              </div>
              <?php
              if (isset($_POST["trk_submit"])) {
                echo '<script>
                      document.getElementById("reg_no").innerHTML="' . $_POST["trk_num"] . '";
                      $("#track_frame").load("track_frame.php?id=' . $_POST["trk_id"] . '");
                      setTimeout(slide, 3000);
                      function slide()
                      {
                        document.getElementById("trk_main").scrollIntoView({ behavior: \'smooth\', block: \'center\' });
                      }
                    </script>';
              } else {
                $sql = "SELECT * FROM display_status WHERE owner_id='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $row_id = $row["id"];
                echo '<script type="text/javascript">
                      $(document).ready(function(){           
                            $("#track_frame").load("track_frame.php?id=' . $row_id . '");
                      });
                    </script>';
              }
              ?>
            </div>
          </div>
        </section>
      </div>
      <!-- /.content-wrapper -->

      <?php
      include('includes/footer.php');
      ?>