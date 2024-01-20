<?php
include_once("conn.php");
include_once("validate.php");

$id = $_SESSION['uid'];
$cust = $_SESSION['customer'];

function getVehicleCountByUid($id, $field_name)
  {
    include("conn.php");
    $sel_query = "SELECT  vehicle.*   FROM `vehicle` WHERE `customer_id` = '$field_name' AND `user_id` = ".$id;
    $result = mysqli_query($conn,$sel_query);
    $data = $result->num_rows;
    return $data;
  }
?>
<!DOCTYPE html>
<!--Updated by jayanti-->
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../images/logo1.png">
  <link rel="icon" type="image/png" href="../images/logo1.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Gaadiwalaonline Management Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard" />
  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, free dashboard, free admin dashboard, free bootstrap 4 admin dashboard">
  <meta name="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Material Dashboard by Creative Tim">
  <meta itemprop="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Material Dashboard by Creative Tim">
  <meta name="twitter:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Material Dashboard by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="dashboard.html" />
  <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg" />
  <meta property="og:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
  <meta property="og:site_name" content="Creative Tim" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.min1c51.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com/" class="simple-text logo-normal">
          Management
        </a></div>
      <div class="sidebar-wrapper">
         <ul class="nav">
          
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="active_v.php">
              <i class="fa fa-thumbs-up"></i>
              <p>Active Vehicles</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="expiring_v.php">
              <i class="fa fa-clock-o"></i>
              <p>Expiring Vehicles</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="expired_v.php">
              <i class="fa fa-exclamation-triangle"></i>
              <p>Expired Vehicles</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="all_v.php">
              <i class="fa fa-car"></i>
              <p>Total Vehicles</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fa fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->

      <!-- End Navbar -->
      <div class="content mt-0 pt-4">
        <div class="container-fluid">
          <div class="row">  

          <?php 
          // jass new change
              $expdate = date("Y-m-d", strtotime("+15 days"));
              $nowdate = date("Y-m-d", strtotime("+0 days"));

              $sql = "SELECT * FROM vehicle WHERE 
                         !(fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$expdate' AND permit_expiry_date>'$nowdate'
                      OR insurence_expiry_date<'$expdate' AND insurence_expiry_date>'$nowdate'
                      OR sld_expiry_date<'$expdate' AND sld_expiry_date>'$nowdate'
                      OR rt_expiry_date<'$expdate' AND rt_expiry_date>'$nowdate'
                      OR tt_expiry_date<'$expdate' AND tt_expiry_date>'$nowdate'
                      OR pollution_expiry_date<'$expdate' AND pollution_expiry_date>'$nowdate') 

                      AND !(fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$nowdate' AND permit_expiry_date!='1970-01-01' AND permit_expiry_date!=''
                      OR insurence_expiry_date<'$nowdate' AND insurence_expiry_date!='1970-01-01' AND insurence_expiry_date!=''
                      OR sld_expiry_date<'$nowdate' AND sld_expiry_date!='1970-01-01' AND sld_expiry_date!=''
                      OR rt_expiry_date<'$nowdate' AND rt_expiry_date!='1970-01-01' AND rt_expiry_date!=''
                      OR tt_expiry_date<'$nowdate' AND tt_expiry_date!='1970-01-01' AND tt_expiry_date!=''
                      OR pollution_expiry_date<'$nowdate' AND pollution_expiry_date!='1970-01-01' AND pollution_expiry_date!='') AND customer_id = '$cust'";

                      // end new change
            // $sql = "SELECT * FROM track WHERE doc_recieved='1'";
            $result = mysqli_query($conn,$sql);
            $count_active_v = mysqli_num_rows($result);
          ?> 
            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="active_v.php">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <!-- <i class="material-icons">store</i> -->
                    <i class="fa fa-thumbs-up"></i>
                  </div>
                  <p class="card-category">Active Vehicles</p>
                  <h3 class="card-title"><?= $count_active_v; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>Get More Details
                  </div>
                </div>
              </div>
              </a>
            </div>

            <?php 
              $expdate = date("Y-m-d", strtotime("+15 days"));
              $nowdate = date("Y-m-d", strtotime("+0 days"));

              $sql = "SELECT * FROM vehicle WHERE (fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$expdate' AND permit_expiry_date>'$nowdate'
                      OR insurence_expiry_date<'$expdate' AND insurence_expiry_date>'$nowdate'
                      OR sld_expiry_date<'$expdate' AND sld_expiry_date>'$nowdate'
                      OR rt_expiry_date<'$expdate' AND rt_expiry_date>'$nowdate'
                      OR tt_expiry_date<'$expdate' AND tt_expiry_date>'$nowdate'
                      OR pollution_expiry_date<'$expdate' AND pollution_expiry_date>'$nowdate') 
                       AND customer_id = '$cust'";
              $result = mysqli_query($conn,$sql);             
              $count_expiring_v = mysqli_num_rows($result);
            ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="expiring_v.php">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <!-- <i class="material-icons">content_copy</i> -->
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <p class="card-category">Expiring Vehicles</p>
                  <h3 class="card-title"><?= $count_expiring_v; ?>
                  
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>Get More Details
                  </div>
                </div>
              </div>
            </a>
            </div>
         
          <?php 
              $expdate = date("Y-m-d", strtotime("+15 days"));
              $nowdate = date("Y-m-d", strtotime("+0 days"));

              $sql = "SELECT * FROM vehicle WHERE (fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$nowdate' AND permit_expiry_date!='1970-01-01' AND permit_expiry_date!=''
                      OR insurence_expiry_date<'$nowdate' AND insurence_expiry_date!='1970-01-01' AND insurence_expiry_date!=''
                      OR sld_expiry_date<'$nowdate' AND sld_expiry_date!='1970-01-01' AND sld_expiry_date!=''
                      OR rt_expiry_date<'$nowdate' AND rt_expiry_date!='1970-01-01' AND rt_expiry_date!=''
                      OR tt_expiry_date<'$nowdate' AND tt_expiry_date!='1970-01-01' AND tt_expiry_date!=''
                      OR pollution_expiry_date<'$nowdate' AND pollution_expiry_date!='1970-01-01' AND pollution_expiry_date!='')
                       AND customer_id = '$cust'";
              $result = mysqli_query($conn,$sql);             
              $count_expired_v = mysqli_num_rows($result);
            ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="expired_v.php">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <!-- <i class="material-icons">info_outline</i> -->
                    <i class="fa fa-exclamation-triangle"></i>
                  </div>
                  <p class="card-category">Expired Vehicles</p>
                  <h3 class="card-title"><?= $count_expired_v; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>Get More Details
                  </div>
                </div>
              </div>
            </a>
            </div>

            <?php
              $sql = "SELECT * FROM vehicle WHERE customer_id = '$cust'";
              $result = mysqli_query($conn,$sql);
              $count_total_v = mysqli_num_rows($result);
            ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="all_v.php">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-car"></i>
                  </div>
                  <p class="card-category">Total Vehicles</p>
                  <h3 class="card-title"><?= $count_total_v; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>Get More Details
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Top Users</h4>
                  <p class="card-category">Top 10 users with highest number of active vehicles</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>User</th>
                      <th>Location</th>
                      <th>Contact No</th>
                      <th style="text-align: center;">Vehicles</th>
                    </thead>
                      <tbody>
                      <!-- jass new start -->
                      <?php
                        if(isset($_POST["search"]))
                        {
                        echo '<script>
                        $(document).ready(function(){
                      document.getElementById("pagination_div").style.display="none";
                    }); 
                    </script>';
                    $s_item = strtolower($_POST["search"]);
                        $rpp=10;
                        $sql="SELECT * FROM user WHERE customer = '$cust'";
                        // $sql = "SELECT * FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.customer_id = '$cust'";
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

                    $sql="SELECT * FROM user WHERE customer = '$cust'";
                    $result=mysqli_query($conn,$sql);

                    while($row=mysqli_fetch_assoc($result))
                        {
                          if(strpos(strtolower($row["email"]), $s_item)!==false)
                          {
                              //Get Status Type
                              if($row["status"]=="1")
                              {
                                $st='<span style="color:green">Active</span>';
                              }
                              else
                              {
                                $st='<span style="color:red">Inactive</span>';
                              }

                          echo '<tr>
                              <td>'.$c.'</td>
                              <td>'.$row["email"].'</td>
                              <td>'.$row["firstname"]." ".$row["lastname"].'</td>
                              <td>'.$row["mobile_no"].'</td>
                              <td style="text-align:center">
                              <span style="padding:10px; background-color:purple; color:white">
                                '.getVehicleCountByUid($row['id'], $row['customer']).'
                              </span>
                              </td>
                              </tr>';
                             $c++;
                          }

                        }
                        }
                        else
                        {
                          $rpp=10;
                        $sql="SELECT * FROM user WHERE customer = '$cust'";
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
                    $c=($page*10)-9;
                    //Getting top users
                    $sql = "SELECT user_id, count(*)
                           FROM vehicle WHERE customer_id = '$cust'
                           GROUP BY user_id
                           ORDER BY count(*) DESC
                           LIMIT 10";
                    $result = mysqli_query($conn,$sql);

                    while($row=mysqli_fetch_assoc($result))
                    {
                       $top_user[]=$row["user_id"];
                    }
                    //$sql='SELECT * FROM user LIMIT ' . $cur_page . ',' .  $rpp;
                    for($i=0;$i<10;$i++)
                    {
                      $sql = "SELECT * FROM user WHERE id='$top_user[$i]' AND customer = '$cust'";
                      $result=mysqli_query($conn,$sql);

                      while($row=mysqli_fetch_assoc($result))
                          {
                                //Get Status Type
                                if($row["status"]=="1")
                                {
                                  $st='<span style="color:green">Active</span>';
                                }
                                else
                                {
                                  $st='<span style="color:red">Inactive</span>';
                                }

                            echo '<tr>
                                <td>'.$c.'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["firstname"]." ".$row["lastname"].'</td>
                                <td>'.$row["mobile_no"].'</td>
                                <td style="text-align:center">
                                <span style="padding:10px; background-color:purple; color:white">
                                  '.getVehicleCountByUid($row['id'],$row['customer']).'
                                </span>
                                </td>
                                </tr>';
                                 $c++;
                          }
                    }
                    
                        }


                      ?>
                      <!-- jass end -->
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer">
        <div class="container-fluid">
         
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>
            <a href="http://www.gaadiwalaonline.com/" target="_blank">Gaadiwalaonline</a> all rights reserved.
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="../../../cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="../../../buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min1c51.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <!-- Sharrre libray -->
  <script src="assets/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {

      $('#facebook').sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('facebook');
        },
        template: '<i class="fab fa-facebook-f"></i> Facebook',
        url: 'https://demos.creative-tim.com/material-dashboard/examples/dashboard.html'
      });

      $('#google').sharrre({
        share: {
          googlePlus: true
        },
        enableCounter: false,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        },
        template: '<i class="fab fa-google-plus"></i> Google',
        url: 'https://demos.creative-tim.com/material-dashboard/examples/dashboard.html'
      });

      $('#twitter').sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        buttons: {
          twitter: {
            via: 'CreativeTim'
          }
        },
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('twitter');
        },
        template: '<i class="fab fa-twitter"></i> Twitter',
        url: 'https://demos.creative-tim.com/material-dashboard/examples/dashboard.html'
      });



      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '../../../connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <script>
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', '../../../connect.facebook.net/en_US/fbevents.js');

    try {
      fbq('init', '111649226022273');
      fbq('track', "PageView");

    } catch (err) {
      console.log('Facebook Track Error:', err);
    }
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>
</html>