<?php


namespace TNM\CBS\Responses\AvailableOffers;

use TNM\CBS\Responses\CbsResponse;

class AvailableOffersResponse extends CbsResponse implements IAvailableOffersResponse
{
    public function getOffers(): array
    {
        if ($this->hasNoContent()) return [];

        return isset($this->getContents()['OfferingInfo']) ? $this->getContents()['OfferingInfo'] : [];
    }
}
