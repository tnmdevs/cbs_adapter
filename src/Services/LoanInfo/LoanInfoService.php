<?php


namespace TNM\CBS\Services\LoanInfo;


use TNM\CBS\Services\CbsService;

class LoanInfoService extends CbsService implements ILoanInfoService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/loan.info.stub';
    }

    protected function getResponseNamespace(): string
    {
        return 'QueryLoanLogResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }

    protected function getContentTag(): string
    {
        return 'QueryLoanLogResult';
    }
}
