<?php

namespace TNM\CBS\Tests\Unit\Payments;

use TNM\CBS\Responses\PaymentLog\PaymentLogResponse;
use TNM\CBS\Tests\TestCase;

class PaymentsTest extends TestCase
{
    public function test_list_payments()
    {
        $this->withoutExceptionHandling();
        $stub = file_get_contents(__DIR__ . '/payment.log.response.xml');
        $result = (new PaymentLogResponse('QueryPaymentLogResultMsg', 'QueryPaymentLogResult', $stub));

        $payments = $result->getLogs();

        $this->assertEquals(9,sizeof($payments));

        $this->assertEquals('100', $payments[0]['Amount']);
    }
}