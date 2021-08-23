<?php


namespace TNM\CBS\Services\CustomerInfo;


use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Responses\CustomerInfo\CustomerInfoResponse;

interface ICustomerInfoService
{
    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse;
}
