<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	
	$id = $_SESSION['uid'];
	
	$track = getCompleteDocument($id);
	// print_r($track);die();
	
 ?>  


 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Track Vehicle Details  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Track Vehicle Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="box box-success" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Track Vehicle Details</b></h3>

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
					                <th>Sl.No.</th>
					                <th>User</th>
					                <th>Vehicle Reg No</th>
					                <th>Document</th>
					                
					                <th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php 
					        		if($track)
					        		{
					        			$c = 1;
					        			foreach ($track as $val) 
					        			{

					        				?>
						        			<tr>
								                <td><?php echo $c ?></td>
								                <td><?php echo $val['firstname']." ".$val['lastname']; ?></td>
								                <td><?php echo $val['reg_no'] ?></td>
								                <td><?php echo ucfirst($val['doc']) ?></td>
								                
								                
								                <th>
								                	<a href= "viewTrackDocument.php?id=<?php echo $val['vehicle_id'] ?>&doc=<?php echo $val['doc'] ?>" class="btn btn-primary" >Track Document</a> &nbsp;
							                	
								                </th>
								            
								                
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
					                <th>User</th>
					                <th>Vehicle Reg No</th>
					                <th>Document</th>
					                
					                <th>Action</th>
					            </tr>
					        </tfoot>
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
                	var table = 'contact';
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