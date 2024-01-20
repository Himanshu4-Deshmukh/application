<?php

function generateTimedLink($baseLink, $parameters = array()) {
    
    $parameters['timestamp'] = time();
    
    
    $encodedParameters = http_build_query($parameters);


    $timedLink = $baseLink . '?' . $encodedParameters;


    return $timedLink;
}


function isLinkValid($timedLink, $validMinutes = 1) {
    parse_str(parse_url($timedLink, PHP_URL_QUERY), $params);

    if (isset($params['timestamp'])) {
        $timeDifference = time() - $params['timestamp'];

        return $timeDifference <= ($validMinutes * 60);
    }

    return false;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $baseLink = 'http://localhost:3000/form.php';
    $parameters = array(
        'param1' => $_POST['param1'], 
        'param2' => $_POST['param2']
    );

    $timedLink = generateTimedLink($baseLink, $parameters);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timed Link Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="">
            <div class="form-group">
                <label for="param1">Name:</label>
                <input type="text" name="param1" id="param1" required>
            </div>

            <div class="form-group">
                <label for="param2">Surname:</label>
                <input type="text" name="param2" id="param2" required>
            </div>

            <button type="submit">Get Timed Link</button>
        </form>

        <?php if (isset($timedLink)): ?>
            <div class="alert alert-success">
                <p>Generated Link: <span id="timedLink"><?php echo $timedLink; ?></span></p>
                <button class="btn-secondary" onclick="copyLink()">Copy Link</button>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function copyLink() {
            var linkElement = document.getElementById('timedLink');
            var range = document.createRange();
            range.selectNode(linkElement);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
        }
    </script>
</body>
</html>
