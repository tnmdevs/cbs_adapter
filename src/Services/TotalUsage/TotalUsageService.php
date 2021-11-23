<?php


namespace TNM\CBS\Services\TotalUsage;


use TNM\CBS\Services\CbsService;

class TotalUsageService extends CbsService implements ITotalUsageService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/total.usage.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'QueryTotalBalanceResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }

    protected function getContentTag(): string
    {
        return 'QueryTotalBalanceResult';
    }
}