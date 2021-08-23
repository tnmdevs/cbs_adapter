<?php


namespace TNM\CBS\Services\Me2U;

use TNM\CBS\Services\CbsService;


class Me2UService extends CbsService implements IMe2UService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/me2u.stub';
    }

    protected function getResponseNamespace(): string
    {
        return 'TransferBalanceResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }
}
