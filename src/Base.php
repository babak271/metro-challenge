<?php

namespace App;

class Base
{
    private $filter;
    private $args;

    public function __construct($filter, $args)
    {
        $this->filter = $filter;
        $this->args   = $args;
    }

    public function run()
    {
        // Get Resource
        $resource = (new Resource())->getFromHttp(RESOURCE_URL);

        // Read
        $read = (new Read())->read($resource);

        // Filter


        // Dump
    }
}