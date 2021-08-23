<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingParents;


use TNM\CBS\Services\CbsFakeService;

class FakeQueryBundleSharingParentsService extends CbsFakeService implements IQueryBundleSharingParentsService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/query.bundle.sharing.parents.stub';
    }
    protected function getResponseNamespace(): string
    {
        return 'QueryRscRelationResultMsg';
    }

    protected function getContentTag(): string
    {
        return 'QueryRscRelationResult';
    }
}
