<?php


/**
 * end point login usage
 */
$url='http://localhost:8080//mvp_android/api.php/?login';
$data = array(
    'username' => 'mvp_android',
    'password' => '1234'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$output = curl_exec($ch);
curl_close($ch);
echo $output;


echo "<br/><br/>";

/**
 *end point recentTags usage
 */
$url='http://localhost:8080//mvp_android/api.php/?recentTags';
$data = array(
    'offset' => 0,
    'limit' => 5
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$output = curl_exec($ch);
curl_close($ch);
echo $output;