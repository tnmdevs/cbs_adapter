<?php


namespace TNM\CBS\Services\LoanInfo;

use TNM\CBS\Responses\LoanInfo\LoanInfoResponse;
use TNM\CBS\Services\ICBSClient;

class LoanInfoClient implements ICBSClient
{
    private string $msisdn;
    private ILoanInfoService $service;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->service = app(ILoanInfoService::class);
    }

    public function query(): LoanInfoResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat()], LoanInfoResponse::class);
    }
}
