<?php
// server info
$host = 'localhost:3306';
$user = 'gaadixug_indigo';
$password = 'indigo';
$database_name = 'gaadixug_indigo';

// connect to the database
$conn = new mysqli($host, $user, $password, $database_name); 

// show errors (remove this line if on a live site)
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>
