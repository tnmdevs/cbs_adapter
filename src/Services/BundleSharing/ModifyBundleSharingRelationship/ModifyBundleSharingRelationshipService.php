<?php


namespace TNM\CBS\Services\BundleSharing\ModifyBundleSharingRelationship;


use TNM\CBS\Services\CbsService;

class ModifyBundleSharingRelationshipService extends CbsService implements IModifyBundleSharingRelationshipService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/modify.bundle.sharing.relationship.stub.xml';
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
