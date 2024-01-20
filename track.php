<style>
    @media only screen and (max-width: 767px) {

        #vehicle_tbl th:nth-child(3),
        #vehicle_tbl td:nth-child(3),
        #vehicle_tbl th:nth-child(4),
        #vehicle_tbl td:nth-child(4),
        #vehicle_tbl th:nth-child(5),
        #vehicle_tbl td:nth-child(5),
        #vehicle_tbl th:nth-child(6),
        #vehicle_tbl td:nth-child(6),
        #vehicle_tbl th:nth-child(7),
        #vehicle_tbl td:nth-child(7),
        #vehicle_tbl th:nth-child(8),
        #vehicle_tbl td:nth-child(8) {
            display: none;
        }

        #vehicle_tbl th,
        #vehicle_tbl td {
            font-size: 10px;
        }
    }
</style>

<?php
include('includes/header.php');
include('includes/sidebar.php');
include_once("conn.php");

$id = $_SESSION['uid'];
$vdata = getAllVehicleDataByUid($id);
$udata = getAllUser();


// for company name purpose jass
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$customer = $row["customer"];
// echo $customer;

 


?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include('includes/commonFooter.php'); ?>
<!-- Content Wrapper. Contains page content -->
 

<iframe src="/rtt/rto/dashboard.php" width="100%" height="100%" frameborder="0"></iframe>
<!-- /.content-wrapper -->

<?php
include('includes/footer.php');
?>
<style type="text/css">
    @media only screen and (max-width: 600px) {
        .dm {
            display: none;
        }
    }
</style>

<script src="service_logic.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#example').DataTable();

        // for open add slider form
        $('#addUser').click(function() {
            $('#userForm').toggle('slow');
        })
    });
</script>


 