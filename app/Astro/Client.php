<?php
namespace App\Astro;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;

class Client
{
    /**
     * @var string
     */
    private $endpoint;

    const GET_CHANNELS = '/ams/v3/getChannelList';

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * @var RequestBuilder
     */
    protected $requestBuilder;

    /**
     * @var ResponseHandler
     */
    protected $handler;

    /**
     * Client constructor.
     *
     * @param GuzzleClient $client
     * @param string       $endpoint
     */
    public function __construct(GuzzleClient $client, string $endpoint)
    {
        $this->client   = $client;
        $this->endpoint = $endpoint;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function send(Request $request): array
    {
        $response = $this->client->send($request);

        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return array
     */
    public function getChannels()
    {
        $request = new Request('get', sprintf('%s%s', $this->endpoint, static::GET_CHANNELS));

        return $this->send($request);
    }
}