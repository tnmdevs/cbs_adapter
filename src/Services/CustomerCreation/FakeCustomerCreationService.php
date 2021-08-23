<?php


namespace TNM\CBS\Services\CustomerCreation;


use TNM\CBS\Services\CbsFakeService;

class FakeCustomerCreationService extends CbsFakeService implements IIndividualCustomerCreationService
{

    protected function getResponseNamespace(): string
    {
        return "CreateCustomerRequestMsg";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/create.individual.customer.stub';
    }
}
