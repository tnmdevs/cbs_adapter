<?php


namespace TNM\CBS\Services\SubscriberValidity;


use TNM\CBS\Services\CbsFakeService;

class FakeSubscriberValidityService extends CbsFakeService implements ISubscriberValidityService
{

    protected function getResponseNamespace(): string
    {
        return 'ChangeSubValidityResultMsg';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/subscriber.validity.stub.xml';
    }
}
