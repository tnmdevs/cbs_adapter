<?php

namespace TNM\CBS\Tests\Unit\CustomerBalances;

use Illuminate\Support\Facades\Http;
use TNM\CBS\Responses\CustomerBalances\CustomerBalancesResponse;
use TNM\CBS\Services\CustomerBalances\QueryCustomerBalancesClient;
use TNM\CBS\Tests\TestCase;

class CustomerBalancesTest extends TestCase
{
    public function test_customer_balances()
    {
        $stub = file_get_contents(__DIR__ . '/balances.xml');
        $result = (new CustomerBalancesResponse('QuerySumBalanceAndCreditResultMsg', 'QuerySumBalanceAndCreditResult', $stub));

        $this->assertEquals('11000', $result->getPrepayment());
        $this->assertEquals('1000000', $result->getCreditLimit());
        $this->assertEquals('328234', $result->getCreditRemainingAmount());
        $this->assertEquals('671766', $result->getCreditUsageAmount());
        $this->assertEquals('381717', $result->getUnbilledAmount());
    }



    public function test_can_query_balances()
    {
        $stub = file_get_contents(__DIR__ . '/balances.xml');
        Http::fake(['*' => Http::response($stub)]);
        $result = (new QueryCustomerBalancesClient('888800900'))->query();

        $this->assertInstanceOf(CustomerBalancesResponse::class, $result);

        $this->assertEquals('11000', $result->getPrepayment());
    }
}