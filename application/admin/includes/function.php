<?php
session_start();
error_reporting(E_ALL & E_NOTICE);
	if (isset($_POST['action']) && function_exists($_POST['action'])){
	  echo $_POST['action']();

	} 
	// else {
	//   echo 'Function not Found';
	// }

	function checkLogin()
	{
		require('connection.php');
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$sel_query="Select * from employee where `email` = '".$user."'  AND `password` = '".$pass."'";
		$result = mysqli_query($mysqli,$sel_query);
		// print_r($result);die();
		if($result->num_rows)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['uid'] = $row['id'];
			$_SESSION['eid'] = $row['emp_id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['utype'] = $row['emp_type'];
			$_SESSION['dashboard'] = $row['dashboard'];
			$_SESSION['error'] ='';
			$_SESSION['success'] ='';
			$data['d'] = '1';
			$data['utype'] = $_SESSION['utype'];
			$data['dashboard'] = $_SESSION['dashboard'];
		}
		else
		{
			$data['d'] = '0';
		}
		echo json_encode($data);
	}


	function getAdminDetails($id)
	{
		require('connection.php');
		$sel_query = "SELECT * FROM employee WHERE id='$id'";
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			$row = mysqli_fetch_assoc($result);
			$data = $row;
		}
		else
		{
			$data['error'] = 'Data Not Found';
		}
		return $data;
	}

	function getAllVehicleData()
	{
		require('connection.php');
		$sel_query = "SELECT  user.firstname  , user.lastname, user.id as uid ,vehicle.*   FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id ";
		$result = mysqli_query($mysqli,$sel_query);
// 		print_R($result);die();
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
		

		// print_R($data);die();

		return $data;
	}

	function getAllVehicleDataByUid($id)
	{
		require('connection.php');
		$sel_query = "SELECT  user.firstname  , user.lastname, user.id as uid ,vehicle.*   FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id;
		$result = mysqli_query($mysqli,$sel_query);
		// print_R($result);die();
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
		else
		{
			$data='';
		}

		// print_R($data);die();

		return $data;
	}

	function getVehicleCountByUid($id)
	{
		require('connection.php');
		$sel_query = "SELECT  vehicle.*   FROM `vehicle` WHERE `user_id` = ".$id;
		$result = mysqli_query($mysqli,$sel_query);
		$data = $result->num_rows;
		return $data;
	}


	function getAllDataByIdAjax()
	{
		require('connection.php');
		$table = $_POST['table'];
		$fieldname = $_POST['fieldname'];
		$fielddata = $_POST['fielddata'];
		$sel_query="Select * from ".$table." where `".$fieldname."` = '".$fielddata."'";
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			$row = mysqli_fetch_assoc($result);
			$data = $row;
		}
		else
		{
			$data['error'] = 'Data Not Found';
		}
		// print_r($data);die();
		
		echo json_encode($data);
	}

	function getDataById($table , $fieldname,$fielddata)
	{
		require('connection.php');
		$sel_query="Select * from ".$table." where `".$fieldname."` = ".$fielddata;
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data = $row;
			}
		}
		else
		{
			$data = '';
		}
		
		return $data;
	}

	function getAllDataById($table , $fieldname,$fielddata)
	{
		require('connection.php');
		$sel_query="Select * from ".$table." where `".$fieldname."` = ".$fielddata;
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
			
		}
		
		return $data;
	}

	function getAllData($table )
	{
		require('connection.php');
		$sel_query="Select * from ".$table;
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
		else
		{
			$data = '';
		}
		
		return $data;
	}

	function getAllDataCount($table)
	{
		require('connection.php');
		$sel_query="Select * from ".$table;
		$result = mysqli_query($mysqli,$sel_query);
		$data['count'] = $result->num_rows;
		return $data;
	}

	function getAllUser()
	{
		require('connection.php');
		$sel_query="Select * from `user` ";
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
		else
		{
			$data = '';
		}
		
		return $data;
	}

	
// Blogs details
	function getAllBlog()
	{
		require('connection.php');
		$sel_query="Select * from `blogs` ";
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
		else
		{
			$data = '';
		}
		
		return $data;
	}



	function changePassword()
	{
		require('connection.php');

		if($_POST)
		{
			$oldpass= md5($_POST['oldpass']);
			$newpass= md5($_POST['newpass']);
			$cnewpass= md5($_POST['cnewpass']);
			$sel_query="SELECT * from `administrator` where `id` = '".$_SESSION['uid']."'";
			$result = mysqli_query($mysqli,$sel_query);
			if($result->num_rows)
			{
				$row = mysqli_fetch_assoc($result);
				$oldPassword  = $row['password'];
				$id = $row['id'];
				if($oldPassword == $oldpass)
				{
					if($newpass == $cnewpass)
					{
						$sel_query="UPDATE `administrator` SET `password`='".$newpass."' WHERE `id`='".$id."'";
						if(mysqli_query($mysqli,$sel_query)){
						    $data['res'] = '1';
						    $data['msg'] = 'Updated Successfully';
						} else {
						    $data['res'] = '0';
						    $data['msg'] = 'Not Updated';
						} 
					}
				}
				else
				{
					$data['res'] = '0';
					$data['msg'] = 'You have enterd wrong Old Password';
				}
			}
			echo json_encode($data);
		}
	}

	function insertData($table , $data)
	{
		require('connection.php');

		$key = array_keys($data);
	    $val = array_values($data);
	    $sql = "INSERT INTO ".$table." (" . implode(', ', $key) . ") "
	         . "VALUES ('" . implode("', '", $val) . "')";
	 // print_R($sql);die();
	    if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Inserted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Inserted';
		} 
		return($data);
	}

	function updateData($table, $data, $fieldname,$fielddata)
	{
		require('connection.php');

	    $cols = array();
	 
	    foreach($data as $key=>$val) {
	        $cols[] = "$key = '$val'";
	    }
	    $sql = "UPDATE ".$table." SET " . implode(', ', $cols) . " WHERE `".$fieldname."` = '".$fielddata."'";
	   // print_r($sql);die();
	    if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Updated Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Updated';
		} 
	 
	    return($data);
	}

    function delete($table , $fieldname,$fielddata)
	{
		
		require('connection.php');
		$sel_query="DELETE FROM ".$table." where `".$fieldname."` = ".$fielddata;
		if(mysqli_query($mysqli,$sel_query))
		{
		    $data['res'] = '1';
		    $data['msg'] = 'Deleted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Deleted';
		} 
	 
	    return($data);
	}
	
	function deleteAll($table)
	{
		
		require('connection.php');
		$sel_query="TRUNCATE TABLE  ".$table;
		if(mysqli_query($mysqli,$sel_query))
		{
		    $data['res'] = '1';
		    $data['msg'] = 'Deleted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Deleted';
		} 
	 
	    return($data);
	}



	function changeStatus()
	{
		require('connection.php');

	    $table = $_POST['table'];
		$id = $_POST['id'];
		$status = $_POST['status'];

		if($status ==1)
		{
			$s = 0;
		}
		else
		{
			$s = 1;
		}
		$sel_query="UPDATE `".$table."` SET `status`= '".$s."' where `id` = '".$id."'";
		$result = mysqli_query($mysqli,$sel_query);
		if($result)
		{
			$data = 1;

		}
		else
		{
			$data = 0;
		}
		
		echo json_encode($data);
	}


   //  function blockUser($status)
   //  {
   //  	$sel_query="SELECT * from `user` where `id` = '".$_SESSION['uid']."'";
			// $result = mysqli_query($mysqli,$sel_query);
			// if($result->num_rows)
			// {
   //  }
   
   function documentRecieved()
	{
		require('connection.php');
		// print_r($_POST);die();
		$vid = $_POST['vid'];
// 		$doc = $_POST['doc'];
		$cid = $_POST['cid'];
		$docuid = $_POST['docuid'];
		$docrec = $_POST['docrec'];
		
		$docrec_on = time();
		// $status = '0';
		

		$sql = "INSERT INTO `track` ( `customer_id`, `vehicle_id`, `doc`, `doc_unique_id`, `doc_recieved`, `doc_rec_date_time`, `challan`, `challan_date_time`, `dto_passing`, `dto_date_time`, `mvi_passing`, `mvi_data_time`, `rc_card`, `rc_data_time`, `complete`) " . 
		"VALUES ('".$cid."','".$vid."' ,' ','".$docuid."','" .$docrec."','". $docrec_on."','','','','','','','','','')";
		         // print_r($sql);die();
		 
	    if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Inserted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Inserted';
		} 
		echo json_encode($data);
	}

	function updChallan()
	{
		require('connection.php');
		// print_r($_POST);die();
		$vid = $_POST['vid'];
// 		$doc = $_POST['doc'];
		$challan = $_POST['challan'];
		$challan_date_time = time();

		$sql = "UPDATE `track` SET `challan`='".$challan."',`challan_date_time`='".$challan_date_time."' WHERE `vehicle_id` = '".$vid."'";

		if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Inserted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Inserted';
		} 
		echo json_encode($data);
		
	}

	function updDTO()
	{
		require('connection.php');
		// print_r($_POST);die();
		$vid = $_POST['vid'];
// 		$doc = $_POST['doc'];
		$dto_passing = $_POST['dto_passing'];
		$dto_date_time = time();

		$sql = "UPDATE `track` SET `dto_passing`='".$dto_passing."',`dto_date_time`='".$dto_date_time."' WHERE `vehicle_id` = '".$vid."' ";

		if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Inserted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Inserted';
		} 
		echo json_encode($data);
		
	}

	function updMVI()
	{
		require('connection.php');
		// print_r($_POST);die();
		$vid = $_POST['vid'];
// 		$doc = $_POST['doc'];
		$mvi_passing = $_POST['mvi_passing'];
		$mvi_data_time = time();

		$sql = "UPDATE `track` SET `mvi_passing`='".$mvi_passing."',`mvi_data_time`='".$mvi_data_time."' WHERE `vehicle_id` = '".$vid."'";

		if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Inserted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Inserted';
		} 
		echo json_encode($data);
		
	}

	function updRC()
	{
		require('connection.php');
		// print_r($_POST);die();
		$vid = $_POST['vid'];
// 		$doc = $_POST['doc'];
		$rc_card = $_POST['rc_card'];
		$rc_data_time = time();

		$sql = "UPDATE `track` SET `rc_card`='".$rc_card."',`rc_data_time`='".$rc_data_time."' WHERE `vehicle_id` = '".$vid."' ";

		if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Inserted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Inserted';
		} 
		echo json_encode($data);
		
	}

	function updComp()
	{
		require('connection.php');
		// print_r($_POST);die();
		$vid = $_POST['vid'];
// 		$doc = $_POST['doc'];
		$complete = $_POST['comp'];
		$complete_time = time();
		
		$sql = "UPDATE `track` SET `complete`='".$complete."',`complete_time`='".$complete_time."' WHERE `vehicle_id` = '".$vid."' AND `doc` = '".$doc."'";
		
// 		$sql = "UPDATE `track` SET `complete`='".$complete."' WHERE `vehicle_id` = '".$vid."' ";

		if(mysqli_query($mysqli,$sql))
	    {
		    $data['res'] = '1';
		    $data['msg'] = 'Inserted Successfully';
		} else {
		    $data['res'] = '0';
		    $data['msg'] = 'Not Inserted';
		} 
		echo json_encode($data);
		
	}

	function getTrackDataById($table , $vid)
	{
		require('connection.php');
		$sel_query="Select * from `".$table."` where `vehicle_id` = '".$vid."' ";
		// print_r($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		if($result)
		{
			if($result->num_rows)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$data = $row;
				}
			}
		}
		
		else
		{
			$data = '';
		}
		
		return $data;
	}

	
	
?>