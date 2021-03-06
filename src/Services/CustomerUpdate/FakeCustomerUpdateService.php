<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Services\CbsFakeService;

class FakeCustomerUpdateService extends CbsFakeService implements IIndividualCustomerUpdateService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/update.individual.customer.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'ChangeCustInfoResultMsg';
    }
}
