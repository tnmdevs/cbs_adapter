<?php


namespace TNM\CBS\Services\AvailableOffers;


use TNM\CBS\Services\CbsFakeService;

class FakeAvailableOffersService extends CbsFakeService implements IAvailableOffersService
{

    protected function getResponseNamespace(): string
    {
        return 'QueryOfferingBySubscribingResultMsg';
    }
    protected function getContentTag(): string
    {
        return 'QueryOfferingBySubscribingResult';
    }
    protected function getRequestStubPath(): string
    {
        return 'stubs/get.available.offers.stub';
    }
}
