<?php

$dir = dir(__DIR__.'/../images/php/');
while (false !== ($entry = $dir->read())) {
    if (strstr($entry, '.env')) {
        $file          = file_get_contents(__DIR__.'/../images/php/'.$entry);
        $keyValueArray = explode(PHP_EOL, $file);
        foreach ($keyValueArray as $keyValue) {
            if ($keyValue) {
                putenv($keyValue);
            }
        }
    }
}
$dir->close();
require_once __DIR__.'/../bootstrap/app.php';
