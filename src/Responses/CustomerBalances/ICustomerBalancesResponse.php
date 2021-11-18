<?php

namespace TNM\CBS\Responses\CustomerBalances;

interface ICustomerBalancesResponse
{
    public function getPrepayment(): string;

    public function getCreditLimit(): string;

    public function getCreditUsageAmount(): string;

    public function getCreditRemainingAmount(): string;

    public function getUnbilledAmount(): string;
}