<?php


namespace TNM\CBS\Services\CustomerCreation;


use TNM\CBS\Services\CbsFakeService;

class FakeOrgCustomerCreationService extends CbsFakeService implements IOrgCustomerCreationService
{

    protected function getResponseNamespace(): string
    {
        return "CreateCustomerResultMsg";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/create.org.customer.stub.xml';
    }
}
