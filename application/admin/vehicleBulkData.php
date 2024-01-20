<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
?>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload Vehicle  Bulk Data
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upload Vehicle Bulk Data</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="box box-success"  id="userForm" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Upload Vehicle Bulk Data</b></h3>

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
								$k=0;

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
									
										if($i==1+$k)
										{
											file_put_contents('../uploads/vehicle_documents/rc_upload/'.$image_name[$i-1],$imageContents);
										}
										elseif($i==2+$k)
										{
											file_put_contents('../uploads/vehicle_documents/fitness/'.$image_name[$i-1],$imageContents);
										}
										elseif($i==3+$k)
										{
											file_put_contents('../uploads/vehicle_documents/permit/'.$image_name[$i-1],$imageContents);
										}
										elseif($i==4+$k)
										{
											file_put_contents('../uploads/vehicle_documents/insurence/'.$image_name[$i-1],$imageContents);
										}
										elseif($i==5+$k)
										{
											file_put_contents('../uploads/vehicle_documents/speed_limit_device/'.$image_name[$i-1],$imageContents);
										}
										elseif($i==6+$k)
										{
											file_put_contents('../uploads/vehicle_documents/reflective_tape/'.$image_name[$i-1],$imageContents);
										}
										elseif($i==7+$k)
										{
											file_put_contents('../uploads/vehicle_documents/tax_token/'.$image_name[$i-1],$imageContents);
										}
										elseif($i==8+$k)
										{
											file_put_contents('../uploads/vehicle_documents/pollution/'.$image_name[$i-1],$imageContents);
										}
										$i++;

										if($i%8 == 0)
										{
											$k = $k+8;
										}
									
								}

								// print_r($image_name);die();
								//It returns the highest number of rows
								$total_rows = $sheet->getHighestRow();
								//It returns the highest number of columns
								$highest_column = $sheet->getHighestColumn();
								
								echo '<div class="col-sm-12 table-responsive"><center><h4><b/>Data from excel file</b></h4></center>';
								echo '<table id="example" class="table  table-bordered table-hover ">';
								
								$query = "INSERT INTO `vehicle`(`id`, `user_id`, `reg_no`, `mfg_by`, `model`, `mfg_date`, `reg_date`, `rc_upload`, `customer_id`, `fitness_issue_date`, `fitness_expiry_date`, `fitness_document`, `permit_issue_date`, `permit_expiry_date`, `permit_document`, `insurence_issue_date`, `insurence_expiry_date`, `insurence_document`, `sld_issue_date`, `sld_expiry_date`, `sld_document`, `rt_issue_date`, `rt_expiry_date`, `rt_document`, `tt_issue_date`, `tt_expiry_date`, `tt_document`, `pollution_issue_date`, `pollution_expiry_date`, `pollution_document`) VALUES ";
								//Loop through each row of the worksheet
								// $temp  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($sheet['A'],'YYYY-MM-DD' ));
      		// 					$actualdate = date('Y-m-d',$temp) ;
								// $mfg_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($sheet->getValue()));
								// 	print_r($actualdate);
								$j=0;
								for($row =2; $row <= $total_rows; $row++) {

									//$query2 = "UPDATE `user` SET `id` VALUES ";
									//Read a single row of data and store it as a array.
									//This line of code selects range of the cells like A1:D1
									$single_row = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
									// --------------mfg Date---------------------
										if($single_row[0][5])
										{
											$mfg  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][5],'YYYY-MM-DD' ));
											$single_row[0][5] = '';
	      									$single_row[0][5] = date('Y-m-d',$mfg) ;
										}
									// --------------reg Date---------------------
										if($single_row[0][6])
										{
											$reg  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][6],'YYYY-MM-DD' ));
	      									$single_row[0][6] = '';
	      									$single_row[0][6] = date('Y-m-d',$reg) ;
										}
									// --------------fitness issue Date---------------------
										if($single_row[0][9])
										{
											$fitness_i  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][9],'YYYY-MM-DD' ));

	      									$single_row[0][9] = '';
	      									$single_row[0][9] = date('Y-m-d',$fitness_i) ;
										}
									// --------------fitness exp Date---------------------
										if($single_row[0][10])
										{
											$fitness_e  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][10],'YYYY-MM-DD' ));
											$single_row[0][10] = '';
	      									$single_row[0][10]= date('Y-m-d',$fitness_e) ;
										}

									// --------------permit issue Date---------------------
										if($single_row[0][12])
										{
											$permit_i  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][12],'YYYY-MM-DD' ));

	      									$single_row[0][12] = '';
	      									$single_row[0][12] = date('Y-m-d',$permit_i) ;
										}
									// --------------permit exp Date---------------------
										if($single_row[0][13])
										{
											$permit_e  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][13],'YYYY-MM-DD' ));
											$single_row[0][13] = '';
	      									$single_row[0][13]= date('Y-m-d',$permit_e) ;
										}

									// --------------insurence issue Date---------------------
										if($single_row[0][15])
										{
											$insurence_i  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][15],'YYYY-MM-DD' ));

	      									$single_row[0][15] = '';
	      									$single_row[0][15] = date('Y-m-d',$insurence_i) ;
										}
									// --------------insurence exp Date---------------------
										if($single_row[0][16])
										{
											$insurence_e  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][16],'YYYY-MM-DD' ));
											$single_row[0][16] = '';
	      									$single_row[0][16]= date('Y-m-d',$insurence_e) ;
										}

									// --------------sld issue Date---------------------
										if($single_row[0][18])
										{
											$sld_i  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][18],'YYYY-MM-DD' ));

	      									$single_row[0][18] = '';
	      									$single_row[0][18] = date('Y-m-d',$sld_i) ;
										}
									// --------------sld exp Date---------------------
										if($single_row[0][19])
										{
											$sld_e  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][19],'YYYY-MM-DD' ));
											$single_row[0][19] = '';
	      									$single_row[0][19]= date('Y-m-d',$sld_e) ;
										}

									// --------------rt issue Date---------------------
										if($single_row[0][21])
										{
											$rt_i  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][21],'YYYY-MM-DD' ));

	      									$single_row[0][21] = '';
	      									$single_row[0][21] = date('Y-m-d',$rt_i) ;
										}
									// --------------rt exp Date---------------------
										if($single_row[0][22])
										{
											$rt_e  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][22],'YYYY-MM-DD' ));
											$single_row[0][22] = '';
	      									$single_row[0][22]= date('Y-m-d',$rt_e) ;
										}

									// --------------tt issue Date---------------------
										if($single_row[0][24])
										{
											$tt_i  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][24],'YYYY-MM-DD' ));

	      									$single_row[0][24] = '';
	      									$single_row[0][24] = date('Y-m-d',$tt_i) ;
										}
									// --------------tt exp Date---------------------
										if($single_row[0][25])
										{
											$tt_e  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][25],'YYYY-MM-DD' ));
											$single_row[0][25] = '';
	      									$single_row[0][25]= date('Y-m-d',$tt_e) ;
										}

									// --------------pollution issue Date---------------------
										if($single_row[0][27])
										{
											$pollution_i  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][27],'YYYY-MM-DD' ));

	      									$single_row[0][27] = '';
	      									$single_row[0][27] = date('Y-m-d',$pollution_i) ;
										}
									// --------------pollution exp Date---------------------
										if($single_row[0][28])
										{
											$pollution_e  = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($single_row[0][28],'YYYY-MM-DD' ));
											$single_row[0][28] = '';
	      									$single_row[0][28]= date('Y-m-d',$pollution_e) ;
										}



										
									$single_row[0][7] .= $image_name[0 + $j];
									$single_row[0][11] .= $image_name[1 + $j];
									$single_row[0][14] .= $image_name[2 + $j];
									$single_row[0][17] .= $image_name[3 + $j];
									$single_row[0][20] .= $image_name[4 + $j];
									$single_row[0][23] .= $image_name[5 + $j];
									$single_row[0][26] .= $image_name[6 + $j];
									$single_row[0][29] .= $image_name[7 + $j];
									// echo "<pre>";print_r($image_name);die();
									$j= $j+8;
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
									// echo "<pre>";print_r($query);die();
								}
								$query = substr($query, 0, -1);
								echo '</table></div>';
								
								// At last we will execute the dynamically created query an save it into the database
								mysqli_query($mysqli, $query);
								if(mysqli_affected_rows($mysqli) > 0) {
									echo '<span class="msg"><center><b style="color:red;">Database table updated!</b></center></span>';
									$_SESSION['success'] = "Database table updated!";
								} else {
									// echo mysqli_error($mysqli);
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
