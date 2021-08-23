<?php

namespace TNM\CBS\Services\CustomerInfo;

use TNM\CBS\Services\CbsService;

class CustomerInfoService extends CbsService implements ICustomerInfoService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/customer.info.stub';
    }

    protected function getResponseNamespace(): string
    {
        return 'QueryCustomerInfoResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }

    protected function getContentTag(): string
    {
        return 'QueryCustomerInfoResult';
    }
}
