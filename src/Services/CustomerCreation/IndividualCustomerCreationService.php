<?php


namespace TNM\CBS\Services\CustomerCreation;


use TNM\CBS\Services\CbsService;

class IndividualCustomerCreationService extends CbsService implements IIndividualCustomerCreationService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/create.individual.customer.stub.xml';
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
