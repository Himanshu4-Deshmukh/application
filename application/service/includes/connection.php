<?php
// server info
$host = 'localhost:3306';
$user = 'gaadixug_indigo';
$password = 'indigo';
$database_name = 'gaadixug_indigo';
// $host = 'localhost';
// $user = 'root';
// $password = '';
// $database_name = 'gwonline'; 

// connect to the database
$mysqli = new mysqli($host, $user, $password, $database_name); 

// show errors (remove this line if on a live site)
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
