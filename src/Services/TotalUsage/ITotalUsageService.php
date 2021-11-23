<?php


namespace TNM\CBS\Services\TotalUsage;


use TNM\CBS\Responses\CbsResponse;

interface ITotalUsageService
{
    public function query(array $attributes, string $responseClass = CbsResponse::class): CbsResponse;
}