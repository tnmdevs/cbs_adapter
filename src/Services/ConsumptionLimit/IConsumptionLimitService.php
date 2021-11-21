<?php

namespace TNM\CBS\Services\ConsumptionLimit;

use TNM\CBS\Responses\CbsResponse;

interface IConsumptionLimitService
{
    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse;
}