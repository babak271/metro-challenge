<?php

namespace App\Contracts;

interface OfferCollectionInterface
{
    public function add(OfferInterface $offer);

    public function get(int $index): OfferInterface;

    public function getIterator(): \Iterator;
}