<?php


namespace TNM\CBS\Services\CustomerCreation;


use TNM\CBS\Services\CbsFakeService;

class FakeCustomerCreationService extends CbsFakeService implements IIndividualCustomerCreationService
{

    protected function getResponseNamespace(): string
    {
        return "CreateCustomerResultMsg";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/create.individual.customer.stub';
    }
}
