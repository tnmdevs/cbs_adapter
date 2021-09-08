<?php


namespace TNM\CBS\Responses\CustomerInfo;

use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\CustomerInfo\Customer\Customer;
use TNM\CBS\Services\CustomerInfo\Customer\IndividualCustomer;
use TNM\CBS\Services\CustomerInfo\Customer\OrganisationCustomer;

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

        $hasActiveTimeLimit = isset($this->content['Subscriber']['LifeCycleDetail']['LifeCycleStatus']);

        if(!$hasActiveTimeLimit) return '';

        $statuses=$this->content['Subscriber']['LifeCycleDetail']['LifeCycleStatus'];

        $activeTimeLimit=collect($statuses)->first(function ($status)
        {
            return $status['StatusName']=='Active';
        });

        return $activeTimeLimit ? $activeTimeLimit['StatusExpireTime'] : '';
    }

    public function getCustomer(): ?Customer
    {
        if ($this->hasNoContent() || !isset($this->content['Customer'])) return null;
        $customer = $this->content['Customer'];

        return $customer['CustInfo']['CustType'] == 1
            ? new IndividualCustomer($customer)
            : new OrganisationCustomer($customer);
    }
}
