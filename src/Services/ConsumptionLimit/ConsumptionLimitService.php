<?php

namespace TNM\CBS\Services\ConsumptionLimit;

use TNM\CBS\Services\CbsService;

class ConsumptionLimitService extends CbsService implements IConsumptionLimitService
{

    protected function getResponseNamespace(): string
    {
        return "QueryConsumptionLimitResultMsg";
    }

    protected function getContentTag(): string
    {
        return "QueryConsumptionLimitResult";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/consumption.limit.stub.xml';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}