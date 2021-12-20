<?php

namespace TNM\CBS\Tests\Unit\TotalUsage;

use Illuminate\Support\Facades\Http;
use TNM\CBS\Responses\AdjustLog\AdjustLogResponse;
use TNM\CBS\Responses\TotalUsage\TotalUsageResponse;
use TNM\CBS\Services\AdjustLog\AdjustLogClient;
use TNM\CBS\Services\TotalUsage\TotalUsageClient;
use TNM\CBS\Tests\TestCase;

class TotalUSageTest extends TestCase
{
    public function test_total_usage()
    {
        $stub = file_get_contents(__DIR__ . '/total.usage.response.xml');
        $result = (new TotalUsageResponse('QueryTotalBalanceResultMsg', 'QueryTotalBalanceResult', $stub));

        $this->assertEquals(40, $result->getOutstandingAmount());
        $this->assertEquals(11000, $result->getPrepayment());
        $this->assertEquals(698883, $result->getUnbilledAmount());
    }

    public function test_can_query_total_usage()
    {
        $stub = file_get_contents(__DIR__ . '/total.usage.response.xml');
        Http::fake(['*' => Http::response($stub)]);
        $result = (new TotalUsageClient('888800900'))->query();

        $this->assertInstanceOf(TotalUsageResponse::class, $result);

        $this->assertEquals(40, $result->getOutstandingAmount());
    }
}