<?php


namespace TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship;


use Carbon\Carbon;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class AddBundleSharingRelationshipClient implements ICBSClient
{
    private IAddBundleSharingRelationshipService $service;
    private string $msisdn;
    private string $beneficiary;
    private ?string $accountType;
    private ?int $limit;
    private ?string $endTime;

    public function __construct(string $msisdn, string $beneficiary, string $accountType = null, int $limit = null, string $endTime = null)
    {
        $this->service = app(IAddBundleSharingRelationshipService::class);
        $this->msisdn = $msisdn;
        $this->beneficiary = $beneficiary;
        $this->accountType = $accountType;
        $this->limit = $limit;
        $this->endTime = $endTime ? cbs_time(Carbon::parse($endTime)) : null;
    }

    public function query(): CbsResponse
    {
        return $this->service->query([
            'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'beneficiary' => msisdn($this->beneficiary)->toCbsFormat(),
            'account_type' => $this->accountType ?: '',
            'limit_value' => $this->limit ?: '',
            'end_time' => $this->endTime ?: '',
            'start_time' => cbs_time(now()),
        ]);
    }
}
