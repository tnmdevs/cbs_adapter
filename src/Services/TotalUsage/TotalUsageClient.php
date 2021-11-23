<?php


namespace TNM\CBS\Services\TotalUsage;


use TNM\CBS\Responses\TotalUsage\TotalUsageResponse;
use TNM\CBS\Services\ICBSClient;

class TotalUsageClient implements ICBSClient
{
    private string $msisdn;
    private ITotalUsageService $service;

    public function __construct(string $msisdn)
    {
        $this->msisdn = msisdn($msisdn)->toCbsFormat();
        $this->service = app(ITotalUsageService::class);
    }

    public function query(): TotalUsageResponse
    {
        return $this->service->query(['msisdn' => $this->msisdn], TotalUsageResponse::class);
    }
}