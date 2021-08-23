<?php


namespace TNM\CBS\Services\BundleSubscription;


use TNM\CBS\Services\CbsService;

class BundleSubscriptionService extends CbsService implements IBundleSubscriptionService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/bundle.subscription.stub';
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
