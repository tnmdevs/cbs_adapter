<?php

namespace TNM\CBS\Services\QueryBill;

use TNM\CBS\Responses\QueryBill\QueryBillResponse;

class AccountQueryBillClient
{
    private string $account;
    private string $bill_cycle;
    private IQueryBillService $service;

    public function __construct(string $account, string $bill_cycle)
    {
        $this->account = $account;
        $this->bill_cycle = $bill_cycle;
        $this->service = app(IQueryBillService::class);
    }

    public function query(): QueryBillResponse
    {
        return $this->service->query([
            'msisdn' => $this->account,
            'account'=>sprintf('<bbc:AccountCode>%s</bbc:AccountCode>',$this->account),
            'bill_cycle' => $this->bill_cycle
        ],QueryBillResponse::class);
    }
}