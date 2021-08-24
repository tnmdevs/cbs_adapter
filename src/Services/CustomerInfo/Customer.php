<?php


namespace TNM\CBS\Services\CustomerInfo;


class Customer
{
    private array $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
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

    public function getTitle(): string
    {
        return $this->attributes['IndividualInfo']['Title'] ?? "";
    }

    public function getFirstName(): string
    {
        return $this->attributes['IndividualInfo']['FirstName'] ?? "";
    }

    public function getMiddleName(): string
    {
        return $this->attributes['IndividualInfo']['MiddleName'] ?? "";
    }

    public function getLastName(): string
    {
        return $this->attributes['IndividualInfo']['LastName'] ?? "";
    }

    public function getHomeAddressKey(): string
    {
        return $this->attributes['IndividualInfo']['HomeAddressKey'] ?? "";
    }

    public function getGender(): string
    {
        return $this->attributes['IndividualInfo']['Gender'] ?? "";
    }

    public function getNationality(): string
    {
        return $this->attributes['IndividualInfo']['Nationality'] ?? "";
    }

    public function getBirthday(): string
    {
        return $this->attributes['IndividualInfo']['Birthday'] ?? "";
    }

    public function getMaritalStatus(): string
    {
        return $this->attributes['IndividualInfo']['MaritalStatus'] ?? "";
    }

    public function getEducation(): string
    {
        return $this->attributes['IndividualInfo']['Education'] ?? "";
    }

    public function getOccupation(): string
    {
        return $this->attributes['IndividualInfo']['Occupation'] ?? "";
    }
}
