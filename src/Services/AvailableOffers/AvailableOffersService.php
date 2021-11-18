<?php


namespace TNM\CBS\Services\AvailableOffers;


use TNM\CBS\Services\CbsService;

class AvailableOffersService extends CbsService implements IAvailableOffersService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/get.available.offers.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'QueryOfferingBySubscribingResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }

    protected function getContentTag(): string
    {
        return 'QueryOfferingBySubscribingResult';
    }
}
