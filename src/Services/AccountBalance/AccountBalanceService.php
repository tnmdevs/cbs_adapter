<?php


namespace TNM\CBS\Services\AccountBalance;

use TNM\CBS\Services\CbsService;

class AccountBalanceService extends CbsService implements IAccountBalanceService
{
    protected function getResponseNamespace(): string
    {
        return "QueryTotalBalanceResultMsg";
    }

    protected function getContentTag(): string
    {
        return "QueryTotalBalanceResult";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/query.account.balance.stub.xml';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }
}
