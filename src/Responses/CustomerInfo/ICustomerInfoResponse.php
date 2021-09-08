<?php


namespace TNM\CBS\Responses\CustomerInfo;

use TNM\CBS\Services\CustomerInfo\Customer\Customer;

interface ICustomerInfoResponse
{
    public function getAccountType(): string;

    public function getAccountBalances(): array;

    public function getBundleBalances(): array;

    public function getUsages(): array;

    public function getActiveTimeLimit(): string;

    public function getCustomer(): ?Customer;
}
