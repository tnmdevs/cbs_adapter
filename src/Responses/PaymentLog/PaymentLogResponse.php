<?php


namespace TNM\CBS\Responses\PaymentLog;


use TNM\CBS\Responses\CbsResponse;

class PaymentLogResponse extends CbsResponse implements IPaymentLogResponse
{

    public function getLogs(): array
    {
        if ($this->hasNoContent() || !isset($this->getContents()['PaymentInfo'])) return [];

        $hasOne=isset($this->getContents()['PaymentInfo']['TransID']);

        return $hasOne?[$this->getContents()['PaymentInfo']]:$this->getContents()['PaymentInfo'];
    }
}
