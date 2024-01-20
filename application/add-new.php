<?php
include("conn.php");
$thisfile = basename(__FILE__);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $category = $_POST['category'];
  $rto = $_POST['rto'];

  // Insert data into the 'hdfc_data' table
  $sql = "INSERT INTO hdfc_data (category, rto, services, price, gov_fees) VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  // Check if the SQL statement was prepared successfully
  if ($stmt) {
      // Iterate through the submitted service, price, and govt. fee fields
      for ($i = 1; isset($_POST["service$i"]) && isset($_POST["price$i"]) && isset($_POST["govt-fee$i"]); $i++) {
          $service = $_POST["service$i"];
          $price = $_POST["price$i"];
          $govtFee = $_POST["govt-fee$i"];

          // Bind parameters
          $stmt->bind_param("sssss", $category, $rto, $service, $price, $govtFee);

          // Execute the statement for each service, price, and govt. fee
          if ($stmt->execute()) {
              // Data inserted successfully
          } else {
              // Handle the case where data insertion fails
              // You can log an error or display a user-friendly message
          }
      }

      // Close the prepared statement
      $stmt->close();

      // Redirect to a success page
      header("Location: index.php");
      exit();
  } else {
      // Handle the case where the statement could not be prepared
      // You can log an error or display a user-friendly message
  }

  // Close the database connection
  $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js"></script>
</head>
<style>
    /* Add some styling to the form and table */
    .container {
        background-color: #f7f7f7;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: #4CAF50;
        color: #fff;
        border: none;
    }

    .btn-success:hover {
        background-color: #45a049;
    }

    select, input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
    #service-container{
        margin-left: 15px !important;
        margin-right: 15px !important;
    }
    .addbtn{
    border: 1px solid;
    font-weight: 600;
    border-radius: 15px 1px 15px 1px;
    color: #3578cc;
  }
  label{
    color:#4073b1;
  }
  .addbtn:hover{
   
    background-color: #3578cc;
    color:white;
  }

  .subbtn{
    background: #021771;
    color: white;
    border-radius: 20px 1px 20px 1px
  }
  .subbtn:hover{
     border:1px solid;
     background: white;
     color:#021771;
  }
</style>

<body>

  <div class="container mt-5" style="margin-top: 10px;">
  <h2 style="
    margin-bottom: 30px;
    font-family: system-ui;color:#02104b;
">Add New RTO Services</h2>
    <div class="row">
      <div class="col-md-12 text-right">
        <a onclick="history.back()"><button class="btn addbtn" id="addMoreBtn">Back</button></a>
      </div>
    </div>
    <form name="aufnahme" id="aufnahme" action="<?= $thisfile ?>" method="post" enctype="multipart/form-data" novalidate autocomplete="on" class="row">
      <div class="col-md-4 col-sm-12 form-group">
        <label for="category">Select Category</label>
        <select class="form-control" id="category" name="category" required>
          <option value="">- Select -</option>
          <option value="4W">4w</option>
          <option value="2W">2w</option>
          <option value="CV">cv</option>
        </select>
      </div>

      <div class="col-md-4 col-sm-12 form-group">
    <label for="rto">RTO</label>
    <select class="form-control" id="rto" name="rto">
      <option value="">--Select RTO--</option>
        <?php
        $sql1 = "SELECT code from `rto_location`";
        $result1 = $conn->query($sql1);
        while ($row1 = mysqli_fetch_assoc($result1)) {
            echo "<option value='" . $row1['code'] . "'>" . $row1['code'] . "</option>";
        }
        ?>
    </select>
</div>

      <div class="col-md-4 col-sm-12 form-group">
        <label for="location">City</label>
        <input type="text" class="form-control" name="location" id="location" value="" />
      </div>
      <div id="service-container">
    <!-- Initial service, price, and govt. fee fields -->
    <div class="input-container row">
        <div class="col-md-4 col-sm-12 form-group">
            <label for="service1">Service</label>
            <input type="text" name="service1" class="form-control" placeholder="Service Name">
        </div>
        <div class="col-md-4 col-sm-12 form-group">
            <label for="price1">Price</label>
            <input type="number" name="price1" class="form-control" placeholder="Price">
        </div>
        <div class="col-md-4 col-sm-12 form-group">
            <label for="govt-fee1">Govt. Fee</label>
            <input type="number" name="govt-fee1" class="form-control" placeholder="Govt. Fee">
        </div>
    </div>
</div>

<button id="add-service" type="button" class="btn addbtn" style="margin-left:15px;">Add Service</button>
      <div class="col-md-12 form-group text-center">
        <button type="submit" class="btn subbtn btn-lg" name="submit">Submit</button>
      </div>
    </form>

  </div>


  <script>
    // Function to add a new service, price, and govt. fee field
    function addServiceField() {
        const serviceContainer = document.getElementById("service-container");

        // Create a new input container div
        const newServiceField = document.createElement("div");
        newServiceField.className = "input-container row";

        // Create service input field
        const serviceInput = document.createElement("div");
        serviceInput.className = "col-md-4 col-sm-12 form-group";
        serviceInput.innerHTML = `
            <label for="service${serviceContainer.children.length + 1}">Service</label>
            <input type="text" name="service${serviceContainer.children.length + 1}" class="form-control" placeholder="Service Name">
        `;

        // Create price input field
        const priceInput = document.createElement("div");
        priceInput.className = "col-md-4 col-sm-12 form-group";
        priceInput.innerHTML = `
            <label for="price${serviceContainer.children.length + 1}">Price</label>
            <input type="number" name="price${serviceContainer.children.length + 1}" class="form-control" placeholder="Price">
        `;

        // Create govt. fee input field
        const govtFeeInput = document.createElement("div");
        govtFeeInput.className = "col-md-4 col-sm-12 form-group";
        govtFeeInput.innerHTML = `
            <label for="govt-fee${serviceContainer.children.length + 1}">Govt. Fee</label>
            <input type="number" name="govt-fee${serviceContainer.children.length + 1}" class="form-control" placeholder="Govt. Fee">
        `;

        // Append service, price, and govt. fee fields to the new input container
        newServiceField.appendChild(serviceInput);
        newServiceField.appendChild(priceInput);
        newServiceField.appendChild(govtFeeInput);

        // Append the new input container to the service container
        serviceContainer.appendChild(newServiceField);
    }

    // Add an event listener to the "Add Service" button
    document.getElementById("add-service").addEventListener("click", addServiceField);
</script>


<script>
    $(document).ready(function() {
        // Function to fetch location based on selected RTO
        $('#rto').change(function() {
            let selectedRTO = $(this).val();

            // Make an AJAX request to fetch the location based on the selected RTO
            $.ajax({
                url: 'fetch_city.php', // Change this to the URL of your PHP script to fetch location
                type: 'post',
                data: { rto: selectedRTO },
                success: function(result) {
                    $('#location').val(result); // Populate the 'location' input field
                },
                error: function() {
                    // Handle any errors here
                }
            });
        });
    });
</script>
</body>

</html>
