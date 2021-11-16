<?php

namespace TNM\CBS\Tests\Unit\Adjustments;

use TNM\CBS\Responses\AdjustLog\AdjustLogResponse;
use TNM\CBS\Tests\TestCase;

class AdjustLogTest extends TestCase
{
 public function test_adjust_log()
 {
     $stub = file_get_contents(__DIR__ . '/adjust.log.response.xml');
     $result = (new AdjustLogResponse('QueryAdjustLogResultMsg', 'QueryAdjustLogResult', $stub));

     $adjust = $result->getLogs();

     $this->assertEquals(1,sizeof($adjust));

     $this->assertEquals('100', $adjust[0]['BalanceAdjustmentInfo']['AdjustmentAmt']);
 }
}