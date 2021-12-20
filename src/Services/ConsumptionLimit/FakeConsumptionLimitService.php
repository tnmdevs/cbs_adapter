<?php

namespace TNM\CBS\Services\ConsumptionLimit;

use TNM\CBS\Services\CbsFakeService;

class FakeConsumptionLimitService extends CbsFakeService implements IConsumptionLimitService
{

    protected function getResponseNamespace(): string
    {
        return "QueryConsumptionLimitRequestMsg";
    }

    protected function getContentTag(): string
    {
        return "QueryConsumptionLimitResult";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/consumption.limit.stub.xml';
    }
}