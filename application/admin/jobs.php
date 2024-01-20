<?php 
  include('includes/header.php');  
  include('includes/sidebar.php'); 
  include('conn.php');
  $jobs_data = getAllData('jobs');
  if($_POST)
    {
      // print_r($_FILES);die();
      if(isset($_POST['add']))
      {
        $data['job_title'] = $_POST['job_title'];
        $data['job_description'] = $_POST['job_description'];
        $data['location'] = $_POST['location'];
        $data['skill'] = $_POST['skill'];
        $data['experience'] = $_POST['experience'];
        $data['valid_till'] = $_POST['valid_till'];
        $data['status']= '0';
        // print_R($data);die();
        $ins = insertData('jobs', $data);
        
        if($ins['res'] == 1)
        {
          $_SESSION['success'] = $ins['msg'];
          echo '<meta http-equiv="refresh" content="1">';
        }
      }
    }
 ?>  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size: 15px">
       JOB MANAGEMENT  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jobs Management</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">ADD NEW JOBS</p></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            JOB TITLE</label>
                        <div class="col-sm-4">
                            <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Title" required="required"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">JOB DESCRIPTION</label>
                        <div class="col-sm-10">
                           <textarea name="job_description" cols="7" class="form-control" placeholder="Job Description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">VALID TILL</label>
                        <div class="col-sm-4">
                            <div class="input-group date" data-provide="datepicker" >
                                <input type="text" class="form-control"  name="valid_till" id="valid_till"   required="required" placeholder="Valid Till" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">JOB LOCATION</label>
                        <div class="col-sm-4">
                            <input type="text" name="location" class="form-control" id="location" placeholder="Location" required="required"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">SKILL</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="skill" id="skill" placeholder="Skill" required="required" />
                        </div>

                        <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">EXPERIENCE</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="experience" id="experience" placeholder="Required Experience" required="required" />
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='add' value="Add Jobs" class="submit btn btn-primary ">
                        </div>
                    </div>
                </form>
			</div>
				<!-- /.box-body -->
	    </div>
      	<div class="box box-success" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">JOB DETAILS</p></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
                        <!--     start change jass -->
                                <form action="" method="post">
                                    <div class="input-group mb-3" style="display: inline;">
                                        <input type="text" class="form-control" placeholder="Search" name="search" style="width: 20%">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                                            <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Jobs</a>
                                        </div>
                                  <div>
                                </form>
				<div class="table-responsive">
					<table id="job_tbl" class="table-bordered table-hover table table-striped" style="width:100%">
				        <thead>
				            <tr>
				                <th style="text-align:center; font-size:12px">SL.No.</th>
				                <th style="text-align:center; font-size:12px">TITLE</th>
				                <th style="text-align:center; font-size:12px">LOCATION</th>
				                <th style="text-align:center; font-size:12px">SKILL</th>
				                <th style="text-align:center; font-size:12px">EXPERIENCE</th>
				                <th style="text-align:center; font-size:12px">VALID TILL</th>
                               <th style="text-align:center; font-size:12px">CREATED ON</th>
				                <th style="text-align:center; font-size:12px">STATUS</th>
                                <th style="text-align:center; font-size:12px">VIEW</th>
                                <th style="text-align:center; font-size:12px">EDIT</th>
                                <th style="text-align:center; font-size:12px">DELETE</th>
				            </tr>
				        </thead>
                  <tbody>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
                      $sql = "SELECT * FROM jobs";
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
                  $sql='SELECT * FROM jobs';
                  $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result))
                  {
                    if(strpos(strtolower($row["job_title"]), $s_item)!==false)
                        {
                            //Get Status Type
                            if($row["status"]=="1")
                            {
                              $st='<span class="btn btn-success">Active</span>';
                            }
                            else
                            {
                              $st='<span class="btn btn-danger">Inactive</span>';
                            }
                            echo '<tr>
                                <td style="text-align:center">'.$c.'</td>
                                <td style="text-align:center">'.$row["job_title"].'</td>
                                <td style="text-align:center">'.$row["location"].'</td>
                                <td style="text-align:center">'.$row["skill"].'</td>
                                <td style="text-align:center">'.$row["experience"].'</td>
                                <td style="text-align:center">'.date('d-m-Y',strtotime($row['valid_till'])).'</td>
                                <td style="text-align:center">'.date('d-m-Y',strtotime($row['created_on'])).'</td>
                                <td><a onclick="changeStatus('.$row['status'].' , '.$row['id'].' )" id="status">'.$st.'</a></td>
                                <td><a href= "viewJobsDetails.php?id='.$row['id'].'"><i style="color:grey" class="fa fa-eye"></i></a></td>
                                <td><a href= "editJobsDetails.php?id='.$row['id'].'"><i style="color:grey" class="fa fa-wrench"></i></a></td>
                                <td><a href= "deleteJobsDetails.php?id='.$row['id'].'"><i style="color:grey" class="fa fa-trash"></i></a></td>';
                                
                            echo '<tr>';
                            $c++;
                        }
                    }
                    }
                    else
                    {
                      $rpp=10; 
                      $sql = "SELECT * FROM jobs";
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
                  $sql='SELECT * FROM jobs LIMIT ' . $cur_page . ',' .  $rpp;
                  $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result))
                  {
                           //Get Status Type
                            if($row["status"]=="1")
                            {
                              $st='<span class="btn btn-success">Active</span>';
                            }
                            else
                            {
                              $st='<span class="btn btn-danger">Inactive</span>';
                            }
                            echo '<tr>
                                <td style="text-align:center">'.$c.'</td>
                                <td style="text-align:center">'.$row["job_title"].'</td>
                                <td style="text-align:center">'.$row["location"].'</td>
                                <td style="text-align:center">'.$row["skill"].'</td>
                                <td style="text-align:center">'.$row["experience"].'</td>
                                <td style="text-align:center">'.date('d-m-Y',strtotime($row['valid_till'])).'</td>
                                <td style="text-align:center">'.date('d-m-Y',strtotime($row['created_on'])).'</td>
                                <td><a onclick="changeStatus('.$row['status'].' , '.$row['id'].' )" id="status">'.$st.'</a></td>
                                <td><a href= "viewJobsDetails.php?id='.$row['id'].'"><i style="color:grey" class="fa fa-eye"></i></a></td>
                                <td><a href= "editJobsDetails.php?id='.$row['id'].'"><i style="color:grey" class="fa fa-wrench"></i></a></td>
                                <td><a href= "deleteJobsDetails.php?id='.$row['id'].'"><i style="color:grey" class="fa fa-trash"></i></a></td>';
                            echo '</tr>';
                            $c++;
                  }
                    }
                    ?>
                  </tbody>
              </table>
              <?php
              if($page==1)
              {
                $prev="#";
              }
              else
              {
                $prev="jobs.php?page=".($page-1);
              }

              if($page==$num_pages)
              {
                $nxt="#";
              }
              else
              {
                $nxt="jobs.php?page=".($page+1);
              }
                  echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
                  <a href="jobs.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
              <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
              <b>Page: '.$page.' of '.$num_pages.'</b>
              <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
              <a href="jobs.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
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
        CKEDITOR.editorConfig = function (config) {
		    config.extraPlugins = 'confighelper';
		};
        CKEDITOR.replace('job_description'); 
    });

	function changeStatus(status,id)
	{
		$.msgBox({
            title: "Are You Sure",
            content: 'you want to change the Status ??',
            type: "confirm",
            buttons: [{ value: "Yes" }, { value: "No" }, { value: "Cancel"}],
            success: function (result) 
            {
                if (result == "Yes") 
                {
                	var table = 'jobs';
                    $.ajax({
						url : 'includes/function.php',
						type : 'post',
						data : {action:'changeStatus' ,id:id , status:status, table:table},
						success:function(data)
						{
							if(data == 1)
							{
								showSuccessMsgBox('Status Change Successfully');
								setTimeout("window.location.reload()",1000);
							}
						}
					})
                }
            }
        });
	}
	function getEmpDet(id)
	{
		var fielddata = id;
		var fieldname = 'id';
		var table = 'employee';
            $.ajax({
				url : 'includes/function.php',
				type : 'post',
				data : {action:'getAllDataByIdAjax' , table:table,fieldname:fieldname , fielddata:fielddata},
				success:function(data)
				{
					var obj = jQuery.parseJSON(data);
					$('#email').val(obj.email);
				}
			})
        }
</script>