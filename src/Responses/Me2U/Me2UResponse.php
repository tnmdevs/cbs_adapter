<?php


namespace TNM\CBS\Responses\Me2U;

use TNM\CBS\Responses\CbsResponse;

class Me2UResponse extends CbsResponse
{
    public function isInsufficientBalanceError(): bool
    {
        return $this->getMessage() == 'Transfer failed because the balance will be smaller than the minimum balance.';
    }
}
