<?php


namespace TNM\CBS\Responses\Invoices;


use TNM\CBS\Responses\CbsResponse;

class InvoicesResponse extends CbsResponse implements IInvoicesResponse
{

    public function getInvoices(): array
    {
        if ($this->hasNoContent() || !isset($this->getContents()['InvoiceInfo'])) return [];

        $hasOne=isset($this->getContents()['InvoiceInfo']['InvoiceID']);

        return $hasOne?[$this->getContents()['InvoiceInfo']]:$this->getContents()['InvoiceInfo'];
    }
}
