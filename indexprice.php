<?php
include("conn.php");
$thisfile = basename(__FILE__);
$numRows = 0;
if (isset($_POST['submit'])) {
  $Category = $_POST['category'];
  $rto = $_POST['rto'];

  $query = "SELECT id,category, rto, services, price, gov_fees FROM `hdfc_data` WHERE rto = '" . strtoupper($rto) . "' and category = '" . strtoupper($Category) . "'";
  $result = $conn->query($query);
  $numRows = $result->num_rows;
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

  select,
  input[type="text"] {
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

  th,
  td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  .data-container {
    display: inline-block;
    /* Display elements inline in a block */
    margin: 8px;
    /* Add spacing between elements if needed */
  }
  label{
    color:#4073b1;
  }
  .data-label {
    font-weight: bold;
    color: #4073b1;
  }

  .data-value {
    color: #666;
  }

  .table-responsive {
    border: none;
  }

  .btn-style {
    text-decoration: none;
    background: #1c0260;
    color: white;
    padding: 4px 7px 4px 7px;
    border-radius: 10px 1px 10px 1px;

  }

  .btn-style:hover {
    text-decoration: none;
    color: white;
    background: #000000;
  }

  .addbtn{
    border: 1px solid;
    font-weight: 600;
    border-radius: 15px 1px 15px 1px;
    color: #3578cc;
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
">RTO Services Details</h2>
    <div class="row">
      <div class="col-md-12 text-right">
        <a href="add-new.php"><button class="btn addbtn" id="addMoreBtn">Add New Services</button></a>
      </div>
    </div>
    <form name="aufnahme" id="aufnahme" action="<?= $thisfile ?>" method="post" enctype="multipart/form-data"class="row">
      <div class="col-md-4 col-sm-12 form-group">
        <label for="category">Select Category</label>
        <select class="form-control" id="category" name="category" required>
          <option value="">- Select -</option>
          <option value="4w">4w</option>
          <option value="2w">2w</option>
          <option value="cv">cv</option>
        </select>
      </div>

      <div class="col-md-4 col-sm-12 form-group">
        <label for="rto">RTO</label>
        <select class="form-control" id="rto" name="rto" required></select>
      </div>

      <div class="col-md-4 col-sm-12 form-group">
        <label for="location">City</label>
        <input type="text" class="form-control" name="location" id="location" value="" required />
      </div>

      <div class="col-md-12 form-group text-center">
        <button type="submit" class="btn subbtn btn-lg" name="submit">Submit</button>
      </div>
    </form>
    <div class="row">
      <div class="col-md-12 text-right">
        <a href="add-more.php"><button class="btn addbtn" id="addMoreBtn">Add More Services</button></a>
      </div>
    </div>
    <?php if ($numRows > 0) {
      $row = $result->fetch_assoc();

      $city_code = $row['rto']; ?>

      <div class="data-container">
        <span class="data-label">Category:</span>
        <span class="data-value"><?php echo $row['category']; ?></span>
      </div>
      <div class="data-container">
        <span class="data-label">RTO:</span>
        <span class="data-value"><?php echo $row['rto']; ?></span>
      </div>
      <?php
      $citysql = "SELECT name,code from rto_location where code='$city_code'";
      $cityresult = $conn->query($citysql);
      while ($cityrow = mysqli_fetch_assoc($cityresult)) {
      ?>
        <div class="data-container">
          <span class="data-label">City:</span>
          <span class="data-value"><?php echo $cityrow['name']; ?></span>
        </div>
      <?php } ?>
    <?php } ?>
    <div class="table-responsive">
      <table class="table mt-4">
        <thead style="color: #4073b1;">
          <tr>
            <th>Services</th>
            <th>Price</th>
            <th>Govt. Fee</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['services'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
              echo "<td>" . $row['gov_fees'] . "</td>";
              echo "<td><a href='service-edit.php?id=" . $row["id"] . "' class='btn-style'>Edit</a></td>";
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>




  <script>
    $(document).ready(function() {
      $('#category').change(function() {
        //alert('testing');
        let category_id = $(this).val();
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: {
                'category_id': category_id
            },
            success: function(result) {
                let jsonResult = JSON.parse(result);
                let rtoSelect = $('#rto');
                
                // Clear existing options
                rtoSelect.find('option').remove();
                
                // Add a default blank option
                rtoSelect.append('<option value="">Select RTO</option>');
                
                // Populate with data from AJAX response
                $.each(jsonResult, function(key, value) {
                    rtoSelect.append(`<option value="${key}">${value}</option>`);
                });
            }
        })
    });

      //fetch city based on sub_category
      $('#rto').change(function() {
        //alert('testing');
        let rto = $(this).val();
        $.ajax({
          url: "ajax.php",
          type: "post",
          data: {
            'rto': rto
          },
          success: function(result) {
            let jsonResult = JSON.parse(result);
            $('#location').val(jsonResult[0]);
            // console.log(jsonResult);
          }
        })
      })
    });
  </script>
</body>

</html>