<?php

namespace TNM\CBS\Services\ConsumptionLimit;

use TNM\CBS\Responses\ConsumptionLimit\ConsumptionLimitResponse;
use TNM\CBS\Services\ICBSClient;

class ConsumptionLimitClient implements ICBSClient
{

    private string $msisdn;
    private IConsumptionLimitService $service;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->service = app(IConsumptionLimitService::class);
    }

    public function query(): ConsumptionLimitResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat()],
            ConsumptionLimitResponse::class
        );
    }
}