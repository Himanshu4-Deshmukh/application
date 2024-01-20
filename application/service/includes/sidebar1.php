<aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php 
                
            if($user_data['profile_pic'])
            {
                $img = "../uploads/profile_pic/".$user_data['profile_pic'];
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
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="dashboard.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                    <li><a href="myProfile.php"><i class="fa fa-circle-o"></i> My Profile</a></li>
                    <li><a href="changePassword.php"><i class="fa fa-circle-o"></i> Change Password</a></li>
                  </ul>
                </li>

                <!-- <li class="treeview">
                  <a href="#">
                    <i class="fa fa-car"></i> <span>Vehicles Details</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="getVehicleDetails.php"><i class="fa fa-circle-o"></i> Vehicles</a></li>
                    
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-copy"></i> <span>Expired List</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="getExpVehicleDetails.php"><i class="fa fa-circle-o"></i> Expired Data</a></li>
                    
                  </ul>
                </li> -->

                
              </ul>
            
    </section>
    <!-- /.sidebar -->
  </aside>