<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');

// 	$id = $_GET['id'];
	$jobs_data = getDataById('super_admin','id',1);

	if($_POST)
    {
      // print_r($_FILES);die();
      if(isset($_POST['edit']))
      {
        
        $data['location'] = $_POST['location'];
       
        
        $up = updateData('super_admin', $data, 'id','1');
        if($up['res'] == 1)
		{
			$_SESSION['success'] = $up['msg'];
			// echo '<meta http-equiv="refresh" content="1">';
            echo "<meta http-equiv='refresh' content='1;url=olaLocation.php'>";
		}
      }
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ola Location  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ola Location</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Ola Location</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>

					
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label">
                            Location</label>
                        <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" id="location" placeholder="Title" required="required" value="<?php echo $jobs_data['location']; ?>"  />
                        </div>

                        
                    </div>

                    

                    
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='edit' value="Edit " class="submit btn btn-primary ">
                               
                            <!-- <button type="reset" class="submit btn btn-default btn-sm">
                                Cancel</button> -->
                        </div>
                    </div>
                </form>
			</div>
				<!-- /.box-body -->
	    </div>
        
      	
    </section>
    <!-- /.content -->
  </div>
<?php include('includes/footer.php'); ?>
<?php include('includes/commonFooter.php');?>

 <?php
 // print_R($_SESSION);die();
 	// $_SESSION['success'] = '';
 	// $_SESSION['error'] = '';
	if($_SESSION)
	{
		if($_SESSION['error'])
		{
			$msg = $_SESSION['error'];
			echo "<script> showErrorMsgBox('".$msg."');</script>";
			$_SESSION['error'] = '';
		}
		if($_SESSION['success'])
		{
			$msg = $_SESSION['success'];
			echo "<script> showSuccessMsgBox('".$msg."');</script>";
			$_SESSION['success'] = '';
		}
	}

	
?>