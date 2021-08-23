<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingParents;


use TNM\CBS\Services\CbsService;

class QueryBundleSharingParentsService extends CbsService implements IQueryBundleSharingParentsService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/query.bundle.sharing.parents.stub';
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
