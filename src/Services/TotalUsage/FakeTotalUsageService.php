<?php


namespace TNM\CBS\Services\TotalUsage;


class FakeTotalUsageService extends \TNM\CBS\Services\CbsFakeService implements ITotalUsageService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/total.usage.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'QueryTotalBalanceResultMsg';
    }

    protected function getContentTag(): string
    {
        return 'QueryTotalBalanceResult';
    }
}