<?php


namespace TNM\CBS\Services\AdjustLog;


use TNM\CBS\Responses\CbsResponse;

interface IAdjustLogService
{
    public function query(array $attributes,string $responseClass = CbsResponse::class): CbsResponse;
}
