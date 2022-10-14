<?php

namespace App;

use App\Contracts\OfferCollectionInterface;
use App\Contracts\ReaderInterface;
use App\Offers\Offer;
use App\Offers\OfferCollection;

class Read implements ReaderInterface
{
    public function read(string $input): OfferCollectionInterface
    {
        if ($this->isJson($input)) {
            $collection = $this->readJson($input);
        }

        if (!isset($collection)) {
            throw new \Exception('Something went wrong.');
        }

        return $collection;
    }

    protected function isJson($input)
    {
        json_decode($input);
        return json_last_error() === JSON_ERROR_NONE;
    }

    protected function readJson(string $input): OfferCollectionInterface
    {
        $data       = json_decode($input);
        $collection = new OfferCollection();
        foreach ($data as $item) {
            $collection->add(new Offer($item->offerId, $item->vendorId, $item->productTitle, $item->price));
        }

        return $collection;
    }
}