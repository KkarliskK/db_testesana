<?php
class ApiClient {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function sendPostRequest($data) {
        $ch = curl_init($this->apiUrl);

        // Set the request method to POST
        curl_setopt($ch, CURLOPT_POST, 1);

        // Set the request data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        // Set custom headers if provided
        // if (!empty($headers)) {
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // }

        // Return the response instead of outputting it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close the curl session
        curl_close($ch);

        return $response;
    }
}

// Usage
$apiUrl = 'http://localhost/karlis/db_testing/config/api/updateApi.php';

$apiClient = new ApiClient($apiUrl);

$data = [
    'id' => '1',
    'title' => 'ok',
    'description' => 'value2',
    'due_date' => '2022-12-12',
];

$response = $apiClient->sendPostRequest($data);

// Handle the response
echo $response;

?>
