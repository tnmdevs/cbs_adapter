<?php

namespace TNM\CBS\Tests\Unit\QueryBill;

use TNM\CBS\Responses\QueryBill\QueryBillResponse;
use TNM\CBS\Services\QueryBill\AccountQueryBillClient;
use TNM\CBS\Services\QueryBill\QueryBillClient;
use TNM\CBS\Tests\TestCase;

class QueryBillTest extends TestCase
{
    public function test_can_query_bill()
    {
        $stub = file_get_contents(__DIR__ . '/query.bill.response.xml');
        \Http::fake(['*' => \Http::response($stub)]);
        $result = (new QueryBillClient('888800900','20211101'))->query();

        $this->assertInstanceOf(QueryBillResponse::class, $result);

        $this->assertEquals('/onip/invbill288/fmt/BILLQUERY/20211101/593/V4291947_20211101_INV_00000356.pdf.gz', $result->getFilePath());
    }

    public function test_can_query_account_bill()
    {
        $stub = file_get_contents(__DIR__ . '/query.bill.response.xml');
        \Http::fake(['*' => \Http::response($stub)]);
        $result = (new AccountQueryBillClient('V888800900','20211101'))->query();

        $this->assertInstanceOf(QueryBillResponse::class, $result);

        $this->assertEquals('/onip/invbill288/fmt/BILLQUERY/20211101/593/V4291947_20211101_INV_00000356.pdf.gz', $result->getFilePath());
    }
}