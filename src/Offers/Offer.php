<?php

namespace App\Offers;

use App\Contracts\OfferInterface;

class Offer implements OfferInterface
{
    private $offerId;
    private $vendorId;
    private $productTitle;
    private $price;

    public function __construct($offerId, $vendorId, $productTitle, $price)
    {
        $this->offerId      = $offerId;
        $this->vendorId     = $vendorId;
        $this->productTitle = $productTitle;
        $this->price        = $price;
    }

    public function getOfferId()
    {
        return $this->offerId;
    }

    public function getVendorId()
    {
        return $this->vendorId;
    }

    public function getProductTitle()
    {
        return $this->productTitle;
    }

    public function getPrice()
    {
        return $this->price;
    }
}