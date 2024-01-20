<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	$id = $_SESSION['uid'];
	$user_data = getAllBlog();
    if($_POST)
    {
    	if(isset($_POST['add']))
		{
			$img_upd = '';
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
					$path = "uploads/BlogFile/";
					$path = $path . time().".". $file_ext;
					if(move_uploaded_file($_FILES['img']['tmp_name'], $path))
					{
						$img_upd = time().".". $file_ext;
					}
					else
					{
						$img_upd = '';
						$msg = "Failed to upload image";
					}
				}
				$img = $img_upd;
			}
			if($img)
			{
				$data['blog_image'] = $img;
			}
			$data['blog_title'] = $_POST['blog_title'];
			$data['description'] = $_POST['description'];
			$data['post_date']=  $_POST['post_date'];
			$data['post_time']=  $_POST['post_time'];
			// print_r($data);die();
			$ins = insertData('blogs', $data);
			// print_R($ins);die();
			if($ins['res'] == 1)
			{
				$_SESSION['success'] = $ins['msg'];
				echo '<meta http-equiv="refresh" content="1">';
			}
		}
    }
 ?>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <!-- Content Wrapper. Contains page content -->
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size:15px">BLOG DETAILS<small>Control panel</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blogs Details</li>
      </ol>
    </section><br/>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title">Add New Blog</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<form  class="form-horizontal" action="" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>
					<div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label">Blog Image</label>
                        <div class="col-sm-2">
                            <input type="file"  class="form-control" name="img" id="img" onchange="readURL(this);" />
                            <img  id="blah" src="../assets/images/no_image.png"  alt="your image" height="100" width="100" style="box-shadow:0px 0px 20px 0px;"/>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label">Blog Title</label>
                        <div class="col-sm-4">
                            <input type="text" name="blog_title" class="form-control" id="blog_title" placeholder="Blog Title" required="required"  />
                        </div>
                        <br><br><br>
                        <label for="email" class="col-sm-2 form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="Description" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label">Post Date</label>
                        <div class="col-sm-4">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="post_date" id="post_date"   required="required" placeholder="Date of post" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <label for="email" class="col-sm-2 form-label">Post Time</label>
                        <div class="col-sm-4">
                            <input type="time" name="post_time" class="form-control" id="post_time" placeholder="Time" required="required"  />
                        </div>
                    </div>
                       
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='add' value="Add Blog" class="submit btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
			</div>
				<!-- /.box-body -->
	    </div>
      	<div class="box box-success" >
				<div class="box-header with-border">
					<h3 class="box-title">All Blog Details</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body " style="padding:20px;">
                                <form action="" method="post">
                                    <div class="input-group mb-3" style="display: inline;">
                                        <input type="text" class="form-control" placeholder="Search" name="search" style="width: 20%">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                                            <?php
					                		$emp = $admData['user_master'];
					                		$empp = explode(',', $emp);
					                		foreach($empp as $vals)
					                		{
					                			if($vals == 'add')
					                			{
					                				?>
                                            <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Blog</a>
                                            <?php
						                			}
						                		}
						                	?>
                                        </div>
                                	<div>
                                </form>
                	<style type="text/css">
                		td {
                			word-break:break-all;
                		}
                	</style>
					<div class="table-responsive table table-striped">
						<table id="tbl_user" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align:center; font-size: 12px">Sl.No.</th>
					                <th style="text-align:center; font-size: 12px">IMAGE</th>
					                <th style="text-align:center; font-size: 12px">BLOG TITLE</th>
					                <th style="text-align:center; font-size: 12px">DESCRIPTION</th>
					                <th style="text-align:center; font-size: 12px">POST DATE</th>
					                <th style="text-align:center; font-size: 12px">POST TIME</th>
					                <th style="text-align:center; font-size: 12px">VIEW</th>
					                <th style="text-align:center; font-size: 12px">EDIT</th>
					                <th style="text-align:center; font-size: 12px">DELETE</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<!-- change start jass -->
					        	<?php
				        			if(isset($_POST["search"]))
				        			{
				        			echo '<script>
					        		$(document).ready(function(){
									  document.getElementById("pagination_div").style.display="none";
									});	
									</script>';
									$s_item = strtolower($_POST["search"]);
				        			$rpp=10;
					        		$sql="SELECT * FROM blogs";
					        		$result=mysqli_query($conn,$sql);
					        		$num_rows = mysqli_num_rows($result);
					        		$num_pages = ceil($num_rows/$rpp);
					        		if (!isset($_GET['page'])) {
									  $page = 1;
									} else {
									  $page = $_GET['page'];
									}
									$cur_page = ($page-1)*$rpp;
                                    $c=1;
                                    $sql='SELECT * FROM blogs';
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_assoc($result))
					        		{
					        			if(strpos(strtolower($row["blog_title"]), $s_item)!==false)
					        			{
					        									        			//Get Image path
					        			if($row['blog_image'])
				                		{
				                			$img =  "uploads/BlogFile/".$row['blog_image'];
				                		}
				                		else
				                		{
				                			$img = '../assets/images/no_image.png';
				                		}
				                		//Get Status Type
				                		if($row["status"]=="1")
				                		{
				                			$st='<span style="color:green">Active</span>';
				                		}
				                		else
				                		{
				                			$st='<span style="color:red">Inactive</span>';
				                		}

					        			echo '<tr>
					        					<td style="text-align:center;">'.$c.'</td>
					        					<td style="text-align:center;"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50"></a></td>
					        					<td style="text-align:center;">'.$row["blog_title"].'</td>
					        					<td style="text-align:center;">'.$row["description"].'</td>
					        					<td style="text-align:center;">'.$row['post_date'].'</td>
					        					<td style="text-align:center;">'.$row['post_time'].'</td>
					        					<td style="text-align:center">
                                                            <a href= "viewBlogDetails.php?id='.$row["id"].'" class="" >
                                                                <i style="color:grey" class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                        <td style="text-align:center">                                    
                                                            <a href= "editBlogDetails.php?id='.$row["id"].'" class="" >
                                                                <i style="color:grey" class="fa fa-wrench"></i>
                                                            </a>
                                                        </td>
                                                        <td style="text-align:center">                                    
                                                            <a href= "deleteBlogDetails.php?id='.$row["id"].'" class="" >
                                                                <i style="color:grey" class="fa fa-trash"></i>
                                                            </a>
                                                        </td>';
				        					echo'</tr>';
					        			$c++;
					        			}
					        		}
				        			}
				        			else
				        			{
				        				$rpp=10;
					        		$sql="SELECT * FROM blogs";
					        		$result=mysqli_query($conn,$sql);
					        		$num_rows = mysqli_num_rows($result);
					        		$num_pages = ceil($num_rows/$rpp);
					        		if (!isset($_GET['page'])) {
									  $page = 1;
									} else {
									  $page = $_GET['page'];
									}
									$cur_page = ($page-1)*$rpp;
                                    $c=($page*10)-9;
									$sql='SELECT * FROM blogs LIMIT ' . $cur_page . ',' .  $rpp;
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_assoc($result))
					        		{
					        			//Get Image path
					        			if($row['blog_image'])
				                		{
				                			$img =  "uploads/BlogFile/".$row['blog_image'];
				                		}
				                		else
				                		{
				                			$img = '../assets/images/no_image.png';
				                		}
					        			echo '<tr>
					        					<td style="text-align:center;">'.$c.'</td>
					        					<td style="text-align:center;"><a href="'.$img.'" target="_blank"><img src = '.$img.' height="50" width="50"></a></td>
					        					<td style="text-align:center;">'.$row["blog_title"].'</td>
					        					<td style="text-align:center;">'.$row["description"].'</td>
					        					<td style="text-align:center;">'.$row['post_date'].'</td>
					        					<td style="text-align:center;">'.$row['post_time'].'</td>
					        					<td style="text-align:center">
                                                            <a href= "viewBlogDetails.php?id='.$row["id"].'" class="" >
                                                                <i style="color:grey" class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                        <td style="text-align:center">                                    
                                                            <a href= "editBlogDetails.php?id='.$row["id"].'" class="" >
                                                                <i style="color:grey" class="fa fa-wrench"></i>
                                                            </a>
                                                        </td>
                                                        <td style="text-align:center">                                    
                                                            <a href= "deleteBlogDetails.php?id='.$row["id"].'" class="" >
                                                                <i style="color:grey" class="fa fa-trash"></i>
                                                            </a>
                                                        </td>';
				        				echo '</tr>';
					        			$c++;
					        		}
				        			}
					        	?>
					        	<!-- change end jas -->
					        </tbody>
					    </table>
					    <?php
					    if($page==1)
					    {
					    	$prev="#";
					    }
					    else
					    {
					    	$prev="newBlog.php?page=".($page-1);
					    }

					    if($page==$num_pages)
					    {
					    	$nxt="#";
					    }
					    else
					    {
					    	$nxt="newBlog.php?page=".($page+1);
					    }
		            	echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="newBlog.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: '.$page.' of '.$num_pages.'</b>
					    <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="newBlog.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
					    </div>';
	            		?>
					</div>
				</div>
				<!-- /.box-body -->
	    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>
<?php include('includes/commonFooter.php');?>
 <?php
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
<script type="text/javascript">
	$(document).ready(function(){
        $('#example').DataTable();
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })
    });
</script>