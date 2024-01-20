<?php
include("service_conn.php");
if (isset($_POST['category']) && isset($_POST['rto']) && isset($_POST['service'])) {
  $category = $_POST['category'];
  $rto = $_POST['rto'];
  $service = $_POST['service'];

  // Perform a database query to fetch the price and government fees for the selected service, category, and RTO
  // Replace the following lines with your database query
  $query = "SELECT price, gov_fees FROM hdfc_data WHERE category = '$category' AND rto = '$rto' AND services = '$service'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Create an array with the fetched data
    $serviceDetails = array(
      'price' => $row['price'],
      'govt_price' => $row['gov_fees']
    );

    // Return the data as a JSON response
    echo json_encode($serviceDetails);
  }
}

?>
