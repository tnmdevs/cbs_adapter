<?php


namespace TNM\CBS\Services\BundleSubscription;

use TNM\CBS\Responses\BundleSubscription\BundleSubscriptionResponse;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class BundleSubscriptionClient implements ICBSClient
{
    private IBundleSubscriptionService $service;
    private string $msisdn;
    private string $bundleId;

    public function __construct(string $msisdn, string $bundleId)
    {
        $this->msisdn = $msisdn;
        $this->bundleId = $bundleId;
        $this->service = app(IBundleSubscriptionService::class);
    }

    public function query(): BundleSubscriptionResponse
    {
        return $this->service->query(
            [
                'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
                'bundle_id' => $this->bundleId
            ],
            BundleSubscriptionResponse::class
        );
    }
}
