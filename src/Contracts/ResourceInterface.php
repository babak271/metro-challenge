<?php

namespace App\Contracts;

use GuzzleHttp\Client;

interface ResourceInterface
{
    public function getFromHttp(string $url, Client $client = null);
}