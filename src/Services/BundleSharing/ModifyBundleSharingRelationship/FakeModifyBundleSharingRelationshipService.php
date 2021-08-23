<?php


namespace TNM\CBS\Services\BundleSharing\ModifyBundleSharingRelationship;


use TNM\CBS\Services\CbsFakeService;

class FakeModifyBundleSharingRelationshipService extends CbsFakeService implements IModifyBundleSharingRelationshipService
{
    protected function getResponseNamespace(): string
    {
        return 'ChangeRscRelationResultMsg';
    }
    protected function getRequestStubPath(): string
    {
        return 'stubs/modify.bundle.sharing.relationship.stub';
    }
}
