<?php

namespace TNM\CBS\Services\QueryBill;

use TNM\CBS\Responses\CbsResponse;

interface IQueryBillService
{
    public function query(array $attributes,string $responseClass = CbsResponse::class): CbsResponse;
}