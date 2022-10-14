<?php

namespace App\Filters;

use App\Contracts\OfferInterface;
use Iterator;

class FieldFilter extends \FilterIterator
{
    private $field;
    private $value;

    public function __construct(Iterator $iterator, $field, $value)
    {
        parent::__construct($iterator);
        $this->field = $field;
        $this->value = $value;
    }

    public function accept()
    {
        /** @var OfferInterface $offer */
        $offer = $this->getInnerIterator()->current();
        if (!method_exists($offer, 'get' . $this->field)) {
            return false;
        }

        if (call_user_func([$offer, 'get' . $this->field]) == $this->value) {
            return true;
        }

        return false;
    }
}