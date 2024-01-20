<?php
include_once("conn.php");
//$q=$_GET['q'];

//$my_data=$q; 

// $sql="SELECT * FROM user WHERE email LIKE '%$my_data%' LIMIT 10";
// $result=mysqli_query($conn,$sql);
// while($row=mysqli_fetch_assoc($result))
// {
// 	echo $row["email"];
// }
if (isset($_POST['search'])) {
$response = "<ul><li>No data found!</li></ul>";

$connection = new mysqli('localhost', 'root', '', 'gwonline');
$q = $connection->real_escape_string($_POST['q']);

$sql = $connection->query("SELECT email FROM user WHERE email LIKE '%$q%' LIMIT 10");
if ($sql->num_rows > 0) {
	$response = '<ul id="auto_ul">';

	while ($data = $sql->fetch_array())
		$response .= '<li id="auto_li">' . $data['email'] . "</li>";

	$response .= "</ul>";
}


exit($response);
}
?>