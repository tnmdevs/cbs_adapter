<?php


namespace TNM\CBS\Services\SubscriberValidity;


use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class SubscriberValidityClient implements ICBSClient
{
    private string $msisdn;
    private int $days;
    private ISubscriberValidityService $service;

    public function __construct(string $msisdn, int $days)
    {
        $this->msisdn = $msisdn;
        $this->days = $days;
        $this->service = app(ISubscriberValidityService::class);
    }

    public function query(): CbsResponse
    {
        return $this->service->query([
            'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'days' => $this->days
        ]);
    }
}
