<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

// API endpoint
$apiURL = 'http://d1.appzone.io:9090/MobileTicket/services/5/branches/5/ticket/issue';

// Prepare the POST request
$ch = curl_init($apiURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// Pass JSON from frontend
$rawPostData = file_get_contents("php://input");
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawPostData);

// Add custom header
$headers = [
    'Content-Type: application/json',
    'auth-Token: 39c4892d-52d4-4909-912c-87b05f782b25'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["error" => curl_error($ch)]);
} else {
    echo $response;
}
curl_close($ch);
?>
