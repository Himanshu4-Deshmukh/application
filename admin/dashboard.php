<style>
   .content{
   margin-top: 3%;
   }  

   .fa-user{
    font-size: 80px;
   }
  
</style>


<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php
include_once("conn.php");
$id = $_SESSION['uid'];
$allUser = getAllDataCount('user');
$allVehicle = getAllDataCount('vehicle');
$allEmp = getAllDataCount('employee');
$allCust = getAllDataCount('customer');

//getting total vehicle count for all assigned users
$sql = "SELECT assigned_users FROM employee WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$assigned_users=$row["assigned_users"];
$v_count=0;
$user_emails = explode(', ', $assigned_users);

//Show all vehicles to main admin (id=1) and otherwise choose option
if($id==1)
{
    $v_count = $allVehicle['count'];
}
else
{
    for($i=0;$i<count($user_emails);$i++)
    {
      $sql = "SELECT * FROM user WHERE email='$user_emails[$i]'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $user_id = $row["id"];
      $sql = "SELECT * FROM vehicle WHERE user_id='$user_id'";
      $result = mysqli_query($conn,$sql);
      $rows = mysqli_num_rows($result);
      $v_count = $v_count + $rows;
    }
    
}

//Show all user to main admin (id=1) and otherwise choose user
$u_count=0;
if($id==1)
{
    $u_count = $allUser['count'];
}
else
{
    for($i=0;$i<count($user_emails);$i++)
    {
      $sql = "SELECT * FROM user WHERE email='$user_emails[$i]'";
      $result = mysqli_query($conn,$sql);
      $rows = mysqli_num_rows($result);
      $u_count = $u_count + $rows;
      // print_r($u_count);
    }
    
}

// //Show all customer/company to main admin (id=1) and otherwise choose option
// $c_count=0;
// if($id==1)
// {
//     $c_count = $allCust['count'];
// }
// else
// {
//     for($i=0;$i<count($user_emails);$i++)
//     {
//       $sql = "SELECT * FROM user WHERE email='$user_emails[$i]'";
//       $result = mysqli_query($conn,$sql);
//       $row = mysqli_fetch_assoc($result);
//       $customer_id = $row["customer"];
//       $sql = "SELECT * FROM customer WHERE id='$customer_id'";
//       $result = mysqli_query($conn,$sql);
//       $rows = mysqli_num_rows($result);
//       $c_count = $c_count + $rows;
//       print_r($c_count);
//     }
    
// }




// display table respective to previlages
$sql="SELECT * FROM employee WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1 style="font-size: 15px">
        DASHBOARD
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <?php
       if($row["user_master"]!="")
       {
       ?>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3 class="counter" data-counter="counterup" data-value="<?php echo $u_count; ?>"><?php echo $u_count; ?></h3>
                <p style="font-size: 13px">TOTAL USERS</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            <a href="userDetails.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php
          }
        ?>


        <?php
         if($row["cust_master"]!="")
         {
         ?>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3 class="counter" data-counter="counterup" data-value="<?php echo $allCust['count']; ?>"><?php echo $allCust['count']; ?></h3>
              <p style="font-size: 13px">TOTAL CUSTOMER</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="customerDetails.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      <?php } ?>

      <?php
       if($row["emp_master"]!="")
       {
       ?>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3 class="counter" data-counter="counterup" data-value="<?php echo $allEmp['count']; ?>"><?php echo $allEmp['count']; ?></h3>
              <p style="font-size: 13px">TOTAL EMPLOYEES</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
            <a href="administratorDetails.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php } ?>


      <?php
       if($row["vehicle_master"]!="")
       {
       ?>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 class="counter" data-counter="counterup" data-value="<?php echo $v_count; ?>"><?php echo $v_count; ?></h3>
              <p style="font-size: 13px">TOTAL VEHICLES</p>
              </div>
              <div class="icon">
                <i class="fa fa-car"></i>
              </div>
            <a href="vehicleDetails.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>
      <?php } ?>
      </div>
      <!-- /.row -->
      
    </section>
  </div>
<?php include('includes/footer.php'); ?> 
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="../dist/js/jquery.counterup.min.js"></script>
<script src="../dist/js/jquery.waypoints.min.js"></script>

 <script>
        $(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
