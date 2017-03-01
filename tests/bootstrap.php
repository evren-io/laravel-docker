<?php

use GuzzleHttp\Tests\Server;

require_once __DIR__.'/../vendor/guzzlehttp/guzzle/tests/Server.php';

//Rewrite ENV variables
putenv('API_DEBUG=true');
putenv('API_PREFIX=api');

putenv('OMS_MY_BASE_URI='.Server::$url);
putenv('NEWRELIC_AUTO_NAME_TRANSACTION=false');

date_default_timezone_set('UTC');

