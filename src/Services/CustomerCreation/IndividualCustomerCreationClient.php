<?php


namespace TNM\CBS\Services\CustomerCreation;

use TNM\CBS\Requests\IndividualRequest;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;

class IndividualCustomerCreationClient implements ICBSClient
{
    private IIndividualCustomerCreationService $service;

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
//        'title',
//        'first_name',
//        'middle_name',
//        'last_name',
//        'home_address_key',
//        'gender',
//        'nationality',
//        'birthday',
//        'marital_status',
//        'education',
//        'occupation',
//        'salary',
//        'office_phone',
//        'home_phone',
//        'mobile_phone',
//        'fax',
//        'email'
//        'address_key',
//        'address1'
//        'address2'
//        'address3'
//        'address4'
//        'post_code'
//    ]
    private array $attributes;

    public function __construct(IndividualRequest $request)
    {
        $this->service = app(IIndividualCustomerCreationService::class);
        $this->attributes = array_merge($request->toArray(),[
            'comment_email'=>is_valid_email($request->toArray()['email']??'')?'':'<!--',
            'comment_email_end'=>is_valid_email($request->toArray()['email']??'')?'':'-->'
            ]);
    }

    public function query(): CbsResponse
    {
        return $this->service->query(
            $this->attributes
        );
    }
}
