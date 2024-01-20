<style>
  .main-sidebar{
    position: fixed;
  }
</style>


<?php 
// print_R($_SESSION);die();
$id = $_SESSION['uid'];
$admin = getAdminDetails($id);
// print_r($admin);
?>
<aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php   
          if($admData['emp_img'])
            {
                $img = "../uploads/employee_image/".$admData['emp_img'];
            }
            else
            {
                $img =  "../assets/images/no_image.png";
            }
      ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $img; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p id="unames" style="text-transform:capitalize"><?php echo $admData['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- <?php 
          //$user = $_SESSION['utype'];
          //if($user == 'admin')
          {
            ?> -->
              <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <?php
                 if($admin['dashboard'] != '')
                 {
                  ?>
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
                  <?php
                 }
                 ?>
                

                <?php
                 if($admin['cust_master'] != '')
                 {
                  ?>  
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user"></i> <span>Company Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="customerDetails.php"><i class="fa fa-circle-o"></i> Customer</a></li>
                  </ul>
                </li>
                 <?php
                 }
                 ?>

                 <?php
                 if($admin['emp_master'] != '')
                 {
                  ?>
                <!--  <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user"></i> <span>Employee Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="employeeDetails.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                  </ul>
                </li> -->
                 <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Employee Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="administratorDetails.php"><i class="fa fa-circle-o"></i> Employees</a></li>
                  </ul>
                </li>

                <?php
                 }
                 ?>

                  <?php
                 if($admin['user_master'] != '')
                 {
                  ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user"></i> <span>User Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="userDetails.php"><i class="fa fa-circle-o"></i> User</a></li>
                    
                  </ul>
                </li>
                <?php
                 }
                 ?>

                 <?php
                 if($admin['vehicle_master'] != '')
                 {
                  ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-car"></i> <span>Vehicles Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="vehicleDetails.php"><i class="fa fa-circle-o"></i> Vehicles</a></li>
                    
                  </ul>
                </li>
                
                <!-- <li class="treeview">
                  <a href="#">
                    <i class="fa fa-car"></i> <span>Ola Location</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="olaLocation.php"><i class="fa fa-circle-o"></i> ola locations</a></li>
                    
                  </ul>
                </li> -->
                <?php
                 }
                 ?>

                <?php
                 if($admin['admin_master'] != '')
                 {
                  ?>
               <!-- Administrator menu -->

                <?php
                 }
                 if($admin['other_master'] != '')
                 {
                 ?>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Apply Online Data</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="applyOnlineDetails.php"><i class="fa fa-circle-o"></i> Apply Online</a></li>
                    <li ><a href="applyOnlineFitness.php"><i class="fa fa-circle-o"></i> Apply Online Fitness</a></li>
                    <li ><a href="applyOnlinePermit.php"><i class="fa fa-circle-o"></i> Apply Online Permit</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Job Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="resume.php"><i class="fa fa-circle-o"></i>Applied Resume</a></li>
                    <li ><a href="jobs.php"><i class="fa fa-circle-o"></i> Jobs</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Blog Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="newBlog.php"><i class="fa fa-circle-o"></i>New Blogs</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Contact Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="contact.php"><i class="fa fa-circle-o"></i> Online Contact/Enquiry</a></li>
                  </ul>
                </li>

                
                
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-car"></i> <span>Newsletter Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="newsLetter.php"><i class="fa fa-circle-o"></i> Newsletter</a></li>
                    <li ><a href="bulkEmail.php"><i class="fa fa-circle-o"></i> Group Email send</a></li>
                    
                  </ul>
                </li>

              <?php } 
              if($admin['bulkdata_master'] != '')
                 {
                  ?>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Bulk Data Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li ><a href="userBulkData.php"><i class="fa fa-circle-o"></i> User Bulk Data</a></li>
                    <li ><a href="compBulkData.php"><i class="fa fa-circle-o"></i> Company Bulk Data</a></li>
                    <li ><a href="vehicleBulkData.php"><i class="fa fa-circle-o"></i> Vehicle Bulk Data</a></li>
                  </ul>
                </li>
              <?php } ?>
              </ul>
            <?php
          }
        ?>
      
    </section>
    <!-- /.sidebar -->
  </aside>