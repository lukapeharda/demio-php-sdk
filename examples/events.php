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

echo "Events list\n";

$eventsResponse = $client->events->getList();

// Checking response
if ($eventsResponse->isSuccess()) {
    $events = $eventsResponse->contents();
    print_r($events);
} else {
    // Bad response. Dumping Http Status Code and Errors
    print_r($response->getStatusCode());
    print_r($response->errorMessages());
    exit(1);
}

echo "First event\n";
$id = $events[0]->id;

// Simple getting Response data without success checking
$event = $client->events->getEvent($id)->contents();
print_r($event);

echo "First Event Date\n";

$date_id = $event->dates[0]->date_id;
$date = $client->events->getEventDate($id, $date_id);

// If you call Response as method it will return stdClass
print_r($date());

// If you call Response as string it will return JSON string
echo "JSON String\n";
echo $date;