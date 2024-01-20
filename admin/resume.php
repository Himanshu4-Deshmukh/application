<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	
	$id = $_SESSION['uid'];
	$apply = getAllData('resume');
	
 ?>  


 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Applied Resume Management  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Applied Resume Management </li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="box box-success" >
			<div class="box-header with-border">
				<h3 class="box-title"><p style="font-size: 14px">APPLIED RESUME DETAILS</p></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
				
				
			<!-- /.box-header -->
			<div class="box-body " style="padding:20px;">
				
				<div class="table-responsive">
					<table id="example" class="table-bordered table-hover" style="width:100%">
				        <thead>
				            <tr>
				                <th style="text-align:center; font-size: 12px">Sl.No.</th>
				                <th style="text-align:center; font-size: 12px">POSITION</th>
				                <th style="text-align:center; font-size: 12px">NAME</th>
				                <th style="text-align:center; font-size: 12px">EMAIL ID</th>
				                <th style="text-align:center; font-size: 12px">RESUME</th>
				                <th style="text-align:center; font-size: 12px">SEND ON</th>
				                <th style="text-align:center; font-size: 12px">STATUS</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php 
				        		if($apply)
				        		{
				        			$c = 1;
				        			foreach ($apply as $val) 
				        			{
				        				?>
					        			<tr>
							                <td style="text-align: center;"><?php echo $c ?></td>
							                <?php
							                 $job = getDataById('jobs','id',$val['job_id']);
							                 //print_r($job);die();
							                 if($job)
							                 {
							                     $jobs = $job['job_title'];
							                 }
							                 else
							                 {
							                     $jobs = "Directly Applied";
							                 }
							                ?>
							                <td style="text-align: center;"><?php echo $jobs ?></td>
							                
							                <td style="text-align: center;"><?php echo $val['name'] ?></td>
							                <td style="text-align: center;"><?php echo $val['email'] ?></td>
							                <td style="text-align: center;"><?php 
							                 		$ext = pathinfo($val['cv'], PATHINFO_EXTENSION);

							                 		if($ext =='jpg' || $ext == 'png')
							                 		{
							                 			?>
							                 			<a href="../uploads/resume/<?php echo $val['cv']; ?> " target="_new" ><img src="images/jpg.png" height="50" width="50"></a>
							                 			<?php
							                 		}
							                 		if($ext =='pdf')
							                 		{
							                 			?>
							                 			<a href="../uploads/resume/<?php echo $val['cv']; ?>" target="_new" ><img src="images/pdf.png" height="50" width="50"></a>
							                 			<?php
							                 		}
							                 		if($ext =='doc' || $ext =='docx')
							                 		{
							                 			?>
							                 			<a href="../uploads/resume/<?php echo $val['cv']; ?>" target="_new" ><img src="images/doc.png" height="50" width="50"></a>
							                 			<?php
							                 		}
							                		// echo $val['cv'] ;?></td>
							                <td style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['applied_on'])); ?></td>
							                
							                <th style="text-align: center;"><a  style="display:inline;" onclick="changeStatus('<?php echo $val['status'] ?>' , '<?php echo $val['id'] ?>' )" id="status" class="<?php if($val['status'] =='1'){echo "btn btn-success"; } else{ echo "btn btn-danger"; }  ?>" ><?php if($val['status'] =='1'){echo "Action Taken"; } else{ echo "Pending"; }  ?></a></th>
							                
							            </tr>
						            	<?php
						            	$c++;
						        	}
				        		}
				        	?>
				        </tbody>
				    </table>
				</div>
			</div>
			<!-- /.box-body -->
	    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
                	var table = 'resume';
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
	// }
	
</script>