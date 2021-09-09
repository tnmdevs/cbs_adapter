<?php


namespace TNM\CBS\Responses\Invoices;


use TNM\CBS\Responses\CbsResponse;

class InvoicesResponse extends CbsResponse implements IInvoicesResponse
{

    public function getInvoices(): array
    {
        if ($this->hasNoContent()) return [];

        return isset($this->getContents()['PaymentInfo'])?$this->getContents()['PaymentInfo']:[];
    }
}
