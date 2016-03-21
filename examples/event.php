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

$event = $client->events->getEvent(86);

echo "<h3>Single Event</h3>\n";
if ($event->isSuccess()) {
    if ($event->results()) {
        $eventEntity = $event->results();
        echo "<b>{$eventEntity->name} ({$eventEntity->id})</b><br>\n";

        if (count($eventEntity->dates) > 0) {
            foreach ($eventEntity->dates as $date) {
                $dateTime = (new \DateTime('@' . $date->timestamp))->setTimezone(new \DateTimeZone($date->zone));
                echo "Date_id <b>{$date->date_id}</b> is {$date->status} for {$dateTime->format('D, F jS g:i A T')}.\n";
            }
        }
    } else {
        echo "Event not found<br>\n";
    }
}