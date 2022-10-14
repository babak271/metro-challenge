<?php

namespace App\Filters;

use App\Contracts\OfferInterface;
use Iterator;

class PriceFiler extends \FilterIterator
{
    private $from;
    private $to;

    public function __construct(Iterator $iterator, $from, $to)
    {
        parent::__construct($iterator);
        $this->from = $from;
        $this->to   = $to;
    }

    public function accept(): bool
    {
        /** @var OfferInterface $offer */
        $offer = $this->getInnerIterator()->current();
        if ($offer->getPrice() >= $this->from || $offer->getPrice() <= $this->to) {
            return true;
        }

        return false;
    }
}