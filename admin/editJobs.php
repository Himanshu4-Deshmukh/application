<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	if($_GET['id'])
	{


	$id = $_GET['id'];
	$jobs = getDataById('jobs','id',$id);
	$cdata = getAllData('customer');
    if($_POST)
    {
    	if(isset($_POST['upd']))
		{
			$data['title'] = $_POST['title'];
			$data['details'] = $_POST['details'];
			$data['skill'] = $_POST['skill'];
			$data['exp'] = $_POST['exp'];
			$data['valid'] = $_POST['valid'];
			$up = updateData('jobs', $data, 'id',$id);
			if($up['res'] == 1)
			{
				$_SESSION['success'] = $up['msg'];
				// header('Location:myProfile.php');
				// sleep(4);
				echo '<meta http-equiv="refresh" content="2">';
			}
		}
    }
	

 ?>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Jobs
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Jobs</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="col-sm-12">
			<!-- User Statistics-->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><b>Edit Jobs</b></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						 
					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					
 					
					
					<!-- form -->
						<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>

					
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label">
                            Job Title</label>
                        <div class="col-sm-4">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" required="required" value="<?php echo $jobs['title']?>" />
                        </div>

                        <label for="email" class="col-sm-2 form-label">
                            Valid till</label>
                        <div class="col-sm-4">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="valid" id="valid"  value="<?php echo $jobs['valid']?>" required="required" placeholder="Valid Till" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">
                            Job Description</label>
                        <div class="col-sm-10">
                           <textarea name="details" cols="7" class="form-control" placeholder="Job Description"><?php echo $jobs['details']?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">
                            Skill</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="skill" id="skill" placeholder="Skill" required="required" value="<?php echo $jobs['skill']?>"/>
                        </div>

                        <label for="mobile" class="col-sm-2 form-label">
                            Experience</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="exp" id="exp" placeholder="Required Experience" required="required" value="<?php echo $jobs['exp']?>"/>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='upd' value="Update Jobs" class="submit btn btn-primary ">
                               
                            <!-- <button type="reset" class="submit btn btn-default btn-sm">
                                Cancel</button> -->
                        </div>
                    </div>
                </form>

					<!-- </div> -->
					<!-- /.form -->
				</div>
				<!-- /.box-body -->
	      	</div>
	      	<br/><br/>
			<!-- /.User Statistics-->
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include('includes/footer.php'); 

}

?>
<script type="text/javascript">
	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })

        CKEDITOR.editorConfig = function (config) {
		    config.extraPlugins = 'confighelper';
		};

        CKEDITOR.replace('details'); 



    });
</script>

