<?php


namespace TNM\CBS\Services\SubscriberValidity;


use TNM\CBS\Services\CbsService;

class SubscriberValidityService extends CbsService implements ISubscriberValidityService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/subscriber.validity.stub';
    }

    protected function getResponseNamespace(): string
    {
        return 'ChangeSubValidityResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}
