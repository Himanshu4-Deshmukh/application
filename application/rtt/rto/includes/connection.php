<?php
// server info
$host = 'localhost';
$user = 'root';
$password = '';
$database_name = 'gaadixug_indigo';
$conn = new mysqli($host, $user, $password, $database_name); 
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>
