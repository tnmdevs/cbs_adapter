<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Responses\CbsResponse;

interface IIndividualCustomerUpdateService
{
    public function query(array $attributes): CbsResponse;

}
