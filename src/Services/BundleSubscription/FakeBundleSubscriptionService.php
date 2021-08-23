<?php


namespace TNM\CBS\Services\BundleSubscription;


use TNM\CBS\Services\CbsFakeService;

class FakeBundleSubscriptionService extends CbsFakeService implements IBundleSubscriptionService
{
    protected function getResponseNamespace(): string
    {
        return 'ChangeSubOfferingResultMsg';
    }

    protected function getRequestStubPath(): string
    {
        return 'stubs/bundle.subscription.stub';
    }
}
