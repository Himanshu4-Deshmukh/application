<?php
session_start();
	if (isset($_POST['action']) && function_exists($_POST['action'])){
	  echo $_POST['action']();

	} 
	// else {
	//   echo 'Function not Found';
	// }
//location fetch code

	function cityData()
	{
		require('connection.php');
		$id = $_POST['id'];
		$sel_query="Select city_name from city where `id` = '".$id."'";
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			$row = mysqli_fetch_assoc($result);
			$data['status'] = true;
			$data['city'] = $row['city_name'];
			$cookie_name = "cityname";
			$cookie_value = $row['city_name'];
			setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
		}
		else
		{
			$data['status'] = false;
			$data['city'] = '';
		}
		echo json_encode($data);
	}
		
//location search code
	function searchCityData()
	{
		require('connection.php');
		$cityName = $_POST['cityName'];
		$sel_query="Select * from city where city_name like '%".$cityName."%'";
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			$row = mysqli_fetch_assoc($result);
			$data['status'] = true;
			$data['msg'] = '<div class="col-md-3" style="margin: 2px; padding:10px; border:1px solid grey; text-align: center; cursor:pointer;" onclick="cityData('.$row['id'].')">'.$row['city_name'].'</div>';
		}
		else
		{
			$data['status'] = false;
			$data['msg'] = 'Service is not available in this location. !';
		}
		echo json_encode($data);
	}	
	
	
	function userRegByAjax()
{
	require('connection.php');
	// print_r($_POST);die();
	$table = $_POST['table'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$mobile_no = $_POST['mobile_no'];
	$password = md5($_POST['password']);
	$created_on = date('Y-m-d');
	$status = '0';
	

	$sql = "INSERT INTO ".$table." ( `firstname`,`email`,`password`,`mobile_no`,`created_on`,`status`) "
	         . "VALUES ('".$firstname."' ,'". $email."','".$password."','" .$mobile_no."','". $created_on."','". $status. "')";
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


	function checkLogin()
	{
		require('connection.php');
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$sel_query="Select * from user where `email` = '".$user."'  AND `password` = '".$pass."'";
		$result = mysqli_query($mysqli,$sel_query);
		// print_R($result);die();
		if($result->num_rows)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['uid'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			
			if($row['user_type'])
			{
			    $_SESSION['utype'] = $row['user_type'];
			}
			else
			{
			    $_SESSION['utype'] = 'user';
			}
			
			$_SESSION['status'] = $row['status'];;
		    $_SESSION['estatus'] = $row['email_verify'];
			$_SESSION['error'] ='';
			$_SESSION['success'] ='';
			$data['d'] = '1';
			$data['utype'] = $_SESSION['utype'];
			$data['status'] = $_SESSION['status'];
		}
		else
		{
			$data['d'] = '0';
		}
		echo json_encode($data);
	}

	function sendOtpEmail()
	{
		require('connection.php');
		$email = $_POST['email'];

		$otp = mt_rand(100000, 999999);
		$_SESSION['evotp'] = $otp;
		$to      = $email;
		$subject = 'Email Verification';
		$parts = explode("@", $to);
		$uname = $parts[0];
		$message = 'Your otp For Email Verification is  '.$otp  ;
		sendMail($to,$subject,$uname,$message);
		// echo $otp;
   
	}

    function sendFpEmail()
	{
		require('connection.php');
		$email = $_POST['email'];

		$otp = mt_rand(100000, 999999);
		$_SESSION['email'] = $email;
		$_SESSION['code'] = $otp;
		$to      = $email;
		$subject = 'Password Reset Link';
		$parts = explode("@", $to);
		$uname = $parts[0];
		$url = "https://gaadiwalaonline.com/dashboard/gwonline/changefpPassword.php?code=".$otp;
		$message = 'Your reset password link is : '.$url;
		sendMail($to,$subject,$uname,$message);
		// sendPHPMailer($to,$subject,$uname,$message);


// 		echo $message;
   
	}

	function changefpPassword()
	{
		require('connection.php');

		if($_POST)
		{
			$email = $_SESSION['email'];
			$password= md5($_POST['password']);
			$cpassword= md5($_POST['cpassword']);
			
				if($password == $cpassword)
				{
					$sel_query="UPDATE `user` SET `password`='".$cpassword."' WHERE `email`='".$email."'";
					if(mysqli_query($mysqli,$sel_query))
					{
					    $data['res'] = '1';
					    $data['msg'] = 'Updated Successfully';
					    $_SESSION['code'] = '';					
					    
					} 
					else 
					{
					    $data['res'] = '0';
					    $data['msg'] = 'Not Updated';
					} 
				}
				else
				{
					$data['res'] = '0';
					$data['msg'] = 'Password and confirm Password did not matched ';
				}
			// }
			echo json_encode($data);
			
		}
	}


    
	function verifyOtpEmail()
	{
		require('connection.php');
		$otp = $_POST['otp'];
		$sotp = $_SESSION['evotp'];

		if($otp == $sotp)
		{
			$datas['email_verify'] = '1';
			$datas['status'] = '1';
			$fielddata = $_SESSION['uid'];
			$upd = updateData('user', $datas, 'id',$fielddata);
			$d=1;
		}
		else
		{
			$d = 0;
		}

		echo json_encode($d);
	}

	
	function sendMail($to,$subject,$uname,$txt)
   	{
   	    // 	$temp = getAllData('email_temp');
   		// print_r($temp);die();
   		
        $headers = 'From: admin@gaadiwalaonline.com' . "\r\n" .
        'Reply-To: admin@gaadiwalaonline.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
// 		$msg = str_replace("{{name}}", $uname ,$temp[0]['email_temp']);
// 		$message = str_replace("{{message}}",$txt,$msg); 
        $message = $txt;
 
		if (mail($to, $subject, $message, $headers)) 
		{
		    $data['msg']='Your message has been sent.';
		    $data['d'] = '1';
		} 
		else 
		{
			$data['msg'] = 'There was a problem sending the email.';
			$data['d']='0';
		}
		echo json_encode($data);
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


	function changePassword()
	{
		require('connection.php');

		if($_POST)
		{
			$oldpass= md5($_POST['oldpass']);
			$newpass= md5($_POST['newpass']);
			$cnewpass= md5($_POST['cnewpass']);
			$sel_query="SELECT * from `user` where `id` = '".$_SESSION['uid']."'";
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
						$sel_query="UPDATE `user` SET `password`='".$newpass."' WHERE `id`='".$id."'";
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
	    $sql = "UPDATE ".$table." SET " . implode(', ', $cols) . " WHERE `".$fieldname."` = ".$fielddata;
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

   //  function blockUser($status)
   //  {
   //  	$sel_query="SELECT * from `user` where `id` = '".$_SESSION['uid']."'";
			// $result = mysqli_query($mysqli,$sel_query);
			// if($result->num_rows)
			// {
   //  }
	

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

	function getExpVehicleDataByUid($id,$field_name)
	{
		require('connection.php');
		$expdate = date("Y-m-d", strtotime("+15 days"));
		$nowdate = date("Y-m-d", strtotime("+0 days"));
		$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND " .$field_name . " <  '"  .$expdate ."' AND " .$field_name . " >  '"  .$nowdate ."' AND " .$field_name . " != '' ";
		// print_r($sel_query);die();
		// SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = 1 AND  fitness_expiry_date  <=  2018-07-13 AND fitness_expiry_date != '' 
		$result = mysqli_query($mysqli,$sel_query);
		// print_R($sel_query);die();
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

		return $data;
	}



function getExpCountVehicle($id,$field_name)
	{
		require('connection.php');
		$expdate = date("Y-m-d", strtotime("+15 days"));
		$nowdate = date("Y-m-d", strtotime("+0 days"));
		
		$sel_query = "SELECT user.firstname , user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND " .$field_name . " <  '"  .$expdate ."' AND " .$field_name . " >  '"  .$nowdate ."' AND " .$field_name . " != '' ";
// 		print_r($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		if(!empty($result->num_rows))
		{
			$data['count'] = $result->num_rows;
		}
		else
		{
			$data['count'] = '0';
		}

		return $data;
	}


// 	function getActiveCountVehicle($id,$field_name)
// 	{
// 		require('connection.php');
// 		$expdate = date("Y-m-d", strtotime("+15 days"));
// 		$nowdate = date("Y-m-d", strtotime("+0 days"));
		
// 		$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND " .$field_name . " >  '"  .$nowdate ."' AND " .$field_name . " != '' ";
// 		// print_r($sel_query);die();
// 		$result = mysqli_query($mysqli,$sel_query);
// 		if(!empty($result->num_rows))
// 		{
// 			$data['count'] = $result->num_rows;
// 		}
// 		else
// 		{
// 			$data['count'] = '0';
// 		}

// 		return $data;
// 	}

// 	function getActiveVehicleData($id,$field_name)
// 	{
// 		$data = '';
// 		require('connection.php');
// 		$expdate = date("Y-m-d", strtotime("+15 days"));
// 		$nowdate = date("Y-m-d", strtotime("+0 days"));
		
// 		$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND " .$field_name . " >  '"  .$nowdate ."' AND " .$field_name . " != '' ";
// 		// print_r($sel_query);die();
// 		$result = mysqli_query($mysqli,$sel_query);
// 		if(!empty($result->num_rows))
// 		{
// 			while($row = mysqli_fetch_assoc($result))
// 			{
// 				$data[] = $row;
// 			}
// 		}
		

// 		return $data;
// 	}

    function getActiveCountVehicle($id,$field_name1)
	{
		require('connection.php');
		$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id."  AND " .$field_name1 . " != '' AND " .$field_name1 . " != '1970-01-01'";
// 		print_r($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
// 		print_R($result);die();
		if(!empty($result->num_rows))
		{
			$data['count'] = $result->num_rows;
		}
		else
		{
			$data['count'] = '0';
		}
// 		print_R($data);die();

		return $data;
	}
	
	function getActiveVehicleData($id,$field_name1)
	{
		// $data = '';
		require('connection.php');
		
		$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id."  AND " .$field_name1 . " != ''  AND " .$field_name1 . " != '1970-01-01' ";
		// $sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id."  AND " .$field_name1 . " != '' AND " .$field_name2 . " != '' ";
		// print_r($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		if(!empty($result->num_rows))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
		

		return $data;
	}

	function getExpiredCountVehicle($id,$field_name)
	{
		require('connection.php');
		$expdate = date("Y-m-d", strtotime("+15 days"));
		$nowdate = date("Y-m-d", strtotime("+0 days"));
		
		$sel_query = "SELECT user.firstname , user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND " .$field_name . " <  '"  .$nowdate ."' AND " .$field_name . " != '1970-01-01 ' AND " .$field_name . " != ' '";
// 		print_r($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		if(!empty($result->num_rows))
		{
			$data['count'] = $result->num_rows;
		}
		else
		{
			$data['count'] = '0';
		}
// 		print_R($sel)
// 
		return $data;
	}

	function getExpirdVehicleData($id,$field_name)
	{
		// $data = '';
		require('connection.php');
		$expdate = date("Y-m-d", strtotime("+15 days"));
		$nowdate = date("Y-m-d", strtotime("+0 days"));
		
		$sel_query = "SELECT user.firstname ,user.lastname , user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND " .$field_name . " <  '"  .$nowdate ."' AND " .$field_name . " != '1970-01-01 ' AND " .$field_name . " != ' '";
		// print_r($sel_query);die();
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
			$data='';
		}
		

		return $data;
	}

// 	function getExpiredVehicleData($id)
// 	{
// 		require('connection.php');
// 		$nowdate = date("Y-m-d", strtotime("+0 days"));
// 		$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND (`fitness_expiry_date`<'"  .$nowdate ."' AND `fitness_expiry_date` != '') OR (`permit_expiry_date`<'"  .$nowdate ."' AND `permit_expiry_date` != '') OR (`insurence_expiry_date` <  '"  .$nowdate ."'  AND `insurence_expiry_date` != '' ) OR (`sld_expiry_date` <  '"  .$nowdate ."' AND `sld_expiry_date` != '') OR (`rt_expiry_date` <  '"  .$nowdate ."' AND `rt_expiry_date` != '') OR (`tt_expiry_date` <  '"  .$nowdate ."' AND `tt_expiry_date` != '') OR (`pollution_expiry_date` <  '"  .$nowdate ."' AND `pollution_expiry_date` != '' )";
		
// 		$result = mysqli_query($mysqli,$sel_query);
// 		// print_R($sel_query);die();
// 		if($result->num_rows)
// 		{
// 			while($row = mysqli_fetch_assoc($result))
// 			{
// 				$data[] = $row;
// 			}
// 		}
// 		else
// 		{
// 			$data='';
// 		}

// 		return $data;
// 	}

    function getExpiredVehicleData($id)
	{
		require('connection.php');
		$nowdate = date("Y-m-d", strtotime("+0 days"));
// 		$sel_query = "SELECT user.firstname , user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = 8 AND `fitness_expiry_date` < '".$nowdate."' AND `permit_expiry_date` < '".$nowdate."' AND insurence_expiry_date < '".$nowdate."' AND sld_expiry_date < '".$nowdate."' AND rt_expiry_date < '".$nowdate."' AND tt_expiry_date < '".$nowdate."' AND pollution_expiry_date < '".$nowdate."'";
    	$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE 
                (`fitness_expiry_date` <  '".$nowdate ."'  AND `fitness_expiry_date` != '') 
                OR (`permit_expiry_date` <  '".$nowdate ."'  AND `permit_expiry_date` != '') 
                OR (`insurence_expiry_date` <  '".$nowdate ."'  AND `insurence_expiry_date` != '') 
                OR (`sld_expiry_date` < '".$nowdate ."'  AND `sld_expiry_date` != '') 
                OR (`rt_expiry_date` <  '".$nowdate ."'  AND `rt_expiry_date` != '') 
                OR (`tt_expiry_date` <  '".$nowdate ."'  AND `tt_expiry_date` != '') 
                OR (`pollution_expiry_date` <  '".$nowdate ."'  AND `pollution_expiry_date` != '') HAVING vehicle.user_id =  '".$id."'";
    	$result = mysqli_query($mysqli,$sel_query);
// 		print_R($sel_query);die();
		// SELECT * FROM `vehicle` WHERE (`fitness_expiry_date` < 2019-01-22 AND ) OR (`permit_expiry_date` < 2019-01-22 ) OR (`insurence_expiry_date`< 2019-01-22) OR (`sld_expiry_date` < 2019-01-22 ) OR (`rt_expiry_date` < 2019-01-22) OR (`tt_expiry_date`< 2019-01-22 ) OR (`pollution_expiry_date`< 2019-01-22 ) HAVING user_id = 8
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

		return $data;
	}

	function getUserById($id)
	{
		require('connection.php');
		$sel_query="Select * from `user` where `id` = ".$id;
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


       function getTotalDocument($id)
	{
		require('connection.php');
		$sel_query = "SELECT track.* , user.id as uid , user.firstname as firstname,user.lastname as lastname,vehicle.id as vid,vehicle.user_id as vuid ,vehicle.reg_no  FROM `track` LEFT JOIN `vehicle` ON track.vehicle_id = vehicle.id  LEFT JOIN  `user` ON vehicle.user_id = user.id WHERE user.id = ".$id;
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
			// $data['count']= $result->num_rows;
		}
// 		else
// 		{
// 			$data['error'] = 'Data Not Found';
// 			// $data['count']='0';
// 		}
		// print_r($data);die();

		return $data;
	}

	function getPendingDocument($id)
	{
		require('connection.php');
		$sel_query = "SELECT track.* , user.id as uid , user.firstname as firstname,user.lastname as lastname,vehicle.id as vid,vehicle.user_id as vuid ,vehicle.reg_no FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id  LEFT JOIN  `user` ON vehicle.user_id = user.id WHERE    track.complete = '0' AND user.id = ".$id;
		// print_R($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
// 		else
// 		{
// 			$data['count']='0';
// 			$data['error'] = 'Data Not Found';
// 		}
		// print_r($data);die();

		return $data;
	}

	function getCompleteDocument($id)
	{
		
		require('connection.php');
		$sel_query = "SELECT track.* , user.id as uid ,user.firstname as firstname,user.lastname as lastname, vehicle.id as vid,vehicle.user_id as vuid ,vehicle.reg_no  FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id  LEFT JOIN  `user` ON vehicle.user_id = user.id WHERE    track.complete = '1' AND user.id = ".$id;
		// print_R($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
// 		else
// 		{
// 			$data['count']='0';
// 			$data['error'] = 'Data Not Found';
// 		}
		// print_r($data);die();

		return $data;
	}

	function getTrackDataById($table , $vid,$doc)
	{
		require('connection.php');
		$sel_query="Select * from `".$table."` where `vehicle_id` = '".$vid."' and `doc` = '".$doc."'";
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