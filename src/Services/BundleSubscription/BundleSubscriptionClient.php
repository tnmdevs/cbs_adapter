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
    private ?bool $gift;

    public function __construct(string $msisdn, string $bundleId, ?bool $gift = false)
    {
        $this->msisdn = $msisdn;
        $this->bundleId = $bundleId;
        $this->service = app(IBundleSubscriptionService::class);
        $this->gift = $gift;
    }

    public function query(): BundleSubscriptionResponse
    {
        return $this->service->query(
            [
                'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
                'bundle_id' => $this->bundleId,
                'properties' => $this->getProperties(),
            ],
            BundleSubscriptionResponse::class
        );
    }

    private function getProperties(): string
    {
        if (!$this->gift) return '';

        return
            '<bcc:OInstProperty>
                 <bcc:PropCode>CN_SUBSCRIBE_PARTY</bcc:PropCode>
                 <bcc:PropType>1</bcc:PropType>
                 <bcc:Value>GIFT</bcc:Value>
             </bcc:OInstProperty>';
    }
}
