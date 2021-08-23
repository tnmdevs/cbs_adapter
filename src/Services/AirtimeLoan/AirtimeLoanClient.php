<?php


namespace TNM\CBS\Services\AirtimeLoan;

use TNM\CBS\Responses\AirtimeLoan\AirtimeLoanResponse;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class AirtimeLoanClient implements ICBSClient
{
    private string $msisdn;
    private string $loanGrade;
    private IAirtimeLoanService $service;

    public function __construct(string $msisdn, string $loanGrade)
    {
        $this->msisdn = $msisdn;
        $this->loanGrade = $loanGrade;
        $this->service = app(IAirtimeLoanService::class);
    }

    public function query(): AirtimeLoanResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat(), 'loan_grade' => $this->loanGrade], AirtimeLoanResponse::class);
    }
}
