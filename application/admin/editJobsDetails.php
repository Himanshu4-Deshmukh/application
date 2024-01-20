<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');

	$id = $_GET['id'];
	$jobs_data = getDataById('jobs','id',$id);

	if($_POST)
    {
      // print_r($_FILES);die();
      if(isset($_POST['edit']))
      {
        
        $data['job_title'] = $_POST['job_title'];
        $data['job_description'] = $_POST['job_description'];
        $data['location'] = $_POST['location'];
        $data['skill'] = $_POST['skill'];
        $data['experience'] = $_POST['experience'];
        $data['valid_till'] = $_POST['valid_till'];
        // $data['status']= '1';
        
        $up = updateData('jobs', $data, 'id',$id);
        if($up['res'] == 1)
		{
			$_SESSION['success'] = $up['msg'];
			echo '<meta http-equiv="refresh" content="1">';
		}
      }
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Jobs Management  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Jobs Management</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Edit  Jobs</b></h3>

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
                            Job Title</label>
                        <div class="col-sm-4">
                            <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Title" required="required" value="<?php echo $jobs_data['job_title']; ?>"  />
                        </div>

                        
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">
                            Job Description</label>
                        <div class="col-sm-10">
                           <textarea name="job_description"  rows="10" class="form-control" placeholder="Job Description"><?php echo $jobs_data['job_description']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        

                        <label for="email" class="col-sm-2 form-label">
                            Valid till</label>
                        <div class="col-sm-4">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="valid_till" id="valid_till"   required="required" placeholder="Valid Till" value="<?php echo $jobs_data['valid_till']; ?>" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <label for="email" class="col-sm-2 form-label">
                            Job Location</label>
                        <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" id="location" placeholder="Location" required="required" value="<?php echo $jobs_data['location']; ?>"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">
                            Skill</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="skill" id="skill" placeholder="Skill" required="required" value="<?php echo $jobs_data['skill']; ?>"/>
                        </div>

                        <label for="mobile" class="col-sm-2 form-label">
                            Experience</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="experience" id="experience" placeholder="Required Experience" required="required" value="<?php echo $jobs_data['experience']; ?>"/>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='edit' value="Edit Jobs" class="submit btn btn-primary ">
                               
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