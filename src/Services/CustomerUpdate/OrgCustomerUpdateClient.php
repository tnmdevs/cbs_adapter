<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Requests\OrgRequest;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class OrgCustomerUpdateClient implements ICBSClient
{
    private array $attributes;
    private IOrgCustomerUpdateService $service;
    public function __construct(OrgRequest $request)
    {
        $this->attributes=$request->toArray();
        $this->service=app(IOrgCustomerUpdateService::class);
    }

    public function query(): CbsResponse
    {
        return $this->service->query($this->attributes);
    }
}
