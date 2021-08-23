<?php


namespace TNM\CBS\Services\AvailableOffers;

use TNM\CBS\Responses\AvailableOffers\AvailableOffersResponse;
use TNM\CBS\Services\ICBSClient;

class AvailableOffersClient implements ICBSClient
{
    private string $msisdn;
    private IAvailableOffersService $service;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->service = app(IAvailableOffersService::class);
    }

    public function query(): AvailableOffersResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat()], AvailableOffersResponse::class);
    }
}
