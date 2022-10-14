<?php

namespace Test;

use App\Filter;
use App\Filters\FieldFilter;
use App\Filters\PriceFiler;
use App\Offers\Offer;
use App\Offers\OfferCollection;

class FilterTest extends Base
{
    public function test_price_filter_works()
    {
        $data       = json_decode($this->getFakeJsonData());
        $collection = $this->getCollection($data);

        $from   = $data[0]->price;
        $to     = $data[1]->price;
        $filter = new PriceFiler($collection->getIterator(), $from, $to);
        $this->assertCount(2, $filter);
    }

    public function test_field_filter_works()
    {
        $data       = json_decode($this->getFakeJsonData());
        $collection = $this->getCollection($data);

        $filter = new FieldFilter($collection->getIterator(), 'vendorid', 35);
        $this->assertCount(2, $filter);
    }

    public function test_filter_works()
    {
        $data       = json_decode($this->getFakeJsonData());
        $collection = $this->getCollection($data);

        $filter = new Filter($collection->getIterator(), 'count_by_price_range', 15.5, 15.5);
    }

    /**
     * @param mixed $data
     * @return OfferCollection
     */
    public function getCollection(mixed $data): OfferCollection
    {
        $collection = new OfferCollection();
        foreach ($data as $item) {
            $collection->add(new Offer($item->offerId, $item->vendorId, $item->productTitle, $item->price));
        }
        return $collection;
    }
}