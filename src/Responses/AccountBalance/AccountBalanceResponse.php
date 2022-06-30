<?php


namespace TNM\CBS\Responses\AccountBalance;


use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Utilities\CBS;

class AccountBalanceResponse extends CbsResponse implements IAccountBalanceResponse
{
    public function getBalances(): ?array
    {
        if ($this->hasNoContent() || !isset($this->getContents()['BalanceList'])) return null;

        $hasOne = isset($this->getContents()['BalanceList']['OutStandingAmount']);

        return $hasOne ? [$this->getContents()['BalanceList']] : $this->getMWKBalance($this->getContents()['BalanceList']);
    }

    private function getMWKBalance(array $list): array
    {
        return collect($list)->filter(fn($b) => $b['CurrencyID'] == array_flip(CBS::CURRENCY)['MWK'])->first();
    }
}
