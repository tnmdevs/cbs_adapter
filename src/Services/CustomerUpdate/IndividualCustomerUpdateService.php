<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Services\CbsService;

class IndividualCustomerUpdateService extends CbsService implements IIndividualCustomerUpdateService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/update.individual.customer.stub';
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
