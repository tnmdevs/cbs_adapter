<?php


namespace TNM\CBS\Responses\TotalUsage;


use TNM\CBS\Responses\CbsResponse;

class TotalUsageResponse extends CbsResponse
{
    public function getOutstandingAmount(): string
    {
        $balance = $this->getBalance();

        return isset($balance['OutStandingAmount']) ? $balance['OutStandingAmount'] : 0;
    }

    private function getBalance(): array
    {
        if ($this->hasNoContent()) return [];

        if (isset($this->getContents()['BalanceList']['OutStandingAmount']))
            return $this->getContents()['BalanceList'];

        return collect($this->getContents()['BalanceList'])->first(function (array $balance) {
            return isset($balance['CurrencyID']) && $balance['CurrencyID'] == '1102';
        });
    }

    public function getPrepayment(): string
    {
        $balance = $this->getBalance();

        return isset($balance['Prepayment']) ? $balance['Prepayment'] : 0;
    }

    public function getUnbilledAmount(): string
    {
        $balance = $this->getBalance();

        return isset($balance['UnbilledAmount']) ? $balance['UnbilledAmount'] : 0;
    }
}