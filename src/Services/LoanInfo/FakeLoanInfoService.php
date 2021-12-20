<?php


namespace TNM\CBS\Services\LoanInfo;


use TNM\CBS\Services\CbsFakeService;

class FakeLoanInfoService extends CbsFakeService implements ILoanInfoService
{
    protected function getResponseNamespace(): string
    {
        return 'QueryLoanLogResultMsg';
    }

    protected function getContentTag(): string
    {
        return 'QueryLoanLogResult';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/loan.info.stub.xml';
    }
}
