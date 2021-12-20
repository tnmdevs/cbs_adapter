<?php

namespace TNM\CBS\Tests\Unit\Adjustments;

use Illuminate\Support\Facades\Http;
use TNM\CBS\Responses\AdjustLog\AdjustLogResponse;
use TNM\CBS\Services\AdjustLog\AdjustLogClient;
use TNM\CBS\Tests\TestCase;

class AdjustLogTest extends TestCase
{
    public function test_adjust_log()
    {
        $stub = file_get_contents(__DIR__ . '/adjust.log.response.xml');
        $result = (new AdjustLogResponse('QueryAdjustLogResultMsg', 'QueryAdjustLogResult', $stub));

        $adjust = $result->getLogs();

        $this->assertEquals(2, sizeof($adjust));

        $this->assertEquals('100', $adjust[0]['BalanceAdjustmentInfo']['AdjustmentAmt']);
    }

    public function test_get_adjustment_type()
    {
        $stub = file_get_contents(__DIR__ . '/adjust.log.response.xml');
        $result = (new AdjustLogResponse('QueryAdjustLogResultMsg', 'QueryAdjustLogResult', $stub));

        $adjust = $result->getLogs()[0];

        $this->assertEquals('CR', AdjustLogResponse::getAdjustmentType($adjust));
    }

    public function test_get_adjustment_amount()
    {
        $stub = file_get_contents(__DIR__ . '/adjust.log.response.xml');
        $result = (new AdjustLogResponse('QueryAdjustLogResultMsg', 'QueryAdjustLogResult', $stub));

        $adjust = $result->getLogs()[0];

        $this->assertEquals(100, AdjustLogResponse::getAdjustmentAmount($adjust));

        $adjustDR = $result->getLogs()[1];

        $this->assertEquals(-100, AdjustLogResponse::getAdjustmentAmount($adjustDR));
    }

    public function test_can_query_adjustments()
    {
        $stub = file_get_contents(__DIR__ . '/adjust.log.response.xml');
        Http::fake(['*' => Http::response($stub)]);
        $result = (new AdjustLogClient('888800900'))->query();

        $this->assertInstanceOf(AdjustLogResponse::class, $result);

        $this->assertEquals('100', $result->getLogs()[0]['BalanceAdjustmentInfo']['AdjustmentAmt']);
    }
}