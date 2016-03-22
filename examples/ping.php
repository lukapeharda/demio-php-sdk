<?php
/**
 * @author Oleksandr Torosh <webtorua@gmail.com>
 */

// Including Composer autoload.php
require '../vendor/autoload.php';

// Api Key and Secret
$api_key = 'IG8a1PUHxa49rn3q250LVVkF84p5w03L';
$api_secret = '1Wf20cConSV1zFiw';

// Demio Client initialization
$client = new \Demio\Client($api_key, $api_secret);

// Making ping request
$response = $client->ping();

// Handling Response
if ($response->isSuccess()) {
    // Success response
    echo "pong = " . $response->results()->pong;
} else {
    // Errors
    echo "Error " . $response->statusCode() . "<br>\n";
    echo $response->implodeMessages('<br>');
}
