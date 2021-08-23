<?php


namespace TNM\CBS\Services\Me2U;


use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Responses\Me2U\Me2UResponse;
use TNM\CBS\Services\ICBSClient;

class Me2UClient implements ICBSClient
{
    private string $msisdn;
    private string $transfereeMsisdn;
    private int $amount;
    private IMe2UService $service;

    public function __construct(string $msisdn, string $transfereeMsisdn, int $amount)
    {
        $this->msisdn = $msisdn;
        $this->transfereeMsisdn = $transfereeMsisdn;
        $this->amount = $amount;
        $this->service = app(IMe2UService::class);
    }

    public function query(): Me2UResponse
    {
        return $this->service->query(
            [
                'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
                'transferee_msisdn' => msisdn($this->transfereeMsisdn)->toCbsFormat(),
                'amount' => $this->amount * 100
            ],
            Me2UResponse::class
        );
    }
}
