<?php


namespace TNM\CBS\Services\PaymentLog;


use TNM\CBS\Services\CbsFakeService;

class FakePaymentLogService extends CbsFakeService implements IPaymentLogService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/payment.log.stub';
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
