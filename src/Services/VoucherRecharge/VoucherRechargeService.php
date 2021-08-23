<?php

namespace TNM\CBS\Services\VoucherRecharge;

use TNM\CBS\Services\CbsService;

class VoucherRechargeService extends CbsService implements IVoucherRechargeService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/voucher.recharge.stub';
    }

    protected function getResponseNamespace(): string
    {
        return 'RechargeResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }
}
