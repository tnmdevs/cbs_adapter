<?php

namespace TNM\CBS\Tests\Unit\Invoices;

use TNM\CBS\Responses\Invoices\InvoicesResponse;
use TNM\CBS\Tests\TestCase;

class InvoicesTest extends TestCase
{
    public function test_list_invoices()
    {
        $this->withoutExceptionHandling();
        $stub = file_get_contents(__DIR__ . '/invoices.response.xml');
        $result = (new InvoicesResponse('QueryInvoiceResultMsg', 'QueryInvoiceResult', $stub));

        $invoices = $result->getInvoices();

        $this->assertEquals(1,sizeof($invoices));

        $this->assertEquals('190530', $invoices[0]['InvoiceAmount']);
    }
}