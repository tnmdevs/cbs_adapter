<?php


namespace TNM\CBS\Services\AdjustLog;


use TNM\CBS\Services\CbsService;

class AdjustLogService extends CbsService implements IAdjustLogService
{
    protected function getResponseNamespace(): string
    {
        return "QueryAdjustLogResultMsg";
    }

    protected function getContentTag(): string
    {
        return "QueryAdjustLogResult";
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/query.adjust.log.stub.xml';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/ArServices';
    }
}
