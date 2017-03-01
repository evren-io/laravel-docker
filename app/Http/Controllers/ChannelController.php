<?php

namespace App\Http\Controllers;

use App\Astro\Client;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

class ChannelController extends BaseController
{
    use DispatchesJobs, Helpers;

    public function channels()
    {
        /**
         * @var $client Client
         */
        $client = app(Client::class);

        return $this->response->array($client->getChannels());
    }
}
