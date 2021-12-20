<?php


namespace TNM\CBS\Services\PaymentLog;


use TNM\CBS\Services\CbsService;

class PaymentLogService extends CbsService implements IPaymentLogService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/payment.log.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return "QueryPaymentLogResultMsg";
    }
    protected function getContentTag(): string
    {
        return "QueryPaymentLogResult";
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }
}
