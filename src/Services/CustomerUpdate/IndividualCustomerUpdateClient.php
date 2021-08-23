<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Requests\IndividualRequest;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class IndividualCustomerUpdateClient implements ICBSClient
{
    private array $attributes;
    private IIndividualCustomerUpdateService $service;

    public function __construct(IndividualRequest $request)
    {
        $this->attributes = $request->toArray();
        $this->service = app(IIndividualCustomerUpdateService::class);
    }

    public function query(): CbsResponse
    {
        return $this->service->query($this->attributes);
    }
}
