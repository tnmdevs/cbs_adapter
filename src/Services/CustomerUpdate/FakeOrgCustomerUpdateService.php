<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Services\CbsFakeService;

class FakeOrgCustomerUpdateService extends CbsFakeService implements IOrgCustomerUpdateService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/update.org.customer.stub';
    }

    protected function getResponseNamespace(): string
    {
        return 'ChangeCustInfoResultMsg';
    }
}
