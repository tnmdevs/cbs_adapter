<?php

namespace TNM\CBS\Services\CustomerBalances;

use TNM\CBS\Services\CbsFakeService;

class FakeQueryCustomerBalancesService extends CbsFakeService implements IQueryCustomerBalancesService
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
}