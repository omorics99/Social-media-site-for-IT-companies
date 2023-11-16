<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>
<body class="font-sans antialiased">
    <h1 style="text-align: center;">OpenAI Test page</h1>
    <?php

    // OpenAI API key
    $apiKey = "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";

    // Input text for which you want embeddings
    $inputText = "Hello, how are you?";

    // OpenAI API endpoint
    $apiEndpoint = "https://api.openai.com/v1/embeddings";

    // Request headers
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey,
    );

    // Request payload
    $data = array(
        'input'             => $inputText,
        'model'             => "text-embedding-ada-002",
        "encoding_format"   => "float"
    );

    // Initialize cURL session
    $ch = curl_init($apiEndpoint);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute cURL session
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }
    var_dump($response);
    die();

    // Close cURL session
    curl_close($ch);

    // Decode and print the response
    $result = json_decode($response, true);
    echo "Embeddings: " . $result['choices'][0]['text'];
    ?>
</body>
</html>
