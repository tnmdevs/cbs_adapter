<?php


namespace TNM\CBS\Responses\AvailableOffers;

use TNM\CBS\Responses\CbsResponse;

class AvailableOffersResponse extends CbsResponse implements IAvailableOffersResponse
{
    public function getOffers(): array
    {
        if ($this->hasNoContent() || !isset($this->getContents()['OfferingInfo'])) return [];

        return isset($this->getContents()['OfferingInfo'][0])
            ? $this->getContents()['OfferingInfo']
            : [$this->getContents()['OfferingInfo']];
    }

    public function hasOffer(string $offerId): bool
    {
        return collect($this->getOffers())->map(fn(array $offer) => $offer['OfferingCode'])->contains($offerId);
    }
}
