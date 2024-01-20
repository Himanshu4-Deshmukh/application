<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	if($_GET['id'])
	{


	$id = $_GET['id'];
	$user_data = getDataById('blogs','id',$id);
	// $cdata = getAllData('customer');
    if($_POST)
    {
    	if(isset($_POST['upd']))
		{
			if(isset($_FILES['img']))
			{
				$errors= array();
				$file_name = $_FILES['img']['name'];
				$file_size =$_FILES['img']['size'];
				$file_tmp =$_FILES['img']['tmp_name'];
				$file_type=$_FILES['img']['type'];
				// $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
				$tmp = explode('.', $file_name);
				$file_ext = end($tmp);
				$expensions= array("jpeg","jpg","png");
		      
				if(in_array($file_ext,$expensions)=== false)
				{
				 	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152)
				{
				 	$errors[]='File size must be excately 2 MB';
				}

				if(empty($errors)==true)
				{
					if($user_data)
					{
						if(!empty($user_data['blog_image']))
						{
							$oldImg = 'uploads/BlogFile/'.$user_data['blog_image'];
							unlink($oldImg);
						}
					}
					$path = "uploads/BlogFile/";
					$path = $path . time().".". $file_ext;;
					if(move_uploaded_file($_FILES['img']['tmp_name'], $path))
					{
						$img_upd = time().".". $file_ext;
					}
					else{
						$img_upd = '';
						$msg = "Failed to upload image";
					}
				}
			}
		    if(!empty($img_upd))
		    {
		    	$data['blog_title'] = $_POST['blog_title'];
		    	$data['description'] = $_POST['description'];
				$data['post_date'] = $_POST['post_date'];
				$data['post_time'] = $_POST['post_time'];
				$data['blog_image'] = $img_upd;
		    }
		    else
		    {
		    	$data['blog_title'] = $_POST['blog_title'];
		    	$data['description'] = $_POST['description'];
				$data['post_date'] = $_POST['post_date'];
				$data['post_time'] = $_POST['post_time'];
		    }
		    
			$up = updateData('blogs', $data, 'id',$id);
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
<style type="text/css">
   	.form-group input[type=file] {
    opacity: 0;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
}</style>
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
        Edit Blog Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Blog Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="col-sm-4">
			<!-- User Statistics-->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><b><?php echo ucfirst($user_data['blog_title']);?></b></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<?php 
            		if($user_data['blog_image'])
            		{
            			$img = 'uploads/BlogFile/'.$user_data['blog_image'];
            		}
            		else
            		{
            			$img = '../assets/images/no_image.png';
            		}
            	?>
				<div class="box-body">
					<center>
						<img src="<?php echo $img ?>" height="150" width="150" style="box-shadow:0px 0px 20px 0px rgba(0,0,0,0.75);"/>
					</center>
					<br/><br/>
					<table id="example" class="table" style="width:100%">
						<tbody>
							<tr>
								<td><b>Title : </b></td>
								<td><?php echo $user_data['blog_title'];?></td>
							</tr>
							<tr>
								<td><b>Description : </b></td>
								<td><?php echo $user_data['description'];?></td>
							</tr>
							<tr>
								<td><b>Post Date : </b></td>
								<td><?php echo $user_data['post_date'];?></td>
							</tr>
							<tr>
								<td><b>Post Time : </b></td>
								<td><?php echo $user_data['post_time'];?></td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
	      	</div>
			<!-- /.User Statistics-->
		</div>
      	<div class="col-sm-8">
			<!-- User Statistics-->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><b>Update Blog</b></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					
 					
					
					<!-- form -->
						<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data">

							<?php 
							  if($user_data['blog_image'])
							  {
							  	  $img = "uploads/BlogFile/".$user_data['blog_image'];
							  }
							  else
							  {
							  	  $img =  "../assets/images/no_image.png";
							  }
							?>
							<div class="form-group">
                                <label for="mobile" class="col-sm-2 form-label">
                                    Image</label>
                                <div class="col-sm-3">
                                    <input type="file"  class="form-control" name="img" id="img" onchange="readURL(this);" />
                                    <img  id="blah" src="<?php echo $img ?>" alt="your image" height="100" width="100" style="box-shadow:0px 0px 20px 0px;"/>
                                </div>
			                </div>

		                    <div class="form-group row">
		                        <label for="email" class="col-sm-2 form-label">
		                             Blog Title</label>
		                        <div class="col-sm-12">
		                            <input type="text" name="blog_title" class="form-control" id="blog_title" placeholder="Firstname" required="required"  value="<?php echo $user_data['blog_title']?>"/>
		                        </div>
		                        <br><br><br><br>

		                        <label for="email" class="col-sm-2 form-label">
		                            Description</label>
		                        <div class="col-sm-12">
		                            <textarea name="description" id="description" cols="7" class="form-control" placeholder="Blog Description"required="required"><?php echo $user_data['description']?></textarea>
		                        </div>
		                    </div>
		                    <div class="form-group">

		                        <label for="email" class="col-sm-2 form-label">
		                            Post Date</label>
		                        <div class="col-sm-4">
		                            <div class="input-group date" data-provide="datepicker" >
		                                <input type="text" class="form-control"  name="post_date" id="post_date"   required="required" placeholder="Date" value="<?php echo $user_data['post_date']?>">
		                                <div class="input-group-addon">
		                                    <span class="glyphicon glyphicon-th"></span>
		                                </div>
		                            </div>
		                        </div>
		                        <label for="email" class="col-sm-2 form-label">
		                            Post Time </label>
		                        <div class="col-sm-4">
		                            <input type="time"name="post_time" class="form-control" id="post_time" placeholder="Time" required="required" value="<?php echo $user_data['post_time']?>"/>
		                            <!-- //pattern="[7-9]{1}[0-9]{9}" -->
		                        </div>

		                        <!--  -->
		                    </div>

		     
		                       
		                    <div class="row">
		                        <div class="col-sm-5">
		                        </div>
		                        <div class="col-sm-6">
		                            <input type="submit" name='upd' value="Update" class="submit btn btn-primary btn-sm">
		                               
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
