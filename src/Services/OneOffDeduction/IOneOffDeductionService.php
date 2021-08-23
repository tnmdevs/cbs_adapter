<?php


namespace TNM\CBS\Services\OneOffDeduction;


use TNM\CBS\Responses\CbsResponse;

interface IOneOffDeductionService
{
    public function query(array $attributes): CbsResponse;
}
