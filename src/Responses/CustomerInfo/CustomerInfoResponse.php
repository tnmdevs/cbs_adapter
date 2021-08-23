<?php


namespace TNM\CBS\Responses\CustomerInfo;

use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\CbsService;

class CustomerInfoResponse extends CbsResponse implements ICustomerInfoResponse
{
    private $accountTypesMap = [0 => 'PREPAID', 1 => 'POSTPAID', 2 => 'HYBRID'];

    public function getAccountType(): string
    {
        if ($this->hasNoContent()) return "";

        $hasAccountTag = isset($this->content['Account']['AcctInfo']['PaymentType']);

        return $hasAccountTag ? $this->accountTypesMap[$this->content['Account']['AcctInfo']['PaymentType']] : "";
    }

    public function getAccountBalances(): array
    {
        if ($this->hasNoContent()) return [];

        $hasBalances = isset($this->content['Subscriber']['AcctList']['BalanceResult']);

        if (!$hasBalances) return [];

        $balanceResult = $this->content['Subscriber']['AcctList']['BalanceResult'];
        $hasOneInList = isset($balanceResult['BalanceType']);

        return $hasOneInList ? [$balanceResult] : $balanceResult;
    }

    public function getBundleBalances(): array
    {
        if ($this->hasNoContent()) return [];

        $hasBalances = isset($this->content['Subscriber']['FreeUnitInfo']['FreeUnitItem']);

        if (!$hasBalances) return [];

        $balanceResult = $this->content['Subscriber']['FreeUnitInfo']['FreeUnitItem'];
        $hasOneInList = isset($balanceResult['FreeUnitType']);

        return $hasOneInList ? [$balanceResult] : $balanceResult;
    }

    public function getUsages(): array
    {
        if ($this->hasNoContent()) return [];

        $hasUsageList = isset($this->content['Subscriber']['AccmUsageList']);

        if (!$hasUsageList) return [];

        $usageList = $this->content['Subscriber']['AccmUsageList'];
        $hasOneUsage = isset($usageList['AccmType']);
        return $hasOneUsage ? [$usageList] : $usageList;
    }

    public function getActiveTimeLimit(): string
    {
        if ($this->hasNoContent()) return '';

        $hasActiveTimeLimit = isset($this->content['Subscriber']['SubscriberInfo']['ActiveTimeLimit']);

        return $hasActiveTimeLimit ? $this->content['Subscriber']['SubscriberInfo']['ActiveTimeLimit'] : '';
    }
}
