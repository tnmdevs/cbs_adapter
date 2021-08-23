<?php


namespace TNM\CBS\Responses\OneOffDeduction;

use TNM\CBS\Responses\CbsResponse;

class OneOffDeductionResponse extends CbsResponse
{
    public function isInsufficientBalanceError(): bool
    {
        return $this->getMessage() == 'Insufficient account balance.';
    }
}
