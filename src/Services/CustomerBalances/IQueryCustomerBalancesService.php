<?php

namespace TNM\CBS\Services\CustomerBalances;

use TNM\CBS\Responses\CbsResponse;

interface IQueryCustomerBalancesService
{
    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse;
}