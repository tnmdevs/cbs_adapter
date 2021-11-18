<?php


namespace TNM\CBS\Services\CustomerCreation;


use TNM\CBS\Services\CbsService;

class OrgCustomerCreationService extends CbsService implements IOrgCustomerCreationService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/create.org.customer.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'CreateCustomerResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}
