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

$register = $client->events->register([
    'id'    => 86,
    'name'  => 'John Doe',
    'email' => 'john.doe.29@mailforspam.com'
]);

echo "<h3>Event registration</h3>\n";

if ($register->isSuccess()) {
    $results = $register->results();
    echo "You has been registered<br>\n";
    echo "Your unique <a href=\"$results->join_link\">link to join</a><br>\n";
} else {
    echo $register->getStatusCode(), "<br>\n";
    echo "Errors: ", $register->implodeMessages('<br>'), "<br>\n";
}