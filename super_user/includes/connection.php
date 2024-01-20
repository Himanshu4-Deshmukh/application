<?php
// server info
$host = 'localhost';
$user = 'root';
$password = '';
$database_name = 'gaadixug_indigo';

// connect to the database
$mysqli = new mysqli($host, $user, $password, $database_name); 

// show errors (remove this line if on a live site)
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
