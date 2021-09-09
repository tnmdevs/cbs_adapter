<?php


namespace TNM\CBS\Responses\PaymentLog;


use TNM\CBS\Responses\CbsResponse;

class PaymentLogResponse extends CbsResponse implements IPaymentLogResponse
{

    public function getLogs(): array
    {
        if ($this->hasNoContent()) return [];

        return isset($this->getContents()['PaymentInfo'])?$this->getContents()['PaymentInfo']:[];
    }
}
