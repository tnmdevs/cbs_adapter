<?php


namespace TNM\CBS\Services\AccountBalance;


use TNM\CBS\Responses\CbsResponse;

interface IAccountBalanceService
{
    public function query(array $attributes,string $responseClass = CbsResponse::class): CbsResponse;
}
