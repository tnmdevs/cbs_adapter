<?php


namespace TNM\CBS\Services\OneOffDeduction;


use TNM\CBS\Services\CbsFakeService;

class FakeOneOffDeductionService extends CbsFakeService implements IOneOffDeductionService
{

    protected function getResponseNamespace(): string
    {
        return 'FeeDeductionResultMsg';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/one.off.deduction.stub';
    }
}
