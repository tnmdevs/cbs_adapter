<?php


namespace TNM\CBS\Services\Invoices;


use TNM\CBS\Services\CbsFakeService;
use TNM\CBS\Services\Invoices\IInvoicesService;

class FakeInvoicesService extends CbsFakeService implements IInvoicesService
{

    protected function getResponseNamespace(): string
    {
        return "QueryInvoiceResultMsg";
    }

    protected function getContentTag(): string
    {
        return "QueryInvoiceResult";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/query.invoice.stub';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }
}
