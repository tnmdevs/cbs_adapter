<?php


namespace TNM\CBS\Services\CustomerCreation;


use TNM\CBS\Responses\CbsResponse;

interface IOrgCustomerCreationService
{
    public function query(array $attributes): CbsResponse;

}
