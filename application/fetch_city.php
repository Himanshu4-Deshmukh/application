<?php
include("conn.php");

if (isset($_POST['rto'])) {
    $selectedRTO = $_POST['rto'];

    // Fetch the location from the database based on the selected RTO
    $sql = "SELECT name FROM rto_location WHERE code = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $selectedRTO);
        $stmt->execute();
        $stmt->bind_result($location);
        $stmt->fetch();
        $stmt->close();

        echo $location;
    } else {
        // Handle the case where the statement could not be prepared
        echo "Error";
    }
} else {
    echo "Invalid request";
}
?>
