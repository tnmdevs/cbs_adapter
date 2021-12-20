<?php

namespace TNM\CBS\Services\QueryBill;

use TNM\CBS\Responses\QueryBill\QueryBillResponse;
use TNM\CBS\Services\ICBSClient;

class QueryBillClient implements ICBSClient
{

    private string $msisdn;
    private string $bill_cycle;
    private IQueryBillService $service;

    public function __construct(string $msisdn, string $bill_cycle)
    {

        $this->msisdn = $msisdn;
        $this->bill_cycle = $bill_cycle;
        $this->service = app(IQueryBillService::class);
    }

    public function query(): QueryBillResponse
    {
        return $this->service->query([
            'msisdn' => $this->msisdn,
            'bill_cycle' => $this->bill_cycle
        ],QueryBillResponse::class);
    }
}