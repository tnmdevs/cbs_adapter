<?php


namespace TNM\CBS\Services\CustomerInfo;

use TNM\CBS\Responses\CustomerInfo\CustomerInfoResponse;
use TNM\CBS\Services\CbsFakeService;

class FakeCustomerInfoService extends CbsFakeService implements ICustomerInfoService
{
    protected function getResponseNamespace(): string
    {
        return 'QueryCustomerInfoResultMsg';
    }

    protected function getContentTag(): string
    {
        return 'QueryCustomerInfoResult';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/customer.info.stub';
    }
}
