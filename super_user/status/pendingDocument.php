<?php 
	include('includes/header.php');  
	include('includes/sidebar.php');
	include('conn.php');
	$id = $_SESSION['uid'];
	$customer = $_SESSION['customer'];
	$track = getPendingDocument($customer);
	// print_r($track);die();
	$totalV = getTotalV($customer);
  $totalDocRecieved = getTotalDocument($customer);
  $completeDocument = getCompleteDocument($customer);
  $pendingDocument =getPendingDocument($customer);
 ?>
 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3 style="font-size:20px !important">TRACK VEHICLE DETAILS</h3>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Track Vehicle Details</li>
        <li><a href="dashboard.php">Back Track Status</a></li>
      </ol>
    </section><br/>

    <!-- Main content -->
      <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
            </div>
          </div>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" style="display: inline !important" >
                <span style="float: left;  font-size:15px">PENDING DOCUMENTS</span><br>
                    <form action="" method="post" style="display: inline; float: right;">
                        <div class="input-group mb-3" style="display: inline;">
                            <input type="text" class="form-control" placeholder="Search" name="search" style="display:inline !important;width:80%">
                            <div class="input-group-append" style="display: inline !important">
                                <button class="btn btn-outline-secondary" type="submit" id="search_btn1"><i class="fa fa-search"></i></button>
                            </div>
                      <div>
                    </form>
              </h3>
            </div>
			<!-- /.box-header -->
        <style type="text/css">
                @media only screen and (max-width: 900px) {
                    .mob{
                        display: none;
                    }
                }
                  
            @media screen and (max-width: 600px) {
          .searchform {
            width: 80% ! important;
            }
          }
        </style>
          <div class="table-responsive">
            <table id="vehicle_tbl" class="table-bordered table-hover table table-striped" style="width:100%">
					        <thead>
					            <tr>
					                <th style="text-align: center; font-size:12px">Sl.No.</th>
					                <th style="text-align: center; font-size:12px">REGISTRATION NO</th>
					                <th class="mob" style="text-align: center; font-size:12px">OWNER NAME</th>
					                <th style="text-align: center; font-size:12px">ACTION</th>
					            </tr>
					        </thead>
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
                      $sql="SELECT * FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id   WHERE  track.complete = '0' AND vehicle.customer_id = '$customer'";
                      $result=mysqli_query($conn,$sql);
                      
                      $rpp=10;
                      $num_rows = mysqli_num_rows($result);
                      $num_pages = ceil($num_rows/$rpp);
                      if (!isset($_GET['page'])) {
                        $page = 1;
                      } else {
                        $page = $_GET['page'];
                      }
                      $cur_page = ($page-1)*$rpp;
                      $c=1;
                      while($val=mysqli_fetch_assoc($result))
                      {
          						    if($val["is_assigned"]=="true")
          						    {
          						// 	    $data[] = $row;
          						//     }
          						// }
          						// foreach($data as $val)
          						// {

                        if(strpos(strtolower($val["reg_no"]), $s_item)!==false)
                        {
                          ?>
                          <tr>
                                <td style="text-align: center;"><?php echo $c ?></td>
                                <td style="text-align: center;"><?php echo $val['reg_no'] ?></td>

								                <?php
								                $customer = $val['customer_id'];
								                $sql = "SELECT * FROM customer WHERE id = '$customer'";
								                $result = mysqli_query($conn,$sql);
								                $row=mysqli_fetch_assoc($result);
								                $company_name = $row["company_name"];
								                ?>
								                <td class="mob" style="text-align: center;"><?php echo $company_name ;?></td>
                                      <?php echo'  <td style="text-align: center;">
                                      <form action="" method="post">
                                        <input type="hidden" name="trk_id" value="'.$val["vehicle_id"].'">
                                        <input type="hidden" name="trk_num" value="'.$val["reg_no"].'">
                                        <button class="btn btn-primary" type="submit" name="trk_submit">
                                          <i class="fa fa-car"> Track</i>
                                        </button>
                                      </form>
                                        </td>';?>
                            </tr>
                            <?php
                          $c++;
                        }
                        }
                    }

                  }

                  else
                  {
                      $rpp=2;
                      $sql = "SELECT * FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id   WHERE  track.complete = '0' AND vehicle.customer_id = '$customer'";
                      $result = mysqli_query($conn, $sql);
                      $num_rows = mysqli_num_rows($result);
                      $num_pages = ceil($num_rows/$rpp);
                  if (!isset($_GET['page'])) {
                    $page = 1;
                  } else {
                    $page = $_GET['page'];
                  }
                  $cur_page = ($page-1)*$rpp;
                  $c=($page*2)-1;
                  $sql="SELECT * FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id  WHERE  track.complete = '0' AND vehicle.customer_id = '$customer' LIMIT " . $cur_page . ',' .  $rpp;
                  $result = mysqli_query($conn, $sql);

                  while($val=mysqli_fetch_assoc($result))
                      {
      					    if($val["is_assigned"]=="true")
      					    {
      						//     $data[] = $row;
      					 //   }
  		        //       }
  		        //       foreach($data as $val)
  		        //       {     
                          ?>
                          <tr>
                                <td style="text-align: center;"><?php echo $c ?></td>
                                <td style="text-align: center;"><?php echo $val['reg_no'] ?></td>
								                <?php
								                $customer = $val['customer_id'];
								                $sql = "SELECT * FROM customer WHERE id = '$customer'";
								                $result = mysqli_query($conn,$sql);
								                $row=mysqli_fetch_assoc($result);
								                $company_name = $row["company_name"];
								                ?>
								                <td class="mob" style="text-align: center;"><?php echo $company_name ;?></td>
                                      <?php echo'  <td style="text-align: center;">
                                      <form action="" method="post">
                                        <input type="hidden" name="trk_id" value="'.$val["vehicle_id"].'">
                                        <input type="hidden" name="trk_num" value="'.$val["reg_no"].'">
                                        <button class="btn btn-primary" type="submit" name="trk_submit">
                                          <i class="fa fa-car"> Track</i>
                                        </button>
                                      </form>
                                        </td>';?>
                            </tr>
                            <?php
                          $c++;
      					    }
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
                $prev="pendingDocument.php?page=".($page-1);
              }

              if($page==$num_pages)
              {
                $nxt="#";
              }
              else
              {
                $nxt="pendingDocument.php?page=".($page+1);
              }
                echo '<div id="pagination_div" style="margin: 0px auto; text-align: center;">
                  <a href="pendingDocument.php?page=1" style="margin-right: 10%"><i class="fa fa-fast-backward" style="color:grey"></i></a>
              <a href="'.$prev.'" style="margin-right: 10%"><i class="fa fa-backward" style="color:grey"></i></a>
              <b>Page: '.$page.' of '.$num_pages.'</b>
              <a href="'.$nxt.'" style="margin-left: 10%"><i class="fa fa-forward" style="color:grey"></i></a>
              <a href="pendingDocument.php?page='.$num_pages.'" style="margin-left: 10%"><i class="fa fa-fast-forward" style="color:grey"></i></a>
              </div>';
                  ?>
          </div>
        </div>
        </div>

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
        <div id="trk_main" style="text-align: center;">
          <h3 id="reg_no" style="display:inline;font-size:20px !important">Tracking Details</h3>
          <div id="track_frame" class="info-box">
            <!-- track records are loaded here from javascript -->
         </div>
        </div>
          <?php
            if(isset($_POST["trk_submit"]))
            {
              echo '<script>
                      document.getElementById("reg_no").innerHTML="'.$_POST["trk_num"].'";
                      $("#track_frame").load("track_frame.php?id='.$_POST["trk_id"].'");
                      setTimeout(slide, 3000);
                      function slide()
                      {
                        document.getElementById("trk_main").scrollIntoView({ behavior: \'smooth\', block: \'center\' });
                      }
                    </script>';
            }
            else
            {
              $sql="SELECT * FROM display_status WHERE owner_id='$id'";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_assoc($result);
              $row_id=$row["id"];
              echo '<script type="text/javascript">
                      $(document).ready(function(){           
                            $("#track_frame").load("track_frame.php?id='.$row_id.'");
                      });
                    </script>';
            }
          ?>
        </div>
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