<?php


namespace TNM\CBS\Services\BundleSharing\ModifyBundleSharingRelationship;


use Carbon\Carbon;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class ModifyBundleSharingRelationshipClient implements ICBSClient
{
    private IModifyBundleSharingRelationshipService $service;
    private string $msisdn;
    private string $beneficiary;
    private ?string $accountType;
    private ?int $limit;
    private ?Carbon $endTime;

    public function __construct(string $msisdn, string $beneficiary, string $accountType = null, int $limit = null, Carbon $endTime = null)
    {
        $this->service = app(IModifyBundleSharingRelationshipService::class);
        $this->msisdn = $msisdn;
        $this->beneficiary = $beneficiary;
        $this->accountType = $accountType;
        $this->limit = $limit;
        $this->endTime = $endTime;
    }

    public function query(): CbsResponse
    {
        return $this->service->query([
            'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'beneficiary' => msisdn($this->beneficiary)->toCbsFormat(),
            'account_type' => $this->accountType ?: '',
            'limit_value' => $this->limit ?: '',
            'end_time' => $this->endTime ? cbs_time($this->endTime) : ''
        ]);
    }
}
