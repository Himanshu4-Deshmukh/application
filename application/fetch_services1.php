<?php
include("service_conn.php");

// Include your database connection code here (e.g., config.php)

if (isset($_POST['category']) && isset($_POST['rto'])) {
  $category = $_POST['category'];
  $rto = $_POST['rto'];

  // Perform a database query to fetch non-empty services based on the selected RTO and Category
  // Replace the following lines with your database query
  $query = "SELECT services FROM hdfc_data WHERE rto = '$rto' AND category = '$category' AND services IS NOT NULL AND services != ''";
  $result = $conn->query($query);

  // Initialize options with the "Select Service" option
  $options = "";

  // Build the HTML options for services based on the query result
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $options .= "<option value='" . $row['services'] . "'>" . $row['services'] . "</option>";
    }
  }

  // Return the HTML options as the AJAX response
  echo $options;
}
?>
