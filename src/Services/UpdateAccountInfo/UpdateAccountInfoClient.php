<?php


namespace TNM\CBS\Services\UpdateAccountInfo;


use TNM\CBS\Requests\IndividualRequest;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class UpdateAccountInfoClient implements ICBSClient
{
    private array $attributes;
    private IUpdateAccountInfoService $service;
    public function __construct(IndividualRequest $request)
    {
        $this->attributes=$request->toArray();
        $this->service=app(IUpdateAccountInfoService::class);
    }

    public function query(): CbsResponse
    {
        return $this->service->query($this->attributes);
    }
}
