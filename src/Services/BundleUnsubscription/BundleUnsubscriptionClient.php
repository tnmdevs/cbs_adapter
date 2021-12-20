<?php

namespace TNM\CBS\Services\BundleUnsubscription;

use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class BundleUnsubscriptionClient implements ICBSClient
{

    private string $msisdn;
    private string $cbsCode;
    private IBundleUnsubscriptionService $service;

    public function __construct(string $msisdn, string $cbsCode)
    {

        $this->msisdn = $msisdn;
        $this->cbsCode = $cbsCode;
        $this->service = app(IBundleUnsubscriptionService::class);
    }

    public function query(): CbsResponse
    {
        return $this->service->query(
            [
                'msisdn' => $this->msisdn,
                'bundle_id' => $this->cbsCode
            ]
        );
    }
}