<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');


	$id = $_SESSION['aid'];
	$emp_data = getAllData('email_group');

	if(isset($_GET['did']))
	{
		$did = $_GET['did'];
		$del = delete('email_group','id',$did);

		if($del['res'] == 1)
		{
			$_SESSION['success'] = $del['msg'];

			
		}
       echo  '<script>setTimeout(function () { window.location.href= "bulkEmail.php";}, 3000);</script>' ;
	}

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];

		if($act = 'deleteAll');

		$del = deleteAll('email_group');

		if($del['res'] == 1)
		{
			$_SESSION['success'] = $del['msg'];
	
		}
       echo  '<script>setTimeout(function () { window.location.href= "bulkEmail.php";}, 1500);</script>' ;
	}



	 
?>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload Customer  Bulk Data
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upload Customer Bulk Data</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Upload Customer Bulk Data</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				
				<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label">Upload Data File</label>
                        <div class="col-sm-4">
                        	<input type="file" name="uploadFile" value=""  class="form-control"  required="required" />
                        </div>

                        <div class="col-sm-4">
                        	<p><b style="color:red;">Note : </b>  File must be in <b>XSL</b> or <b>XLSX</b> format.</p>
                        </div>

                        
                    </div>

                       
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='submit' value="Submit" class="submit btn btn-primary btn-sm">
                               
                            <!-- <button type="reset" class="submit btn btn-default btn-sm">
                                Cancel</button> -->
                        </div>
                    </div>
                </form>

                <hr/>

                <?php
					if(isset($_POST['submit'])) {

						if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
							$allowedExtensions = array("xls","xlsx");
							$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
							if(in_array($ext, $allowedExtensions)) {
								$file_size = $_FILES['uploadFile']['size'] / 1024;
								if($file_size < 1024) {
									$file = "uploads/".$_FILES['uploadFile']['name'];
									$isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
									// print_r($isUploaded);die();
									if($isUploaded) {
										include("includes/connection.php");
										include("Classes/PHPExcel/IOFactory.php");
										try {
											//Load the excel(.xls/.xlsx) file
											$objPHPExcel = PHPExcel_IOFactory::load($file);
										} catch (Exception $e) {
											die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
										}
											
										$sheet = $objPHPExcel->getSheet(0);

										$total_rows = $sheet->getHighestRow();
										//It returns the highest number of columns
										$highest_column = $sheet->getHighestColumn();
										
										echo '<div class="col-sm-12 table-responsive"><center><h4><b/>Data from excel file</b></h4></center>';
										echo '<table id="example" class="table  table-bordered table-hover ">';
										
										$query = "insert into `email_group` (`id`, `email`, `msg_status`, `last_sent_on` ) VALUES ";
										//Loop through each row of the worksheet
										for($row =2; $row <= $total_rows; $row++) {
											//Read a single row of data and store it as a array.
											//This line of code selects range of the cells like A1:D1
											$single_row = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
											// $single_row[0][2] .= $image_name[$row-2];
											// echo "<pre>";print_r($single_row);die();
											echo "<thead></thead><tbody><tr>";
											//Creating a dynamic query based on the rows from the excel file
											$query .= "(";
											//Print each cell of the current row
											foreach($single_row[0] as $key=>$value) {
												echo "<td>".$value."</td>";
												$query .= "'".mysqli_real_escape_string($mysqli, $value)."',";
											}
											$query = substr($query, 0, -1);
											$query .= "),";
											echo "</tr></tbody>";
										}
										$query = substr($query, 0, -1);
										echo '</table></div>';
								// 		print_R($query);die();
										// At last we will execute the dynamically created query an save it into the database
										mysqli_query($mysqli, $query);
										if(mysqli_affected_rows($mysqli) > 0) {
											echo '<span class="msg"><center><b style="color:red;">Database table updated!</b></center></span>';
											$_SESSION['success'] = "Database table updated!";
											echo '<meta http-equiv="refresh" content="1">';
										} else {
											echo '<span class="msg"><center><b style="color:red;">Can\'t update database table! try again.</b></center></span>';
											$_SESSION['error'] = "Can\'t update database table! try again.";
										}
										// Finally we will remove the file from the uploads folder (optional) 
										unlink($file);
									} else {
										echo '<span class="msg">File not uploaded!</span>';
										$_SESSION['error'] = "File not uploaded!";
									}
								} else {
									echo '<span class="msg">Maximum file size should not cross 1mb on size!</span>';	
									$_SESSION['error'] = "Maximum file size should not cross 1MB on size!";
								}
							} else {
								echo '<span class="msg">This type of file not allowed!</span>';
								$_SESSION['error'] = "This type of file not allowed!";
							}
						} else {
							echo '<span class="msg">Select an excel file first!</span>';
							$_SESSION['error'] = "Select an excel file first!";
						}
					}
				?>
			</div>
				<!-- /.box-body -->
	    </div>
      	
    </section>
    <!-- /.content -->
     <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="box box-success" >
				<div class="box-header with-border">
					<h3 class="box-title"><b>All Newsletter Details</b></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body " style="padding:20px;">
					
					<!-- <a id="addUser" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Add New Employees</a><br/><br/> -->
					<div class="table-responsive">
						<div><input type="checkbox" class="checkall" id="selectAll"> 
						<b>&nbsp;&nbsp;&nbsp;Select all</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
						<button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk Email</button>
						<!--<b><p id="result" style="color:green;"></p></b>-->
						&nbsp;&nbsp;<a href="bulkEmail.php?act=deleteAll"  class="btn btn-danger">Delete All</a>
						</div><br/>
						<table id="example" class="table-bordered table-hover" style="width:100%">
					        <thead>
					            <tr>
					                <th>Sl.No.</th>
					                <th>Email</th>
					                <!-- <th>Created On</th> -->
					                <th>Select</th>
					                <th>Action</th>
					                <th>Last Send On</th>
					                
					            </tr>
					        </thead>
					        <tbody>
					        	<?php 
					        		if($emp_data)
					        		{
					        			$c = 1;
					        			foreach ($emp_data as $val) 
					        			{
					        				?>
						        			<tr>
								                <td><?php echo $c ?></td>
								                <td><?php echo $val['email'] ?></td>
								                <td>
													<input type="checkbox" name="single_select" class="single_select case" data-email="'<?php echo  $val["email"]; ?>'" data-name="<?php echo  substr($val["email"], 0, strpos($val["email"], '@')); ?>'" />
												</td>
												<td>
													<button type="button" name="email_button" class="btn btn-primary btn-sm email_button" id="<?php echo $c ; ?>" data-email="<?php echo $val["email"]; ?>" data-name="<?php echo substr($val["email"], 0, strpos($val["email"], '@')); ?>" data-action="single">Send Single</button>

													<a href="bulkEmail.php?did=<?php echo $val['id'] ?>" class="btn btn-danger" >Delete</a>
												</td>
												<td><?php echo date('d-m-Y'); ?></td>			                	
								            </tr>
							            	<?php
							            	$c++;
							        	}
					        		}
					        	?>
					        </tbody>
					        <tfoot>
					            <tr>
					                <th>Sl.No.</th>
					                <th>Email</th>
					                <!-- <th>Created On</th> -->
					                <th>Select</th>
					                <th>Action</th>
					                <th>Last Send On</th>
					            </tr>
					        </tfoot>
					    </table>
					</div>
				</div>
				<!-- /.box-body -->
	    </div>

    </section>
  </div>



  <?php 
include('includes/footer.php'); 


?>

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
<script type="text/javascript">

	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })

    });

	
</script>

<script>
$(document).ready(function(){
	// alert($('#selectAll:checked').val());

	$('#selectAll').click(function(){
		$('.case').attr('checked', this.checked);
	})

	$('.email_button').click(function(){
		$(this).attr('disabled', 'disabled');
		var id  = $(this).attr("id");
		var action = $(this).data("action");
		var email_data = [];
		if(action == 'single')
		{
			email_data.push({
				email: $(this).data("email"),
				name: $(this).data("name")
			});
		}
		else
		{
			$('.single_select').each(function(){
				if($(this).prop("checked") == true)
				{
					email_data.push({
						email: $(this).data("email"),
						name: $(this).data("name")
					});
				} 
			});
		}

		var currentdate = new Date(); 
   		var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + "  "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
// 		alert(datetime);
		var table="email_group";
		
		$.ajax({
			url:"send_mail.php",
			method:"POST",
			data:{email_data:email_data,table:table},
			beforeSend:function(){
				$('#'+id).html('Sending...');
				$('#'+id).addClass('btn-danger');
			},
			success:function(data){
				if(data == 'ok')
				{
					$('#'+id).text('Success');
					$('#result').text(' Emails Sent Successfully on '+ datetime);
					$('#'+id).removeClass('btn-danger');
					$('#'+id).removeClass('btn-info');
					$('#'+id).addClass('btn-success');
				}
				else
				{
					$('#'+id).text(data);
				}
				$('#'+id).attr('disabled', false);
			}
		})

	});
});

</script>
