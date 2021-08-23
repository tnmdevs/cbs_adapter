<?php


namespace TNM\CBS\Responses\AirtimeLoan;

use TNM\CBS\Responses\CbsResponse;

class AirtimeLoanResponse extends CbsResponse implements IAirtimeLoanResponse
{

    public function getLoanResult(): array
    {
        if ($this->hasNoContent()) return [];

        return $this->getContents();
    }
    public function getLoanAmount(): string
    {
        if ($this->hasNoContent()) return "";

        return isset($this->getContents()['LoanAmount']) ? $this->getContents()['LoanAmount'] : "";
    }
    public function getLoanBalanceAmount(): string
    {
        if ($this->hasNoContent()) return "";

        return isset($this->getContents()['LoanBalanceAmount']) ? $this->getContents()['LoanBalanceAmount'] : "";
    }
    public function getRepayAmount(): string
    {
        if ($this->hasNoContent()) return "";

        return isset($this->getContents()['RepayAmount']) ? $this->getContents()['RepayAmount'] : "";
    }
}
