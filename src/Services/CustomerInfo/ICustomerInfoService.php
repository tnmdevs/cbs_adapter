<?php


namespace TNM\CBS\Services\CustomerInfo;


use TNM\CBS\Responses\CbsResponse;

interface ICustomerInfoService
{
    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse;
}
