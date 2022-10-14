<?php

namespace App\Offers;

use App\Contracts\OfferCollectionInterface;
use App\Contracts\OfferInterface;

class OfferCollection implements OfferCollectionInterface
{
    protected array $items = [];

    public function add(OfferInterface $offer)
    {
        $this->items[$offer->getOfferId()] = $offer;
    }

    public function get(int $index): OfferInterface
    {
        return $this->items[$index];
    }

    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->items);
    }
}