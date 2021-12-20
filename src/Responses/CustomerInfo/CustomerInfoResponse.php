<?php


namespace TNM\CBS\Responses\CustomerInfo;

use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\CustomerInfo\Customer\Customer;
use TNM\CBS\Services\CustomerInfo\Customer\IndividualCustomer;
use TNM\CBS\Services\CustomerInfo\Customer\OrganisationCustomer;
use TNM\CBS\Utilities\CBS;

class CustomerInfoResponse extends CbsResponse implements ICustomerInfoResponse
{
    public function getAccountType(): string
    {

        if ($this->hasNoContent()) return "";

        $hasAccountTag = isset($this->content['Account']['AcctInfo']['PaymentType']);

        return $hasAccountTag ? CBS::ACCOUNT_TYPES[$this->content['Account']['AcctInfo']['PaymentType']] : "";
    }

    public function getAccountKey(): string
    {
        if ($this->hasNoContent()) return "";

        $hasAccountTag = isset($this->content['Account']['AcctKey']);

        return $hasAccountTag ? $this->content['Account']['AcctKey'] : "";
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

    public function getSupplementaryOfferings(): array
    {
        if ($this->hasNoContent()) return [];

        $hasOfferings = isset($this->content['Subscriber']['SupplementaryOffering']);

        if (!$hasOfferings) return [];

        $offerings=$this->content['Subscriber']['SupplementaryOffering'];
        $hasOneInList = isset($offerings['OfferingKey']);

        return $hasOneInList ? [$offerings] : $offerings;
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

    public function getCreditLimit(): ?array
    {
        if (!$this->hasContent()) return null;

        $hasCreditLimit = isset($this->content['Subscriber']['AcctList']['AccountCredit']);

        if (!$hasCreditLimit) return null;

        return  $this->content['Subscriber']['AcctList']['AccountCredit'];
    }

    public function getActiveTimeLimit(): string
    {
        if ($this->hasNoContent()) return '';

        $hasActiveTimeLimit = isset($this->content['Subscriber']['LifeCycleDetail']['LifeCycleStatus']);

        if (!$hasActiveTimeLimit) return '';

        $statuses = $this->content['Subscriber']['LifeCycleDetail']['LifeCycleStatus'];

        $activeTimeLimit = collect($statuses)->first(function ($status) {
            return $status['StatusName'] == 'Active';
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

    public function getCustomerType(): string
    {
        if ($this->hasNoContent()) return "";

        $hasTypeTag = isset($this->content['Customer']['CustInfo']['CustType']);

        return $hasTypeTag ? $this->content['Customer']['CustInfo']['CustType'] : "";
    }

    public function isIndividual(): bool
    {
        return $this->getCustomerType() == array_flip(CBS::CUSTOMER_TYPE)['Individual'];
    }

    public function isOrganisation(): bool
    {
        return $this->getCustomerType() == array_flip(CBS::CUSTOMER_TYPE)['Organisation'];
    }

    public function isFamily(): bool
    {
        return $this->getCustomerType() == array_flip(CBS::CUSTOMER_TYPE)['Family'];
    }

    public function isPostPaid(): bool
    {
        return $this->getAccountType() == CBS::ACCOUNT_TYPES['1'];
    }

}
