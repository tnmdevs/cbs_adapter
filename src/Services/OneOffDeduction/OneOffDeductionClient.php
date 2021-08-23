<?php


namespace TNM\CBS\Services\OneOffDeduction;


use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Responses\OneOffDeduction\OneOffDeductionResponse;
use TNM\CBS\Services\ICBSClient;

class OneOffDeductionClient implements ICBSClient
{
    private IOneOffDeductionService $service;
    private string $msisdn;
    private int $amount;
    private string $description;

    public function __construct(string $msisdn, int $amount, string $description)
    {
        $this->msisdn = $msisdn;
        $this->amount = $amount;
        $this->description = $description;
        $this->service = app(IOneOffDeductionService::class);
    }

    public function query(): OneOffDeductionResponse
    {
        return $this->service->query(
            [
                'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
                'amount' => $this->amount,
                'description' => $this->description
            ],
            OneOffDeductionResponse::class
        );
    }
}
