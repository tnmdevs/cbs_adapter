<?php

namespace TNM\CBS\Services\AccountBalance;

use TNM\CBS\Responses\AccountBalance\AccountBalanceResponse;

class AccountBalanceClient
{
    private string $account;
    private IAccountBalanceService $service;

    public function __construct(string $account)
    {
        $this->account = $account;
        $this->service = app(IAccountBalanceService::class);
    }

    public function query(): AccountBalanceResponse
    {
        return $this->service->query([
            'msisdn' => $this->account,
            'account' => $this->account
        ],
            AccountBalanceResponse::class
        );
    }
}