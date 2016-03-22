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


// Getting information about Event and EventDates
$events = $client->events->getList();

echo "<h3>Events list</h3>\n";
if ($events->isSuccess()) {
    if ($events->count() > 0) {
        foreach ($events->results() as $event) {
            echo "<b>{$event->name} ({$event->id})</b> is {$event->status}<br>\n";
        }
    } else {
        echo "Events not found<br>\n";
    }
} else {
    echo "Errors: {$events->implodeMessages()}<br>\n";
}