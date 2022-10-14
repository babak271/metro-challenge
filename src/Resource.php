<?php

namespace App;

use App\Contracts\ResourceInterface;
use GuzzleHttp\Client;

class Resource implements ResourceInterface
{
    public function getFromHttp(string $url, Client $client = null)
    {
        $client = $client ?? new Client();

        $response = $client->request('GET', $url);

        return $response->getBody()->getContents();
    }
}