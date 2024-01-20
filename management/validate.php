<?php
session_start();
if(!isset($_SESSION["user_prev"]))
{
	header('Location: http://www.gaadiwalaonline.com');
	if($_SESSION["user_prev"]!="management")
	{
		header('Location: http://www.gaadiwalaonline.com');
	}
}
?>