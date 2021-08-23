<?php


namespace TNM\CBS\Services\CustomerUpdate;


use TNM\CBS\Responses\CbsResponse;

interface IOrgCustomerUpdateService
{
    public function query(array $attributes): CbsResponse;

}
