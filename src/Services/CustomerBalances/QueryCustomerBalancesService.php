<?php

namespace TNM\CBS\Services\CustomerBalances;

use TNM\CBS\Services\CbsService;

class QueryCustomerBalancesService extends CbsService implements IQueryCustomerBalancesService
{

    protected function getResponseNamespace(): string
    {
        return "QuerySumBalanceAndCreditResultMsg";
    }

    protected function getContentTag(): string
    {
        return "QuerySumBalanceAndCreditResult";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/query.customer.balances.stub.xml';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }
}