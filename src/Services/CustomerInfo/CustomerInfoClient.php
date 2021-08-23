<?php


namespace TNM\CBS\Services\CustomerInfo;

use TNM\CBS\Responses\BaseCbsResponse;
use TNM\CBS\Responses\CustomerInfo\CustomerInfoResponse;
use TNM\CBS\Services\ICBSClient;

class CustomerInfoClient implements ICBSClient
{
    private string $msisdn;
    private ICustomerInfoService $service;

    public function __construct(string $msisdn)
    {
        $this->service = app(ICustomerInfoService::class);

        $this->msisdn = $msisdn;
    }

    public function query(): CustomerInfoResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat()], CustomerInfoResponse::class);
    }
}
