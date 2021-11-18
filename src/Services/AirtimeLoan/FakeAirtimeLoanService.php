<?php


namespace TNM\CBS\Services\AirtimeLoan;


use TNM\CBS\Services\CbsFakeService;

class FakeAirtimeLoanService extends CbsFakeService implements IAirtimeLoanService
{
    protected function getContentTag(): string
    {
        return 'LoanResult';
    }
    protected function getResponseNamespace(): string
    {
        return 'LoanResultMsg';
    }
    protected function getRequestStubPath(): string
    {
        return 'stubs/airtime.loan.stub.xml';
    }
}
