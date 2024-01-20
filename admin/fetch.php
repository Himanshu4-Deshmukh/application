<?php
include_once("conn.php");

if(isset($_GET["query"]))
{
$sql = "
 SELECT email FROM user 
 WHERE email LIKE '".$_GET["query"]."%' 
 LIMIT 10";

 $result = mysqli_query($conn,$sql);

 while($row=mysqli_fetch_assoc($result))
 {
 	$data[] = $row["email"];
 }
}
 echo json_encode($data);
?>