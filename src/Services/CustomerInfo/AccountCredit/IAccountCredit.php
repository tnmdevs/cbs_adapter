<?php


namespace TNM\CBS\Services\CustomerInfo\AccountCredit;


interface IAccountCredit
{
   public function getCreditLimitType():string;
   public function getCreditLimitTypeName(): string;
   public function getTotalCreditAmount():string;
   public function getTotalUsageAmount():string;
   public function getTotalRemainingAmount():string;

}