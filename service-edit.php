<?php
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("location:index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $category = $_POST['category'];
    $rto = $_POST['rto'];
    $service1 = $_POST['service1'];
    $price1 = $_POST['price1'];
    $govt_fee = $_POST['govt-fee1'];

    // Construct the SQL query
    $sql = "UPDATE hdfc_data SET category='$category', rto='$rto', services='$service1', price='$price1', gov_fees='$govt_fee' WHERE id=$id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Data updated successfully
        header("Location: index.php");
        exit();
    } else {
        // Handle the case where the update failed
        echo "Error updating data: " . $conn->error;
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
">Add More RTO Services</h2>
    <div class="row">
      <div class="col-md-12 text-right">
        <a onclick="history.back()"><button class="btn addbtn" id="addMoreBtn">Back</button></a>
      </div>
    </div>
    <?php 
    $sql2 ="SELECT * FROM `hdfc_data` WHERE id=$id";
    $result2= $conn->query($sql2);
    while($row2=mysqli_fetch_assoc($result2)){
        $rto_code = $row2['rto'];
    ?>
    <form name="aufnahme" id="aufnahme" action="" method="post" enctype="multipart/form-data" novalidate autocomplete="on" class="row">
      <div class="col-md-4 col-sm-12 form-group">
        <label for="category">Select Category</label>
        <select class="form-control" id="category" name="category" required>
        <option value="">- Select -</option>
        <option value="4W" <?php if ($row2['category'] == '4W') { echo "selected"; } ?>>4w</option>
        <option value="2W" <?php if ($row2['category'] == '2W') { echo "selected"; } ?>>2w</option>
        <option value="CV" <?php if ($row2['category'] == 'CV') { echo "selected"; } ?>>cv</option>
</select>

      </div>

      <div class="col-md-4 col-sm-12 form-group">
    <label for="rto">RTO</label>
    <select class="form-control" id="rto" name="rto">
      <option value="">--Select RTO--</option>
      <option value="<?php echo $row2['rto'];?>" selected><?php echo $row2['rto'];?></option>
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
    <?php
    $sql3 = "SELECT name FROM `rto_location` WHERE code = '$rto_code'";
    $result3 = $conn->query($sql3);

    if ($result3) {
        // Check if there are any rows returned
        if ($result3->num_rows > 0) {
            $row3 = mysqli_fetch_assoc($result3);
            echo '<input type="text" class="form-control" name="location" id="location" value="' . $row3['name'] . '" />';
        } else {
            echo 'City not found';
        }
    } else {
        // Handle SQL error
        echo 'Error: ' . mysqli_error($conn);
    }
    ?>
</div>

      <div id="service-container">
    <!-- Initial service and price fields -->
    <div class="input-container row">
        <div class="col-md-4 col-sm-12 form-group">
            <label for="service1">Service</label>
            <input type="text" name="service1" class="form-control" placeholder="Service Name" value="<?php echo $row2['services'];?>">
        </div>
        <div class="col-md-4 col-sm-12 form-group">
            <label for="price1">Price</label>
            <input type="number" name="price1" class="form-control" placeholder="Price" value="<?php echo $row2['price'];?>">
        </div>
        <div class="col-md-4 col-sm-12 form-group">
            <label for="govt-fee1">Govt. Fee</label>
            <input type="number" name="govt-fee1" class="form-control" placeholder="Govt. Fee" value="<?php echo $row2['gov_fees']; ?>">
        </div>
    </div>
</div>
      <div class="col-md-12 form-group text-center">
        <button type="submit" class="btn subbtn btn-lg" name="submit">Submit</button>
      </div>
    </form>
    <?php } ?>

  </div>



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
