<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingChildren;


use TNM\CBS\Services\CbsService;

class QueryBundleSharingChildrenService extends CbsService implements IQueryBundleSharingChildrenService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/query.bundle.sharing.children.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'QueryRscRelationResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }

    protected function getContentTag(): string
    {
        return 'QueryRscRelationResult';
    }
}
