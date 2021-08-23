<?php


namespace TNM\CBS\Responses\BundleSubscription;

use TNM\CBS\Responses\CbsResponse;

class BundleSubscriptionResponse extends CbsResponse
{
    public function isInsufficientBalanceError(): bool
    {
        return $this->getMessage() == 'Insufficient account balance.';
    }
}
