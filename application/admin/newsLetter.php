<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	
	$id = $_SESSION['aid'];
	$emp_data = getAllData('newsletter');
	
	

 ?>  


 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Newsletter Management  |
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Newsletter Management</li>
      </ol>
    </section><br/>

    <!-- Main content -->
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
						<div><input type="checkbox" class="checkall" id="selectAll"> <b>&nbsp;&nbsp;&nbsp;Select all</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk Email</button><b><p id="result" style="color:green;"></p></b></div><br/>
						<table id="example" class="table-bordered table-hover" style="width:100%">
					        <thead>
					            <tr>
					                <th>Sl.No.</th>
					                <th>Select</th>
					                <th>Email</th>
					                <th>Created On</th>
					                <th>Message Status</th>
					                <th>Last Sent On</th>
					                <!--<th>Action</th>-->
					                
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
								                <td>
													<input type="checkbox" name="single_select" class="single_select case" data-email="'<?php echo  $val["email"]; ?>'" data-name="<?php echo  substr($val["email"], 0, strpos($val["email"], '@')); ?>'" />
												</td>
								                <td><?php echo $val['email'] ?></td>
								                <td><?php echo date('d-m-Y',strtotime($val['created_on'])) ?></td>
								                <td><?php echo $val['msg_status'] ?></td>
								                <td><?php echo date('d-m-Y',strtotime($val['last_sent_on'])) ?></td>
								                
												<!--<td>-->
												<!--	<button type="button" name="email_button" class="btn btn-primary btn-sm email_button" id="<?php echo $c ; ?>" data-email="<?php echo $val["email"]; ?>" data-name="<?php echo substr($val["email"], 0, strpos($val["email"], '@')); ?>" data-action="single">Send Single</button>-->
												<!--</td>-->
												<!--<td><?php echo date('d-m-Y'); ?></td>			                	-->
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
					                <th>Select</th>
					                <th>Email</th>
					                <th>Created On</th>
					                <th>Message Status</th>
					                <th>Last Sent On</th>
					                <!--<th>Action</th>-->
					                <!--<th>Last Send On</th>-->
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
		var table="newsletter";
		$.ajax({
			url:"send_mail.php",
			method:"POST",
		
			data:{email_data:email_data , table:table},
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