<aside class="main-sidebar" style="background-color: rgba(14,26,53,1) !important;" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php 
                
            if($user_data['profile_pic'])
            {
                $re = '/https/m';
                $str = $user_data['profile_pic'];
                preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
                if($matches)
                {
                  $img = $user_data['profile_pic'];
                }
                else
                {
                  $img = "uploads/profile_pic/".$user_data['profile_pic'];

                }
            }
            else
            {
                $img =  "assets/images/no_image.png";
            }
          ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $img; ?>" class="img-circle" alt="User Image" style="height:50px !important;width:50px !important;">
        </div>
        <div class="pull-left info">
          <p id="unames" style="text-transform: capitalize;"><?php echo $user_data['firstname']." ".$user_data['lastname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
              <ul class="sidebar-menu" data-widget="tree">
               
                <li class="treeview">
                  <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li ><a href=""><i class="fa fa-circle-o"></i> Dashboard</a></li>
           
        
                    <li><a href="myProfile.php"><i class="fa fa-circle-o"></i> My Profile</a></li>
                    <li><a href="changePassword.php"><i class="fa fa-circle-o"></i> Change Password</a></li>
                  </ul>
                </li>

                <li class="treeview">
                <a href="#">
                    <i class="fa fa-crosshairs"></i> <span>Fleet Dashboard</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="getVehicleDetails.php"><i class="fa fa-circle-o"></i> Fleet Details</a></li>
                    
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-crosshairs"></i> <span>Real time tracking</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="rto/totalVehicle.php"><i class="fa fa-circle-o"></i>Status</a></li>
                    
                  </ul>
                </li>
               <?php
               if($_SESSION['user_prev']=="fleet")
                {
                  echo '<script>document.getElementById("status").style.display="none";</script>';
                }
                ?>

                
            <!--    <li class="treeview">-->
            <!--      <a href="#"><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
            <!--         Follow Us-->
                    
            <!--      </a>-->
            <!--      <ul class="list-inline social-icon-alt" sty>-->
            <!--<li class=list-inline-item><a class=hover-ripple href='https://www.facebook.com/gaadiwalaonline' target="_blank"style="margin-left:20px;"><i class="fa fa-facebook"></i></a></li>-->
            <!--<li class=list-inline-item><a class=hover-ripple href='https://www.twitter.com/gaadiwalaonline' target="_blank"><i class="fa fa-twitter"></i></a></li>-->
            <!--<li class=list-inline-item><a class=hover-ripple href='https://www.linkedin.com/company/gaadiwalaonline-com/about' target="_blank"><i class="fa fa-linkedin"></i></a></li>-->
            <!--<li class=list-inline-item><a class=hover-ripple href='https://www.instagram.com/gaadiwalaonlineindia/?hl=en' target="_blank"><i class="fa fa-instagram"></i></a></li> </ul>-->
                  
            <!--    </li>-->
                
                
                

                
              </ul>
            
    </section>
    <!-- /.sidebar -->
  </aside>