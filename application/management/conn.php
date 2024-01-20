<?php
$conn = new mysqli("localhost:3306","gaadixug_indigo","indigo","gaadixug_indigo");
if($conn->connect_error)
{
	die("Cannot connect to database. ".$conn->connect_error);
}
?>