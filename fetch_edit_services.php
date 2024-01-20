<?php
include("service_conn.php");

// Include your database connection code here (e.g., config.php)

if (isset($_POST['vehicalCategory']) && isset($_POST['rtoCode'])) {
  $vehicalCategory = $_POST['vehicalCategory'];
  $rtoCode = $_POST['rtoCode'];

  // Perform a database query to fetch services based on vehicalCategory and rtoCode
  // Replace the following lines with your database query
  $query = "SELECT services FROM hdfc_data WHERE category = '$vehicalCategory' AND rto = '$rtoCode'";
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
