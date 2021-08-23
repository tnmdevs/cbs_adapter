<?php


namespace TNM\CBS\Services\Me2U;


use TNM\CBS\Services\CbsFakeService;

class FakeMe2UService extends CbsFakeService implements IMe2UService
{
    protected function getResponseNamespace(): string
    {
        return 'TransferBalanceResultMsg';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/me2u.stub';
    }
}
