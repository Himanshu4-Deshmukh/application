<?php 
	include('includes1/header.php');  
	include('includes1/sidebar.php');
	include('conn.php');
	
	$id = $_SESSION['uid'];
	$vdata = getExpiredVehicleData($id);
	$udata = getAllUser();
	
	

 ?>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include('includes1/commonFooter.php');?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1 style="font-size: 15px !important;">
        Expired Vehicle  Details -->
        <!--<small>Control panel</small>-->
     <!--  </h1> -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Expired Vehicle Data Details</li>
      </ol>
    </section><br/>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
        <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><b>Add New Vehicle</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			
			
			
	    </div>
      	<div class="box box-success" >
				<div class="box-header with-border">
					<?php 
					 // $totalVehicle = getExpiredVehicleData($customer);
              $expdate = date("Y-m-d", strtotime("+15 days"));
              $nowdate = date("Y-m-d", strtotime("+0 days"));

              $sql = "SELECT * FROM vehicle WHERE (fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$nowdate' AND permit_expiry_date!='1970-01-01' AND permit_expiry_date!=''
                      OR insurence_expiry_date<'$nowdate' AND insurence_expiry_date!='1970-01-01' AND insurence_expiry_date!=''
                      OR sld_expiry_date<'$nowdate' AND sld_expiry_date!='1970-01-01' AND sld_expiry_date!=''
                      OR rt_expiry_date<'$nowdate' AND rt_expiry_date!='1970-01-01' AND rt_expiry_date!=''
                      OR tt_expiry_date<'$nowdate' AND tt_expiry_date!='1970-01-01' AND tt_expiry_date!=''
                      OR pollution_expiry_date<'$nowdate' AND pollution_expiry_date!='1970-01-01' AND pollution_expiry_date!='')
                       AND user_id = '$id'";
						$result = mysqli_query($conn,$sql);
						$totalVehicle = mysqli_num_rows($result);
					?>
					
					<h3 class="box-title"><p style="font-size: 12px">TOTAL VEHICLE  &nbsp; &nbsp;<u style="font-size: 12px;">  <div class="box box-success"  id="userForm" style="display:none;">
			<div class="box-header with-border">
				<h3 class="box-title"><b>Add New Vehicle</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
					    <?php 
					    if(empty($totalVehicle) )
					    { 
					      echo "0";
					    }
					    else
					    { 
					      echo $totalVehicle;
					    } 
					    ?></u></p></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				
				
				<!-- /.box-header -->
			
				
					<div class="table-responsive">
						<table id="vehicle_tbl" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align: center; font-size:12px">S.No.</th>
					                <th class="dm" style="text-align: center; font-size:12px">USER</th>
					                <th style="text-align: center; font-size:12px">REGISTRATION NO</th>
					                <th class="dm" style="text-align: center; font-size:12px">MODEL</th>
					                <th class="dm" style="text-align: center; font-size:12px">MANUFACTURED BY</th>
					                <th class="dm" style="text-align: center; font-size:12px">REGISTRATION DATE</th>
					                <th style="text-align: center; font-size:12px">ACTION</th>
					            </tr>
					        </thead>
					        <!-- <tbody>
					        	<?php 
					        		if($vdata)
					        		{
					        			$c = 1;
					        			foreach ($vdata as $val) 
					        			{

					        				?>
						        			<tr>
								                <td style="text-align: center;"><?php echo $c ?></td>
								                <?php $u = getUserById($val['user_id']) ?>
								                <td style="text-align: center;"><?php echo $u['firstname']." ".$u['lastname']; ?></td>
								                <td style="text-align: center;"><?php echo $val['reg_no'] ?></td>
								                <td style="text-align: center;"><?php echo $val['model'] ?></td>
								                
								                <td style="text-align: center;"><?php echo $val['mfg_by'] ?></td>
								                <td style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['reg_date'])); ?></td>

								                <td style="text-align: center;">
								                	<a href= "viewVehicleDetails.php?id=<?php echo $val['id'] ?>" class="btn btn-primary" >View</a> &nbsp;
							                	
								                </td>
								            
								                
								            </tr>
							            	<?php
							            	$c++;
							        	}
					        		}
					        	?>
					        </tbody> -->
					        <tbody id="tbl_body" class="striped">
					        <?php
					        		if(isset($_POST["search"]))
										{
											//remove pagination div
											echo '<script>
													$(document).ready(function(){
													 document.getElementById("pagination_div").style.display="none";
													});											
												</script>';
											
											$s_item = strtolower($_POST["search"]);
              $expdate = date("Y-m-d", strtotime("+15 days"));
              $nowdate = date("Y-m-d", strtotime("+0 days"));

              $sql = "SELECT * FROM vehicle WHERE (fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$nowdate' AND permit_expiry_date!='1970-01-01' AND permit_expiry_date!=''
                      OR insurence_expiry_date<'$nowdate' AND insurence_expiry_date!='1970-01-01' AND insurence_expiry_date!=''
                      OR sld_expiry_date<'$nowdate' AND sld_expiry_date!='1970-01-01' AND sld_expiry_date!=''
                      OR rt_expiry_date<'$nowdate' AND rt_expiry_date!='1970-01-01' AND rt_expiry_date!=''
                      OR tt_expiry_date<'$nowdate' AND tt_expiry_date!='1970-01-01' AND tt_expiry_date!=''
                      OR pollution_expiry_date<'$nowdate' AND pollution_expiry_date!='1970-01-01' AND pollution_expiry_date!='')
                       AND user_id = '$id'";
											$result=mysqli_query($conn,$sql);
											
											$rpp=10;
											$num_rows = mysqli_num_rows($result);
							        		//number of pages
							        		$num_pages = ceil($num_rows/$rpp);
							        		
							        		// determine which page number visitor is currently on
											if (!isset($_GET['page'])) {
											  $page = 1;
											} else {
											  $page = $_GET['page'];
											}
											
											// determine the sql LIMIT starting number for the results on the displaying page
											$cur_page = ($page-1)*$rpp;

											

											//creating serial number algorithm
											$c=1;
											if($result->num_rows)
											{
											
											while($row=mysqli_fetch_assoc($result))
											{
												$v_data[] = $row;
											}

											foreach ($v_data as $val) 
					        			{


												if(strpos(strtolower($val["reg_no"]), $s_item)!==false)
												{
													?>
													<tr>
								                	<?php
								                	 $user_name = $val['user_id'];
								                	 $sql = "SELECT * FROM user WHERE id = '$user_name'";
								                	 $result = mysqli_query($conn , $sql);
								                	 $row = mysqli_fetch_assoc($result);
								                	 	$first_name = $row["firstname"];
								                	 	$last_name = $row["lastname"];
								                	 ?>

								                <td style="text-align: center;"><?php echo $c ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $first_name;?>  &nbsp;<?php echo $last_name; ?></td>
								                
								                <td style="text-align: center;"><?php echo $val['reg_no'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $val['model'] ?></td>
								                
								                <td class="dm" style="text-align: center;"><?php echo $val['mfg_by'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['reg_date'])); ?></td>

								                <td style="text-align: center;">
								                	<a href= "viewVehicleDetails.php?id=<?php echo $val['id'] ?>">
								                		<i class="fa fa-eye"></i>
								                	</a>
							                	</td>
                
								            </tr>
								            <?php
								        	$c++;

								        	
											}
										}
									}else{}

									}

									else
									{
						        	$rpp=10;
					        		//number of records
              $expdate = date("Y-m-d", strtotime("+15 days"));
              $nowdate = date("Y-m-d", strtotime("+0 days"));

              $sql = "SELECT * FROM vehicle WHERE (fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$nowdate' AND permit_expiry_date!='1970-01-01' AND permit_expiry_date!=''
                      OR insurence_expiry_date<'$nowdate' AND insurence_expiry_date!='1970-01-01' AND insurence_expiry_date!=''
                      OR sld_expiry_date<'$nowdate' AND sld_expiry_date!='1970-01-01' AND sld_expiry_date!=''
                      OR rt_expiry_date<'$nowdate' AND rt_expiry_date!='1970-01-01' AND rt_expiry_date!=''
                      OR tt_expiry_date<'$nowdate' AND tt_expiry_date!='1970-01-01' AND tt_expiry_date!=''
                      OR pollution_expiry_date<'$nowdate' AND pollution_expiry_date!='1970-01-01' AND pollution_expiry_date!='')
                       AND user_id = '$id'";
					        		$result = mysqli_query($conn, $sql);
					        		$num_rows = mysqli_num_rows($result);
					        		//number of pages
					        		$num_pages = ceil($num_rows/$rpp);
					        		
					        		// determine which page number visitor is currently on
									if (!isset($_GET['page'])) {
									  $page = 1;
									} else {
									  $page = $_GET['page'];
									}
									
									// determine the sql LIMIT starting number for the results on the displaying page
									$cur_page = ($page-1)*$rpp;

									//creating serial number algorithm
									$c=($page*10)-9;


									// retrieve selected results from database and display them on page
              $expdate = date("Y-m-d", strtotime("+15 days"));
              $nowdate = date("Y-m-d", strtotime("+0 days"));

              $sql = "SELECT * FROM vehicle WHERE (fitness_expiry_date<'$expdate' AND fitness_expiry_date>'$nowdate'
                      OR permit_expiry_date<'$nowdate' AND permit_expiry_date!='1970-01-01' AND permit_expiry_date!=''
                      OR insurence_expiry_date<'$nowdate' AND insurence_expiry_date!='1970-01-01' AND insurence_expiry_date!=''
                      OR sld_expiry_date<'$nowdate' AND sld_expiry_date!='1970-01-01' AND sld_expiry_date!=''
                      OR rt_expiry_date<'$nowdate' AND rt_expiry_date!='1970-01-01' AND rt_expiry_date!=''
                      OR tt_expiry_date<'$nowdate' AND tt_expiry_date!='1970-01-01' AND tt_expiry_date!=''
                      OR pollution_expiry_date<'$nowdate' AND pollution_expiry_date!='1970-01-01' AND pollution_expiry_date!='')
                       AND user_id = '$id' LIMIT " . $cur_page . ',' .  $rpp;
								
									$result = mysqli_query($conn, $sql);
											if($result->num_rows)
											{

									while($row=mysqli_fetch_assoc($result))
											{
												$v_data[] = $row;
											}

											foreach ($v_data as $val) 
					        			{
													?>
													<tr>
								                	<?php
								                	 $user_name = $val['user_id'];
								                	 $sql = "SELECT * FROM user WHERE id = '$user_name'";
								                	 $result = mysqli_query($conn , $sql);
								                	 $row = mysqli_fetch_assoc($result);
								                	 	$first_name = $row["firstname"];
								                	 	$last_name = $row["lastname"];
								                	 ?>

								                <td style="text-align: center;"><?php echo $c ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $first_name;?>  &nbsp;<?php echo $last_name; ?></td>
								                <td style="text-align: center;"><?php echo $val['reg_no'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo $val['model'] ?></td>
								                
								                <td class="dm" style="text-align: center;"><?php echo $val['mfg_by'] ?></td>
								                <td class="dm" style="text-align: center;"><?php echo date('d-m-Y',strtotime($val['reg_date'])); ?></td>

								                <td style="text-align: center;">
								                	<a href= "viewVehicleDetails.php?id=<?php echo $val['id'] ?>">
								                		<i class="fa fa-eye"></i>
								                	</a>
							                	</td>
								                
								            </tr>
								            <?php
								        	$c++;
									}
								}else{}

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
					    	$prev="getExpVehicleDetails.php?page=".($page-1);
					    }

					    if($page==$num_pages)
					    {
					    	$nxt="#";
					    }
					    else
					    {
					    	$nxt="getExpVehicleDetails.php?page=".($page+1);
					    }
					  

		            	echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
		            	<a href="getExpVehicleDetails.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
					    <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
					    <b>Page: '.$page.' of '.$num_pages.'</b>
					    <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
					    <a href="getExpVehicleDetails.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
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

<?php 
include('includes1/footer.php'); 
?>

<style type="text/css">
	@media only screen and (max-width: 600px) {
  .dm {
  	display: none;
  }
}
</style>
<script type="text/javascript">

	$(document).ready(function(){

        $('#example').DataTable();
        
        // for open add slider form
        $('#addUser').click(function(){
        	$('#userForm').toggle('slow');
        })
    });

</script>