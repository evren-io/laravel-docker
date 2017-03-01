<?php

use Dingo\Api\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app(Router::class);

$api->version(
    'v1',
    function ($api) {
        /**
         * @var $api Router
         */
        $api->get('channels', \App\Http\Controllers\ChannelController::class.'@channels');
    }
);
