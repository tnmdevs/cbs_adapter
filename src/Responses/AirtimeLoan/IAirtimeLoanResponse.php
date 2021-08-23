<?php


namespace TNM\CBS\Responses\AirtimeLoan;

interface IAirtimeLoanResponse
{
    public function getLoanResult(): array;
    public function getLoanAmount(): string;
    public function getLoanBalanceAmount(): string;
    public function getRepayAmount(): string;
}
