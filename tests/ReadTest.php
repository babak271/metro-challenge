<?php

namespace Test;

use App\Contracts\OfferCollectionInterface;
use App\Read;

class ReadTest extends Base
{
    public function test_read_works_correctly()
    {
        $data     = $this->getFakeJsonData();
        $read     = new Read();
        $response = $read->read($data);

        $this->assertInstanceOf(OfferCollectionInterface::class, $response);
        $this->assertCount(count(json_decode($data)), $response->getIterator());
    }
}