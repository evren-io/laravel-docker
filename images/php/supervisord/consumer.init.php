<?php
/**
 * Initialize cron jobs
 */

$events = ['salonese:booking:new', 'salonese:booking:confirmed', 'salonese:review:new', 'salonese:user:update', 'salonese:message:new', 'salonese:booking:finished'];

$file = fopen(__DIR__.DIRECTORY_SEPARATOR.'template/consumer.ini', 'r');

$configFile = fopen(__DIR__.DIRECTORY_SEPARATOR.'consumers.ini', 'w');

foreach ($events as $event) {
    $eventName = str_replace(':', '_', $event);
    $file = fopen(__DIR__.DIRECTORY_SEPARATOR.'template/consumer.ini', 'r');
    while ($file && !feof($file)) {
        $line = fgets($file);

        preg_match_all('#\%([a-zA-Z0-9_]+)\%#imsU', $line, $matchAll);

        if (count($matchAll)) {
            $line = str_replace('%event_name%', $eventName, $line);
            $line = str_replace('%event%', $event, $line);
        }
        fwrite($configFile, $line);
    }
    fwrite($configFile, "\n");
    fclose($file);
}
fclose($configFile);
