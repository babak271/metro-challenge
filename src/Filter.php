<?php

namespace App;

use App\Contracts\OfferCollectionInterface;
use App\Filters\FieldFilter;
use App\Filters\PriceFiler;

class Filter
{
    private OfferCollectionInterface $offerCollection;
    private string $filter;
    private $args;

    public function __construct(\Iterator $offerCollection, string $filter, ...$args)
    {
        $this->offerCollection = $offerCollection;
        $this->filter          = str_replace('count_by', '', $filter);
        $this->args            = $args;
    }

    public function getResults()
    {
        return match ($this->filter) {
            'price_range' => new PriceFiler($this->offerCollection->getIterator(), $this->args[0], $this->args[1]),
            default => new FieldFilter($this->offerCollection->getIterator(), str_replace('_', '', $this->filter), $this->args[0])
        };
    }
}