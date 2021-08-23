<?php


namespace TNM\CBS\Services\LoanInfo;


use TNM\CBS\Responses\CbsResponse;

interface ILoanInfoService
{
    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse;
}
