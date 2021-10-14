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
    private ?string $startTime;
    private string $measureUnit;

    public function __construct(string $msisdn,
                                string $beneficiary,
                                string $accountType = null,
                                int $limit = null,
                                string $measureUnit = '1106',
                                string $startTime = null,
                                string $endTime = null)
    {
        $this->service = app(IAddBundleSharingRelationshipService::class);
        $this->msisdn = $msisdn;
        $this->beneficiary = $beneficiary;
        $this->accountType = $accountType;
        $this->limit = $limit;
        $this->startTime = $startTime ? cbs_time(Carbon::parse($startTime)) : null;
        $this->endTime = $endTime ? cbs_time(Carbon::parse($endTime)) : null;
        $this->measureUnit = $measureUnit;
    }

    public function getService(): IAddBundleSharingRelationshipService
    {
        return $this->service;
    }

    public function query(): CbsResponse
    {
        return $this->service->query([
            'comment_share_limit_start' => empty($this->limit) ? '<!--' : '',
            'comment_share_limit_end' => empty($this->limit) ? '-->' : '',
            'comment_free_unit_type'=>empty($this->accountType)?'<!--':'',
            'comment_free_unit_type_end'=>empty($this->accountType)?'-->':'',
            'measure_unit' => $this->measureUnit,
            'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'beneficiary' => msisdn($this->beneficiary)->toCbsFormat(),
            'account_type' => $this->accountType ?: '',
            'limit_value' => $this->limit ?: '',
            'end_time' => $this->endTime ?: '',
            'start_time' => $this->startTime,
        ]);
    }
}
