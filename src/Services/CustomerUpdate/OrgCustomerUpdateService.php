<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Services\CbsService;

class OrgCustomerUpdateService extends CbsService implements IOrgCustomerUpdateService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/update.org.customer.stub';
    }

    protected function getResponseNamespace(): string
    {
        return 'ChangeCustInfoRequestMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}
