<?php

namespace TNM\CBS\Services\BundleUnsubscription;

use TNM\CBS\Services\CbsService;

class BundleUnsubscriptionService extends CbsService implements IBundleUnsubscriptionService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/bundle.unsubscription.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'ChangeSubOfferingResultMsg';
    }

    protected function getRequestEndpoint(): string
    {
        return 'services/BcServices';
    }
}