<?php 
include('includes/header.php'); 
include('includes/sidebar.php');
include_once("conn.php");
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

<script type="text/javascript" src="CircleType-master/dist/circletype.min.js"></script>
   <div class="content-wrapper">
  <?php
      $id = $_SESSION['uid'];
      $totalV = getTotalV($id);
    //   echo"<pre>" ; print_r($totalV);die();
      $totalDocRecieved = getTotalDocument($id);
      $completeDocument = getCompleteDocument($id);
      $pendingDocument = getPendingDocument($id);
      ?>
    <section class="content">
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
    <h4 style="
    margin-bottom: 30px;
    font-family: system-ui;color:#02104b;
">RTO wise price</h4>
    <div class="row">
     
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


      <div class="col-md-12 form-group text-center">
        <button type="submit" class="btn subbtn btn-lg" name="submit">Submit</button>
      </div>
    </form>
    <div class="row">
      
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
          <span class="data-label">RTO Lo:</span>
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
          
          </tr>
        </thead>
        <tbody>
          <?php
          if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['services'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
             
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
  
             
<?php include('includes/footer.php'); ?>
     
     <style type="text/css">
       .info-box-icon{
        margin: 1px 55px;
        width: 50px !important;
        height: 35% !important;
        line-height: 48px !important;
        border-radius: 78px !important;
          font-weight: 100 !important;
          font-size: 22px;
       }
       .info-box{
        border-radius: 65px !important;
        min-height: 148px !important;
       }
       .info-box-content {
            padding: 8px 10px !important;
            margin-left: 0px !important;
        }
        .info-box-number{
          font-size: 36px !important;
          font-weight: 100 !important;
        }
        .box.box-info{
          border-top-color: #e2dede !important; 
        }
        .info-box-text{
          position: relative;
          width: 80px;
          border-radius: 50%;
          transform: rotate(-50deg);
          overflow: visible !important;
        }

        #demo21, #demo22, #demo23, #demo24{
          display: inline-block;
          /*position: absolute;*/
          bottom: 0px;
          left: 50%;
           transform: translateY(2.75em) rotate(2.696deg);
          transform-origin: center -53.56667em;
          top:-16px;
        }
        #demo11, #demo12, #demo13, #demo14{
          display: inline-block;
          /* position: absolute; */
          bottom: 0px;
          left: 50%;
          transform: translateX(-2.25em) rotate(-0.304deg);
          transform-origin: center 47.43333em;
          height: -1.40206em;
          top: -16px;
        }
        @media only screen and (min-width: 600px) {
        .info-box-icon {
          margin: 2px 105px;
        }
      }
     </style>
        <script type="text/javascript">
          // Instantiate `CircleType` with an HTML element.
          const circleType = new CircleType(document.getElementById('demo11'));
          circleType.radius(60).dir(-1);
          const circleType1 = new CircleType(document.getElementById('demo12'));
          circleType1.radius(60).dir(-1);
          const circleType2 = new CircleType(document.getElementById('demo13'));
          circleType2.radius(60).dir(-1);
          const circleType3 = new CircleType(document.getElementById('demo14'));
          circleType3.radius(60).dir(-1);

            const circleType4 = new CircleType(document.getElementById('demo21'));
            circleType4.radius(60);
            const circleType5 = new CircleType(document.getElementById('demo22'));
            circleType5.radius(50);
            const circleType6 = new CircleType(document.getElementById('demo23'));
            circleType6.radius(50);
            const circleType7 = new CircleType(document.getElementById('demo24'));
            circleType7.radius(60);
        </script>