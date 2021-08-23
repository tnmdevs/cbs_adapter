<?php


namespace TNM\CBS\Services\VoucherRecharge;


use TNM\CBS\Services\CbsFakeService;

class FakeVoucherRechargeService extends CbsFakeService implements IVoucherRechargeService
{
    protected function getResponseNamespace(): string
    {
        return 'RechargeResultMsg';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/voucher.recharge.stub';
    }
}
