<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingParents;

use TNM\CBS\Responses\BundleSharing\QueryBundleSharing\QueryBundleSharingResponse;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class QueryBundleSharingParentsClient implements ICBSClient
{
    private string $msisdn;
    private IQueryBundleSharingParentsService $service;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->service = app(IQueryBundleSharingParentsService::class);
    }

    public function query(): QueryBundleSharingResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat()], QueryBundleSharingResponse::class);
    }
}
