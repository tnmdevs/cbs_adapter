<?php


namespace TNM\CBS\Services\CustomerInfo\Customer;


abstract class Customer
{
    protected array $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getCustomerType(): string
    {
        return $this->attributes['CustInfo']['CustType'] == 1 ? 'INDIVIDUAL' : 'BUSINESS';
    }

    public function getCustomerKey(): string
    {
        return $this->attributes['CustKey'] ?? "";
    }

    public function getIdType(): string
    {
        return $this->attributes['IndividualInfo']['IDType'] ?? "";
    }

    public function getIdNumber(): string
    {
        return $this->attributes['IndividualInfo']['IDNumber'] ?? "";
    }

    public function getIDValidity(): string
    {
        return $this->attributes['IndividualInfo']['IDValidity'] ?? "";
    }
}
