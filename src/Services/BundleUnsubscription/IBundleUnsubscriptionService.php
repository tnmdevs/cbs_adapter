<?php

namespace TNM\CBS\Services\BundleUnsubscription;

use TNM\CBS\Responses\CbsResponse;

interface IBundleUnsubscriptionService
{
    public function query(array $attributes): CbsResponse;
}