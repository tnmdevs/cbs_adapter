<?php

namespace TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship;


use TNM\CBS\Services\CbsService;

class AddBundleSharingRelationshipService extends CbsService implements IAddBundleSharingRelationshipService
{
    protected function getRequestStubPath(): string
    {
        return 'stubs/add.bundle.sharing.beneficiary.stub';
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
