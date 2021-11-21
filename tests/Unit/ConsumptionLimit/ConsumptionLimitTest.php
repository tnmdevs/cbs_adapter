<?php

namespace TNM\CBS\Tests\Unit\ConsumptionLimit;

use Illuminate\Support\Facades\Http;
use TNM\CBS\Responses\ConsumptionLimit\ConsumptionLimitResponse;
use TNM\CBS\Services\ConsumptionLimit\ConsumptionLimitClient;
use TNM\CBS\Tests\TestCase;

class ConsumptionLimitTest extends TestCase
{
    public function test_consumption_limit_response()
    {
        $stub = file_get_contents(__DIR__ . '/response.xml');
        $result = (new ConsumptionLimitResponse('QueryConsumptionLimitResultMsg', 'QueryConsumptionLimitResult', $stub));

        $this->assertEquals('1000000', $result->getAmount());
        $this->assertEquals('764343', $result->getUsageAmount());

    }

    public function test_can_query_consumption_limit()
    {
        $stub = file_get_contents(__DIR__ . '/response.xml');
        Http::fake(['*' => Http::response($stub)]);
        $result = (new ConsumptionLimitClient('888800900'))->query();

        $this->assertInstanceOf(ConsumptionLimitResponse::class, $result);

        $this->assertEquals('1000000', $result->getAmount());
    }
}