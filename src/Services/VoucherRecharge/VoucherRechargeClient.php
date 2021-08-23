<?php


namespace TNM\CBS\Services\VoucherRecharge;

use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\ICBSClient;


class VoucherRechargeClient implements ICBSClient
{
    private string $msisdn;
    private string $voucher;
    private IVoucherRechargeService $service;

    public function __construct(string $msisdn, string $voucher)
    {
        $this->msisdn = $msisdn;
        $this->voucher = $voucher;
        $this->service = app(IVoucherRechargeService::class);
    }

    public function query(): CbsResponse
    {
        return $this->service->query([
            'msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'voucher' => $this->getEncryptedVoucher()
        ]);
    }

    private function getEncryptedVoucher(): string
    {
        $cipher = 'aes-128-cbc';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        return openssl_encrypt($iv . $this->voucher, $cipher, config('cbs.recharge.key'), 0, $iv);
    }
}
