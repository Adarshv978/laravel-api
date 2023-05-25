<?php
$otp = rand(1000, 9999); 
$isd = '+91';
$phone = $isd . '6386098744';
$api_key = 'f303c41d-f9e7-11ed-addf-0200cd936042'; // API Key
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => 'https://2factor.in/API/V1/' . $api_key . '/SMS/' . $phone . '/' . $otp,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
]);
$response = curl_exec($ch);
$err = curl_error($ch);

curl_close($ch);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


?>
