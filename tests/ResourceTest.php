<?php

namespace Test;

use App\Resource;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class ResourceTest extends Base
{
    public function test_resource_fetch_json_data_correctly()
    {
        $fake_client = $this->getFakeClient();
        $resource    = new Resource();
        $response    = $resource->getFromHttp('/', $fake_client);

        $this->assertEquals($this->getFakeJsonData(), $response);
    }

    protected function getFakeClient(): Client
    {
        $mock    = new MockHandler([
            new Response(200, [], $this->getFakeJsonData()),
        ]);
        $handler = HandlerStack::create($mock);
        return new Client(['handler' => $handler]);
    }
}