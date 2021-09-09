<?php


namespace TNM\CBS\Services\Invoices;


use TNM\CBS\Services\CbsService;

class InvoicesService extends CbsService implements IInvoicesService
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
