<?php
session_start();
error_reporting(E_ALL);
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
		$sel_query="Select * from user where `email` = '".$user."'  AND `password` = '".$pass."'";
		$result = mysqli_query($mysqli,$sel_query);
		// print_R($result);die();
		if($result->num_rows)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['uid'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['utype'] = $row['user_type'];
			$_SESSION['status'] = $row['status'];;
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
		// sendPHPMailer($to,$subject,$uname,$message);


		// echo $otp;
   
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

	
	function sendmail($to,$subject,$uname,$txt)
	{
		$temp = getAllData('email_temp');
   		// print_r($temp);die();
   		
		$headers = 'From: admin@gaadiwalaonline.com' . "\r\n" .
				    'Reply-To: admin@gaadiwalaonline.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();

		$msg = str_replace("{{name}}", $uname ,$temp[0]['email_temp']);
		$message = str_replace("{{message}}",$txt,$msg); 
		// print_r($message);die();

		if (mail($to, $subject, $message, $headers)) 
		{
		    echo 'Your message has been sent.';
		    $d = '1';
		} 
		else 
		{
			echo 'There was a problem sending the email.';
			$d='0';
		}
		echo json_encode($d);
		// ini_set('SMTP','hosting.secureserver.net');
		// ini_set('smtp_port',25);
		// // ini_set('sendmail_from','sushmitasharma989@gmail.com');
		
		// // ---------------- SEND MAIL FORM ---------------- // send e-mail to ... 
		// $to="me@localhost";
		// $subject="Testing emails from localhost"; 
		// $header="from: gaadiwalaonline.com "; 
		// $header.="to:". $to.'r/n/'; 
		// $message="Hirn"; 
		// $message.="This is test email from my localhostrn"; $message.="Thank you"; 
		// $sentmail = mail($to,$subject,$message,$header); 
		// echo ($sentmail)?"Email Has Been Sent .":"Cannot Send Email "; 

		// //Read more at: https://www.proy.info/how-to-send-php-email-from-localhost/
		
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

	function getTotalV($customer)
	{
		require('connection.php');
		$sel_query = "SELECT * FROM `display_status` WHERE `customer_id`=".$customer;
		// print_R($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
			// $data['count']= $result->num_rows;
		}
		else
		{
			$data= null;
		}
		// else
		// {
		// 	$data['error'] = 'Data Not Found';
		// 	// $data['count']='0';
		// }
		// print_r($data);die();

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
		// print_r($sel_query);die();
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

	function getExpiredVehicleData($id)
	{
		require('connection.php');
		$nowdate = date("Y-m-d", strtotime("+0 days"));
		$sel_query = "SELECT user.firstname , user.lastname, user.id as uid ,vehicle.* FROM `vehicle` LEFT JOIN `user` ON vehicle.user_id = user.id WHERE vehicle.user_id = ".$id." AND (`fitness_expiry_date`<'"  .$nowdate ."' AND `fitness_expiry_date` != '') OR (`permit_expiry_date`<'"  .$nowdate ."' AND `permit_expiry_date` != '') OR (`insurence_expiry_date` <  '"  .$nowdate ."'  AND `insurence_expiry_date` != '' ) OR (`sld_expiry_date` <  '"  .$nowdate ."' AND `sld_expiry_date` != '') OR (`rt_expiry_date` <  '"  .$nowdate ."' AND `rt_expiry_date` != '') OR (`tt_expiry_date` <  '"  .$nowdate ."' AND `tt_expiry_date` != '') OR (`pollution_expiry_date` <  '"  .$nowdate ."' AND `pollution_expiry_date` != '' )";
		
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

	function getTotalDocument($customer)
	{
		require('connection.php');
		$sel_query = "SELECT * FROM `track` LEFT JOIN `vehicle` ON track.vehicle_id = vehicle.id WHERE vehicle.customer_id='$customer'";
		$result = mysqli_query($mysqli,$sel_query);
			// print_R($sel_query);die();
		$data = null;
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
			    if($row["is_assigned"]=="true")
			    {
				    $data[] = $row;
			    }
			}
			
		        return $data;
			
		}

	}

	function getPendingDocument($customer)
	{
		require('connection.php');
		$sel_query = "SELECT * FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id WHERE  track.complete = '0' AND vehicle.customer_id = ".$customer;
		$result = mysqli_query($mysqli,$sel_query);
		$data = null;
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
			    if($row["is_assigned"]=="true")
			    {
				    $data[] = $row;
			    }
		    }
		        return $data;
	    }
	}

	function getCompleteDocument($customer)
	{
		
		require('connection.php');
		$sel_query = "SELECT *  FROM `track` RIGHT JOIN `vehicle` ON track.vehicle_id = vehicle.id WHERE track.complete = '1' AND vehicle.customer_id = ".$customer;
		// print_R($sel_query);die();
		$result = mysqli_query($mysqli,$sel_query);
		$data = null;
		if($result->num_rows)
		{
			while($row = mysqli_fetch_assoc($result))
			{
			    if($row["is_assigned"]=="true")
			    {
				    $data[] = $row;
			    }
			}

		        return $data;
		}
	}

	function getTrackDataById($table , $vid,$doc)
	{
		require('connection.php');
		$sel_query="Select * from `".$table."` where `vehicle_id` = '".$vid."'";
// 		$sel_query="Select * from `".$table."` where `vehicle_id` = '".$vid."' and `doc` = '".$doc."'";
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
			else
			{
				$data = '';
			}
		}
		
		else
		{
			$data = '';
		}
		
		return $data;
	}


	


	
?>