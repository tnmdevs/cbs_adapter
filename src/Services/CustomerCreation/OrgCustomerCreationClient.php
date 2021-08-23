<?php


namespace TNM\CBS\Services\CustomerCreation;

use TNM\CBS\Requests\OrgRequest;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class OrgCustomerCreationClient implements ICBSClient
{

    private IOrgCustomerCreationService $service;

//    TODO: find a way to type hint the attributes
//
//    [
//        'register_customer_key',
//        'customer_key',
//        'customer_type',
//        'customer_code',
//        'dunning_flag',
//        'id_type',
//        'id_number',
//        'id_validity',
//        'org_name',
//        'address_key',
//        'size',
//        'industry',
//        'sub_industry',
//        'phone_number',
//        'fax',
//        'email',
//        'website',
//        'address_key',
//        'address1'
//        'address2'
//        'address3'
//        'address4'
//        'post_code'
//    ]
    private array $attributes;

    public function __construct(OrgRequest $request)
    {
        $this->service = app(IOrgCustomerCreationService::class);
        $this->attributes = $request->toArray();
    }

    public function query(): CbsResponse
    {
        return $this->service->query(
            $this->attributes
        );
    }
}
