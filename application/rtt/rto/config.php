<?php
// server info
// $host = 'localhost:3306';
// $user = 'gaadixug_gaadixug_hdfc_integrato';
// $password = 'Shakil@123';
// $database_name = 'gaadixug_hdfc_integrator';

$host = 'localhost';
$user = 'root';
$password = '';
$database_name = 'gaadixug_indigo';

// connect to the database
$conn = new mysqli($host, $user, $password, $database_name); 

// show errors (remove this line if on a live site)
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>