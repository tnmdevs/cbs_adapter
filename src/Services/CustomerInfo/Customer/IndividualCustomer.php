<?php

namespace TNM\CBS\Services\CustomerInfo\Customer;

class IndividualCustomer extends Customer
{
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
