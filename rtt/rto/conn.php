<?php
// server info
$host = 'localhost:3306';
$user = 'gaadixug_indigo';
$password = 'indigo';
$database_name = 'gaadixug_indigo';
$conn = new mysqli($host, $user, $password, $database_name); 
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>
