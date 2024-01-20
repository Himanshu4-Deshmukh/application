<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include_once("conn.php");
	
	$id = $_SESSION['uid'];
	
	$track = getTotalDocument($id);
	// print_r($track);die();
	
 ?>  
<style>
.timeline>li>.fa, .timeline>li>.glyphicon, .timeline>li>.ion {
    /*width: 30px;
    height: 30px;
    font-size: 15px;
    line-height: 30px;*/
    width: 20px;
    height: 20px;
    font-size: 12px;
    line-height: 20px;
    position: absolute;
    color: #666;
    background: #d2d6de;
    border-radius: 50%;
    text-align: center;
    left: 18px;
    top: 0;
}
</style>

 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Real-time status RTA applied files Status 
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Real-time status RTA applied files Statu</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        
      	<div class="box box-success" >
			<div class="box-header with-border">
				<h3 class="box-title"><b>Process Status</b></h3>

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
					                <!-- <th>User</th> -->
					                <th>Vehicle No</th>
					                <th>Owner Name</th>
					                <!-- <th>Document</th> -->
					                <th>Doc Recieved</th>
					                <th>Govt Fees </th>
					                <th>RTO Approval</th>
					                <th>Inspection</th>
					                <th>Certificate Process</th>
					                <th>Delivered</th>
					                <th>Excpected Delivery</th>
					                <th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php
					    //     	$rpp=10;
					    //     	$sql="SELECT * FROM track,user,vehicle";
					    //     		$result=mysqli_query($conn,$sql);
					    //     		//number of rows
					    //     		$num_rows = mysqli_num_rows($result);
					    //     		//number of pages
					    //     		$num_pages = ceil($num_rows/$rpp);
					        		
					    //     		// determine which page number visitor is currently on
									// if (!isset($_GET['page'])) {
									//   $page = 1;
									// } else {
									//   $page = $_GET['page'];
									// }
									
									// // determine the sql LIMIT starting number for the results on the displaying page
									// $cur_page = ($page-1)*$rpp;

									// //creating serial number algorithm
									// $c=($page*10)-9;

									// $sql='SELECT * FROM track,user,vehicle LIMIT ' . $cur_page . ',' .  $rpp;
									// $result=mysqli_query($conn,$sql);
									// while($row=mysqli_fetch_assoc($result))
									// {
									// 	//document recevied
									// 	if($row['doc_recieved']=='1')
									// 	{
									// 		$doc_rec='<ul class="timeline">
									//                 		<li><i class="fa fa-circle bg-green"></i></li>
									//                 	</ul>'.date('d-m-Y',($val['doc_rec_date_time']));
									                	
									// 	}
									// 	else
									// 	{
									// 		$doc_rec='<ul class="timeline">
									//                 		<li><i class="fa fa-circle bg-grey"></i></li>
									//                 	</ul>';
									// 	}
									// 	//


									// 	echo '<tr>
									// 			<td>'.$c.'</td>
									// 			<td>'.$row["reg_no"].'</td>
									// 			<td>'.$row["va_customer"].'</td>

									// 		 </tr>';
									// 	$c++;
									// }
					        	<?php 
					        		if($track)
					        		{
					        			$c = 1;
					        			foreach ($track as $val) 
					        			{

					        				?>
						        			<tr>
								                <td><?php echo $c ?></td>
								                
								                <td><?php echo $val['reg_no'] ?></td>
								                <td><?php if($val['va_customer']){ echo $val['va_customer']; }else{echo ""; }?></td>
								                
								                
								                <td>
								                	<?php
								                	if($val['doc_recieved']=='1')
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-green"></i></li>
									                	</ul>
									                	<?php echo date('d-m-Y',($val['doc_rec_date_time']));?>
								                		<?php
								                	}
								                	else
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-grey"></i></li>
									                	</ul>
									                	<?php
								                	}
								                	?>
								                	
								                	
								                </td>
								                <td>

								                	<?php
								                	if($val['challan']=='1')
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-green"></i></li>
									                	</ul>

								                		<?php echo date('d-m-Y',($val['challan_date_time']));?>
								                		<?php
								                	}
								                	else
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-grey"></i></li>
									                	</ul>
									                	<?php
								                	}
								                	?>
								                	
								                </td>
								                <td>
								                	<?php
								                	if($val['dto_passing']=='1')
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-green"></i></li>
									                	</ul>
									                	<?php echo date('d-m-Y',($val['dto_date_time']));?>
								                		<?php
								                	}
								                	else
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-grey"></i></li>
									                	</ul>
									                	<?php
								                	}
								                	?>
								                	
								                </td>
								                <td>
								                	<?php
								                	if($val['mvi_passing']=='1')
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-green"></i></li>
									                	</ul>
									                	<?php echo date('d-m-Y',($val['mvi_data_time']));?>
								                		<?php
								                	}
								                	else
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-grey"></i></li>
									                	</ul>
									                	<?php
								                	}
								                	?>
								                	
								                </td>
								                <td>
								                	<?php
								                	if($val['rc_card']=='1')
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-green"></i></li>
									                	</ul>
									                	<?php echo date('d-m-Y',($val['rc_data_time']));?>
								                		<?php
								                	}
								                	else
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-grey"></i></li>
									                	</ul>
									                	<?php
								                	}
								                	?>
								                	
								                </td>
								                <td>
								                	<?php
								                	if($val['complete']=='1')
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-green"></i></li>
									                	</ul>
									                	<?php echo date('d-m-Y',($val['complete_time']));?>
								                		<?php
								                	}
								                	else
								                	{
								                		?>
								                		<ul class="timeline">
									                		<li><i class="fa fa-circle bg-grey"></i></li>
									                	</ul>
									                	<?php
								                	}
								                	?>
								                	
								                </td>
								                <!-- <?php 
												//$date = "8-1-2019";
												//echo date("d-m-Y",strtotime($date.' +10 days'));
												?>
												<?php //echo date('d-m-Y  h:i:s' ,($track['doc_rec_date_time'])) ?>
												 -->
								                <td><?php 
								                	$date = date('d-m-Y',($val['doc_rec_date_time']));
												echo date("d-m-Y",strtotime($date.' +10 days'));?></td>
								                
								                <th>
								                	<a href= "viewTrackDocument.php?id=<?php echo $val['vehicle_id'] ?>&doc=<?php echo $val['doc'] ?>" class="btn btn-primary" >Track Document</a> &nbsp;
							                	
								                </th>
								            
								                
								            </tr>
							            	<?php
							            	$c++;
							        	}
					        		}
					        	?>
					        	?>
					        	
					        </tbody>
					        <tfoot>
					            <tr>
					                <th>Sl.No.</th>
					                <!-- <th>User</th> -->
					                <th>Vehicle No</th>
					                <th>Owner Name</th>
					                <!-- <th>Document</th> -->
					                <th>Doc Recieved</th>
					                <th>Challan .................</th>
					                <th>DTO Approval</th>
					                <th>MVI Approval</th>
					                <th>RC Processing</th>
					                <th>Delivered</th>
					                <th>Excpected Delivery</th>
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