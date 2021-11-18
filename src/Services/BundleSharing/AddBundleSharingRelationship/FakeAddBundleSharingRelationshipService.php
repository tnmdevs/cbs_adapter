<?php


namespace TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship;


use TNM\CBS\Services\CbsFakeService;

class FakeAddBundleSharingRelationshipService extends CbsFakeService implements IAddBundleSharingRelationshipService
{
    protected function getResponseNamespace(): string
    {
        return 'ChangeRscRelationResultMsg';
    }
    protected function getRequestStubPath(): string
    {
        return 'stubs/add.bundle.sharing.beneficiary.stub.xml';
    }
}
