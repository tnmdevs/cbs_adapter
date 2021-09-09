<?php


namespace TNM\CBS\Services\PaymentLog;


use TNM\CBS\Responses\CbsResponse;

interface IPaymentLogService
{
    public function query(array $attributes,string $responseClass = CbsResponse::class): CbsResponse;
}
