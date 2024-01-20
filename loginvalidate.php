<?php
include_once("conn.php");
session_start();
if(isset($_POST["Submit"]))
{
	$uname = $_POST["uname"];
	$pwd = md5($_POST["pwd"]);

	$sql = "SELECT * FROM user WHERE email='$uname' AND password='$pwd'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_assoc($result);
		$utype=$row["user_type"];
		$status=$row["status"];
		if($status==0)
		{
			echo 'This account is Inactive. Please contact your Administrator!';
		}
		else
		{
			if($utype=='fleet_rto')
			{
				$_SESSION["user_prev"]="fleet_rto";
				$_SESSION['uid'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				echo '<script>window.location.href="dashboard.php";</script>';
			}
			else if($utype=='fleet' or $utype=='')
			{
				$_SESSION["user_prev"]="fleet";
				$_SESSION['uid'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				echo '<script>window.location.href="dashboard.php";</script>';
			}
			else if($utype=='rto')
			{
				$_SESSION["user_prev"]="rto";
				$_SESSION['uid'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				echo '<script>window.location.href="rto/dashboard.php";</script>';
			}
			else if($utype=='management')
			{
				$_SESSION["user_prev"]="management";
				$_SESSION['uid'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['customer'] = $row['customer'];
				echo '<script>window.location.href="management/dashboard.php";</script>';
			}
			else if($utype=='super_user')
			{
				$_SESSION["user_prev"]="super_user";
				$_SESSION['uid'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['customer'] = $row['customer'];
				echo '<script>window.location.href="super_user/dashboard.php";</script>';
			}
			else if($utype=='rtt')
			{
				$_SESSION["user_prev"]="rtt";
				$_SESSION['uid'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['customer'] = $row['customer'];
				echo '<script>window.location.href="rtt/dashboard.php";</script>';
			}
			else
			{
				echo 'No user type for this user is found';
			}
		}
		
	}
	else
	{
		echo "Inavlid Credentials";
	}
}
?>