<?php


namespace TNM\CBS\Services\CustomerCreation;


use TNM\CBS\Responses\CbsResponse;

interface IIndividualCustomerCreationService
{
    public function query(array $attributes): CbsResponse;
}
