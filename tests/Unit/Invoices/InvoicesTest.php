<?php

namespace TNM\CBS\Tests\Unit\Invoices;

use Illuminate\Support\Facades\Http;
use TNM\CBS\Responses\Invoices\InvoicesResponse;
use TNM\CBS\Services\Invoices\InvoicesClient;
use TNM\CBS\Tests\TestCase;

class InvoicesTest extends TestCase
{
    public function test_list_invoices()
    {
        $stub = file_get_contents(__DIR__ . '/invoices.response.xml');
        $result = (new InvoicesResponse('QueryInvoiceResultMsg', 'QueryInvoiceResult', $stub));

        $invoices = $result->getInvoices();

        $this->assertEquals(1, sizeof($invoices));

        $this->assertEquals('190530', $invoices[0]['InvoiceAmount']);
    }

    public function test_can_query_invoices()
    {
        $stub = file_get_contents(__DIR__ . '/invoices.response.xml');
        Http::fake(['*' => Http::response($stub)]);
        $result = (new InvoicesClient('888800900'))->query();

        $this->assertInstanceOf(InvoicesResponse::class, $result);

        $this->assertEquals('190530', $result->getInvoices()[0]['InvoiceAmount']);
    }
}