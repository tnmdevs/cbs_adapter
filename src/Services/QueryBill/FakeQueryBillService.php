<?php

namespace TNM\CBS\Services\QueryBill;

use TNM\CBS\Services\CbsFakeService;

class FakeQueryBillService extends CbsFakeService implements IQueryBillService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/query.bill.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return "QueryBillResultMsg";
    }

    protected function getContentTag(): string
    {
        return "QueryBillResult";
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BBFAPPBbServices';
    }
}