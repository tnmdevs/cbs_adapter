<?php


namespace TNM\CBS\Services\BundleSharing\DeleteBundleSharingRelationship;


use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class DeleteBundleSharingRelationshipClient implements ICBSClient
{
    private IDeleteBundleSharingRelationshipService $service;
    private string $msisdn;
    private string $beneficiary;
    private ?string $accountType;

    public function __construct(string $msisdn, string $beneficiary, string $accountType = null)
    {
        $this->service = app(IDeleteBundleSharingRelationshipService::class);
        $this->msisdn = $msisdn;
        $this->beneficiary = $beneficiary;
        $this->accountType = $accountType;
    }

    public function query(): CbsResponse
    {
        return $this->service->query([
            'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'beneficiary' => msisdn($this->beneficiary)->toCbsFormat(),
            'account_type' => $this->accountType ?? ''
        ]);
    }
}
