<?php


namespace TNM\CBS\Services\BundleSharing\DeleteBundleSharingRelationship;


use TNM\CBS\Services\CbsService;

class DeleteBundleSharingRelationshipService extends CbsService implements IDeleteBundleSharingRelationshipService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/delete.bundle.sharing.relationship.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'ChangeRscRelationResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}
