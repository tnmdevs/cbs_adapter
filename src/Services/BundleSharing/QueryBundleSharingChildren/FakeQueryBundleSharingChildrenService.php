<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingChildren;


use TNM\CBS\Services\CbsFakeService;

class FakeQueryBundleSharingChildrenService extends CbsFakeService implements IQueryBundleSharingChildrenService
{

    protected function getResponseNamespace(): string
    {
        return 'QueryRscRelationResultMsg';
    }

    protected function getContentTag(): string
    {
        return 'QueryRscRelationResult';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/query.bundle.sharing.children.stub';
    }
}
