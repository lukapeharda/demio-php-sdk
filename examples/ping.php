<?php
/**
 * @author Oleksandr Torosh <webtorua@gmail.com>
 */

// Including Composer autoload.php
require '../vendor/autoload.php';

// Api Key and Secret
$api_key = 'HD2MUQaScuajohrm2ccXlqj69zMWQ0uB';
$api_secret = '4Jkz9HMeI8HgS';

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
