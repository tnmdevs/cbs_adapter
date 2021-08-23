<?php


namespace TNM\CBS\Services\AirtimeLoan;


use TNM\CBS\Responses\CbsResponse;

interface IAirtimeLoanService
{
    public function query(array $attributes): CbsResponse;
}
