<?php


namespace TNM\CBS\Services\BundleSharing\DeleteBundleSharingRelationship;


use TNM\CBS\Services\CbsFakeService;

class FakeDeleteBundleSharingRelationshipService extends CbsFakeService implements IDeleteBundleSharingRelationshipService
{
    protected function getResponseNamespace(): string
    {
        return 'ChangeRscRelationResultMsg';
    }
    protected function getRequestStubPath(): string
    {
        return 'stubs/delete.bundle.sharing.relationship.stub';
    }
}
