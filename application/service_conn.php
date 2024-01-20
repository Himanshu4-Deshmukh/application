<?php
// server info
frc@vahanfin.com

// connect to the database
$conn = new mysqli($host, $user, $password, $database_name); 

// show errors (remove this line if on a live site)
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>
