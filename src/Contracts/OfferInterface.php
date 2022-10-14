<?php

namespace App\Contracts;

interface OfferInterface
{
    public function getOfferId();

    public function getVendorId();

    public function getProductTitle();

    public function getPrice();
}