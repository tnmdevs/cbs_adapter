<?php


namespace TNM\CBS\Services\BundleSubscription;


use TNM\CBS\Responses\CbsResponse;

interface IBundleSubscriptionService
{
    public function query(array $attributes): CbsResponse;
}
