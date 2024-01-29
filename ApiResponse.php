<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rcNumber = $_POST['rcNumber'];

    $apiKey = '7b4c4411-669c-4be9-9bbc-392440a4f998'; 
    $accountId = '9b8df93c186e/2dbed339-b534-4e7c-95df-9499ca346a9c'; 

    $verifyPayload = json_encode([
        "task_id" => "74f4c926-250c-43ca-9c53-453e87ceacd1",
        "group_id" => "8e16424a-58fc-4ba4-ab20-5bc8e7c3c41e",
        "data" => [
            "rc_number" => $rcNumber,
            "challan_blacklist_details" => true
        ]
    ]);

    //  API endpoint 
    $verifyUrl = 'https://eve.idfy.com/v3/tasks/async/verify_with_source/ind_rc_basic';
    $verifyCurl = curl_init();

    // RC verification
    curl_setopt_array($verifyCurl, [
        CURLOPT_URL => $verifyUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $verifyPayload,
        CURLOPT_HTTPHEADER => [
            'api-key: ' . $apiKey,
            'account-id: ' . $accountId,
            'Content-Type: application/json'
        ],
    ]);

    $verifyResponse = curl_exec($verifyCurl);
    if (curl_errno($verifyCurl)) {
        $verificationError = 'Error: ' . curl_error($verifyCurl);
    } else {
        // Parse response
        $verifyResult = json_decode($verifyResponse, true);

        // Check RC verification 
        if ($verifyResult && isset($verifyResult['request_id'])) {
            //  obtained request 
            $requestId = $verifyResult['request_id'];

            // API endpoint URL for fetching vehicle details
            $detailsUrl = 'https://eve.idfy.com/v3/tasks?request_id=' . $requestId;

            $detailsCurl = curl_init();

            curl_setopt_array($detailsCurl, [
                CURLOPT_URL => $detailsUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'api-key: ' . $apiKey,
                    'account-id: ' . $accountId
                ],
            ]);

            // Execute cURL request 
            $detailsResponse = curl_exec($detailsCurl);

            // Check  errors 
            if (curl_errno($detailsCurl)) {
                $detailsError = 'Error: ' . curl_error($detailsCurl);
            } else {
                // Parse response 
                $vehicleDetails = json_decode($detailsResponse, true);
            }

            // Close cURL 
            curl_close($detailsCurl);
        } else {
            $verificationError = 'Error: Unable to verify RC number.';
        }
    }

    curl_close($verifyCurl);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC Verification</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles can be added here */
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">RC Verification</h2>
                        <form id="rcForm" method="POST">
                            <div class="form-group">
                                <label for="rcNumber">Enter RC Number:</label>
                                <input type="text" id="rcNumber" name="rcNumber" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Verify</button>
                        </form>
                        <?php if (isset($verificationError) || isset($detailsError)): ?>
                            <div class="alert alert-danger mt-4" role="alert">
                                <?php echo isset($verificationError) ? $verificationError : $detailsError; ?>
                            </div>
                        <?php elseif (isset($vehicleDetails)): ?>
                            <div id="output" class="mt-4">
                                <pre><?php echo json_encode($vehicleDetails, JSON_PRETTY_PRINT); ?></pre>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

