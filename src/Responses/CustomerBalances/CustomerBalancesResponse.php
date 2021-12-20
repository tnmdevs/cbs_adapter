<?php

namespace TNM\CBS\Responses\CustomerBalances;

use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Responses\CustomerBalances\ICustomerBalancesResponse;

class CustomerBalancesResponse extends CbsResponse implements ICustomerBalancesResponse
{

    public function getPrepayment(): string
    {
        if ($this->hasNoContent()) return '0';

        return isset($this->getContents()['BalanceResult']['TotalAmount']) ? $this->getContents()['BalanceResult']['TotalAmount'] : '0';
    }

    public function getCreditLimit(): string
    {
        if ($this->hasNoContent()) return '0';

        return isset($this->getContents()['AccountCredit']['TotalCreditAmount']) ? $this->getContents()['AccountCredit']['TotalCreditAmount'] : '0';
    }

    public function getCreditUsageAmount(): string
    {
        if ($this->hasNoContent()) return '0';

        return isset($this->getContents()['AccountCredit']['TotalUsageAmount']) ? $this->getContents()['AccountCredit']['TotalUsageAmount'] : '0';
    }

    public function getCreditRemainingAmount(): string
    {
        if ($this->hasNoContent()) return '0';

        return isset($this->getContents()['AccountCredit']['TotalRemainAmount']) ? $this->getContents()['AccountCredit']['TotalRemainAmount'] : '0';
    }

    public function getUnbilledAmount(): string
    {
        if ($this->hasNoContent()) return '0';

        return isset($this->getContents()['UnbilledResult']['ChargeAmount']) ? $this->getContents()['UnbilledResult']['ChargeAmount'] : '0';
    }
}