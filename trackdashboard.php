<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php 

$status = $_SESSION['status'];
// print_R($status);die();
if($status == 0)
{
   header('Location:emailVerify.php');
} 
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Document Track Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Document Track Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php
      $id = $_SESSION['uid'];
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
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style="font-size:30px;"><?php echo count($totalDocRecieved); ?></h3>
              <h3 style="font-size:20px;">Total Recieved Documents</h3>
                <!-- <p>Will be expire at 15 days</p> -->
              </div>
              <div class="icon">
                <i class="fa fa-car" style="font-size:60px;"></i>
              </div>
            <a href="totalRecDocument.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3 style="font-size:30px;"><?php echo count($completeDocument); ?></h3>
              <h3 style="font-size:20px;">Delivered / Complete</h3>
                <!-- <p>Will be expire at 15 days</p> -->
              </div>
              <div class="icon">
                <i class="fa fa-id-card" style="font-size:60px;"></i>
              </div>
            <a href="completeDocument.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3 style="font-size:30px;"><?php echo count($pendingDocument); ?></h3>
              <h3 style="font-size:20px;">Pending / Processing</h3>
                <!-- <p>Will be expire at 15 days</p> -->
              </div>
              <div class="icon">
                <i class="fa fa-credit-card" style="font-size:60px;"></i>
              </div>
            <a href="pendingDocument.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
<?php include('includes/footer.php'); ?> 