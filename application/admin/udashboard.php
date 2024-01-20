<?php include('includes/header.php'); ?>

<?php include('includes/sidebar.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome !!! <?php echo $admData['names']; ?></h3>
        
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
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
