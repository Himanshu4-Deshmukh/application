<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
?>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload User Bulk Data
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upload User Bulk Data</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Upload User Bulk Data</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<form  class="form-horizontal" action="#" id="regForm" method="POST" enctype="multipart/form-data"><br/><br/>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            Vehicle Catagory</label>
                        <div class="col-sm-4">
                            <input type="text" name="reg_no" class="form-control" id="reg_no" placeholder="REGISTRATION NO." required="required"  />
                        </div>

                        <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
                            RTO Code</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="model" id="model" placeholder="MODEL" required="required" />
                        </div>
                    </div>

                   
		                            <div class="form-group row">
		                                <label for="email" class="col-sm-2 form-label" style="font-size: 12px">
		                                    EXPIRY DATE</label>
		                                <div class="col-sm-4">
		                                	<div class="input-group date" data-provide="datepicker" >
				                                <input type="text" class="form-control"  name="pollution_expiry_date" id="expiry_date"  placeholder="EXPIRY DATE" >
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-th"></span>
				                                </div>
				                            </div>
		                                </div>
		                                <label for="mobile" class="col-sm-2 form-label" style="font-size: 12px">
				                            DOCUMENT</label>
				                        <div class="col-sm-2">
				                            <input type="file" class="form-control" name="pollution_document"  />
				                        </div>
		                            </div>
								</div>
							</div>
                        </div>
                    </div>
                       
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name='add' value="Add" class="submit btn btn-primary btn-sm">
                               
                            <!-- <button type="reset" class="submit btn btn-default btn-sm">
                                Cancel</button> -->
                        </div>
                    </div>
                </form>
			
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
							if($isUploaded) {
								include("includes/connection.php");
								include("Classes/PHPExcel/IOFactory.php");
								try {
									//Load the excel(.xls/.xlsx) file
									$objPHPExcel = PHPExcel_IOFactory::load($file);
								} catch (Exception $e) {
									die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
								}
									
								//An excel file may contains many sheets, so you have to specify which one you need to read or work with.
								$sheet = $objPHPExcel->getSheet(0);
								//gets image collection
								$drawings = $objPHPExcel->getSheet()->getDrawingCollection();
								// echo "<pre>";print_r($drawings);die();
								$i = 1;

								foreach($drawings as $drawing)
								{

									if ($drawing instanceof PHPExcel_Worksheet_MemoryDrawing)
									{
										ob_start();
										call_user_func($drawing->getRenderingFunction(),$drawing->getImageResource());
										$imageContents = ob_get_contents();
										ob_end_clean();
										switch ($drawing->getMimeType())
										{
											case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_PNG :
											$extension = 'png';
											break;
											case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_GIF:

											$extension = 'gif';
											break;
											case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_JPEG :

											$extension = 'jpg';
											break;
										}
									} 
									else 
									{
										$zipReader = fopen($drawing->getPath(),'r');
										$imageContents ='';
										while (!feof($zipReader)) 
										{
											$imageContents .= fread($zipReader,1024);
										}
										fclose($zipReader);
										$extension = $drawing->getExtension();
									}

									//Now give your image a name and write it to your folder

									$image_name[] = 'image_'.time()."_".$i.'.'.$extension;

									// print_r($image_name);die();
									file_put_contents('../uploads/profile_pic/'.$image_name[$i-1],$imageContents);
									$i++;
								}

								// print_r($image_name);die();
								//It returns the highest number of rows
								$total_rows = $sheet->getHighestRow();
								//It returns the highest number of columns
								$highest_column = $sheet->getHighestColumn();
								
								echo '<div class="col-sm-12 table-responsive"><center><h4><b/>Data from excel file</b></h4></center>';
								echo '<table id="example" class="table  table-bordered table-hover ">';
								
								$query = "insert into `user` (`id`, `customer`, `firstname`, `lastname`, `email`, `password`, `dob`, `gender`, `user_type` , `profile_pic`, `mobile_no`, `location`, `address`, `ip_address`, `created_on`, `email_verify`, `status`) VALUES ";
								//Loop through each row of the worksheet
								for($row =2; $row <= $total_rows; $row++) {

									//$query2 = "UPDATE `user` SET `id` VALUES ";
									//Read a single row of data and store it as a array.
									//This line of code selects range of the cells like A1:D1
									$single_row = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);

									// --------------dob Date---------------------
										if($single_row[0][6])
										{
											$dob  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][6],'YYYY-MM-DD' ));

	      									$single_row[0][6] = '';
	      									$single_row[0][6] = date('Y-m-d',$dob) ;
										}

										// --------------dob Date---------------------
								// 		if($single_row[0][12])
								// 		{
								// 			$created_on  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][12],'YYYY-MM-DD' ));

	      	// 								$single_row[0][12] = '';
	      	// 								$single_row[0][12] = date('Y-m-d') ;
								// 		}
									$single_row[0][9] .= $image_name[$row-2];
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
								
								// At last we will execute the dynamically created query an save it into the database
								mysqli_query($mysqli, $query);
								if(mysqli_affected_rows($mysqli) > 0) {
									echo '<span class="msg"><center><b style="color:red;">Database table updated!</b></center></span>';
									$_SESSION['success'] = "Database table updated!";
								} else {
									echo mysqli_error($mysqli);
									// echo '<span class="msg"><center><b style="color:red;">Can\'t update database table! try again.</b></center></span>';
									// $_SESSION['error'] = "Can\'t update database table! try again.";
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
