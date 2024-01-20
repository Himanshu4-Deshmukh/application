<?php
include("service_conn.php");

$category_id = isset($_POST['category_id'])?$_POST['category_id']:'';
$rto = isset($_POST['rto'])?$_POST['rto']:'';

if($category_id != "") {
    $query = "SELECT rto FROM `hdfc_data` WHERE category = '".strtoupper($category_id)."' and rto != '' group by rto";
    $result = $conn->query($query);
    $array = [];
    while($row = $result->fetch_assoc())
    {
        $array[$row['rto']] = $row['rto'];
    }
}

if($rto != "") {
    $query = "SELECT code, name FROM `rto_location` WHERE code = '".strtoupper($rto)."'";
    // echo $query;die;
    $result = $conn->query($query);
    $array = [];
    while($row = $result->fetch_assoc())
    {
        $array[] = $row['name'];
    }
}

echo json_encode($array);
die;
?>