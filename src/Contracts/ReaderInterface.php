<?php

namespace App\Contracts;

interface ReaderInterface
{
    public function read(string $input): OfferCollectionInterface;
}