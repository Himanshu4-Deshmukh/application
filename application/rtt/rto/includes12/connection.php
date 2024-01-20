<?php
// server info
$host = 'localhost';
$user = 'root';
$password = '';
$database_name = 'gaadixug_indigo';
$mysqli = new mysqli($host, $user, $password, $database_name); 
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
