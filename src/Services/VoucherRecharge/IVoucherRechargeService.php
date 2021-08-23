<?php


namespace TNM\CBS\Services\VoucherRecharge;


use TNM\CBS\Responses\CbsResponse;

interface IVoucherRechargeService
{
    public function query(array $attributes): CbsResponse;
}
