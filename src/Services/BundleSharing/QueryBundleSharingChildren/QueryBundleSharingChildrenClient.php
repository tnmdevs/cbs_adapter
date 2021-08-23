<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingChildren;

use TNM\CBS\Responses\BundleSharing\QueryBundleSharing\QueryBundleSharingResponse;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class QueryBundleSharingChildrenClient implements ICBSClient
{
    private string $msisdn;
    private IQueryBundleSharingChildrenService $service;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->service = app(IQueryBundleSharingChildrenService::class);
    }

    public function query(): QueryBundleSharingResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat()], QueryBundleSharingResponse::class);
    }
}
