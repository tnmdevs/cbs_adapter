<?php


namespace TNM\CBS\Services\OneOffDeduction;


use TNM\CBS\Services\CbsService;

class OneOffDeductionService extends CbsService implements IOneOffDeductionService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/one.off.deduction.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'FeeDeductionResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}
