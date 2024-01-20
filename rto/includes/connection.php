<?php
// server info
$host = 'localhost:3306';
$user = 'gaadixug_indigo';
$password = 'indigo';
$database_name = 'gaadixug_indigo'; 
$mysqli = new mysqli($host, $user, $password, $database_name); 
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
