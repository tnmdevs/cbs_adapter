<?php

namespace TNM\CBS\Responses\ConsumptionLimit;

use TNM\CBS\Responses\CbsResponse;

class ConsumptionLimitResponse extends CbsResponse implements IConsumptionLimitResponse
{

    public function getAmount(): string
    {
        if ($this->hasNoContent() || !isset($this->getContents()['LimitUsageList'])) return '0';

        $hasOne=isset($this->getContents()['LimitUsageList']['Amount']);

        return $hasOne?$this->getContents()['LimitUsageList']['Amount']:$this->getContents()['LimitUsageList'][0]['Amount'];
    }

    public function getUsageAmount(): string
    {
        if ($this->hasNoContent() || !isset($this->getContents()['LimitUsageList'])) return '0';

        $hasOne=isset($this->getContents()['LimitUsageList']['Amount']);

        return $hasOne?$this->getContents()['LimitUsageList']['UsageAmount']:$this->getContents()['LimitUsageList'][0]['UsageAmount'];
    }
}