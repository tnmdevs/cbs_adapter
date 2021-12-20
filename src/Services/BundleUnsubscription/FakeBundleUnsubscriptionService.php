<?php

namespace TNM\CBS\Services\BundleUnsubscription;

use TNM\CBS\Services\CbsFakeService;

class FakeBundleUnsubscriptionService extends CbsFakeService implements IBundleUnsubscriptionService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/bundle.unsubscription.stub.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'ChangeSubOfferingResultMsg';
    }
}