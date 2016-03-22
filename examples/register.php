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

$id = (isset($_GET['id'])) ? (int) $_GET['id'] : 86;

$register = $client->events->register([
    'id'    => $id,
    'name'  => 'John Doe',
    'email' => 'john.doe.29@mailforspam.com'
]);

echo "<h3>Event registration</h3>\n";

echo "Event ID = 86<br>\n";
echo "Name = John Doe<br>\n";
echo "Email = john.doe.29@mailforspam.com<br><br>\n";


if ($register->isSuccess()) {
    $results = $register->results();
    echo "You has been registered<br>\n";
    echo "Your unique link to join <a href=\"$results->join_link\" target=\"_blank\">$results->join_link</a><br>\n";
} else {
    echo $register->statusCode(), "<br>\n";
    echo "Errors: ", $register->implodeMessages('<br>'), "<br>\n";
}