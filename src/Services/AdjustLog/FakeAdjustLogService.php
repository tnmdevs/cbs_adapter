<?php


namespace TNM\CBS\Services\AdjustLog;


use TNM\CBS\Services\CbsFakeService;

class FakeAdjustLogService extends CbsFakeService implements IAdjustLogService
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
        return 'stubs/query.adjust.log.stub';
    }
}
