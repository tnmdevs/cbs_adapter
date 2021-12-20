<?php


namespace TNM\CBS\Services\UpdateAccountInfo;


use TNM\CBS\Services\CbsService;

class UpdateAccountInfoService extends CbsService implements IUpdateAccountInfoService
{

    protected function getResponseNamespace(): string
    {
        return "ChangeAcctInfoRequestMsg";
    }

    protected function getRequestStubPath(): string
    {
        return "stubs/update.account.stub.xml";
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}
