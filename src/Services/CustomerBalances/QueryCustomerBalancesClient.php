<?php

namespace TNM\CBS\Services\CustomerBalances;

use TNM\CBS\Responses\CustomerBalances\CustomerBalancesResponse;
use TNM\CBS\Services\ICBSClient;

class QueryCustomerBalancesClient implements ICBSClient
{

    private string $msisdn;
    private IQueryCustomerBalancesService $service;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->service = app(IQueryCustomerBalancesService::class);
    }

    public function query(): CustomerBalancesResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat()],
            CustomerBalancesResponse::class
        );
    }
}