<?php


namespace TNM\CBS\Services\UpdateAccountInfo;


use TNM\CBS\Services\CbsFakeService;

class FakeUpdateAccountInfoService extends CbsFakeService implements IUpdateAccountInfoService
{

    protected function getResponseNamespace(): string
    {
        return "ChangeAcctInfoRequestMsg";
    }

    protected function getRequestStubPath(): string
    {
        return "stubs/update.account.stub";
    }
}
