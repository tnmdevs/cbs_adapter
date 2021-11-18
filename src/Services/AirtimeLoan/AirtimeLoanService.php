<?php


namespace TNM\CBS\Services\AirtimeLoan;


use TNM\CBS\Services\CbsService;

class AirtimeLoanService extends CbsService implements IAirtimeLoanService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/airtime.loan.stub.xml';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }

    protected function getContentTag(): string
    {
        return 'LoanResult';
    }
    protected function getResponseNamespace(): string
    {
        return 'LoanResultMsg';
    }
}
