<?php


namespace TNM\CBS\Responses\AccountBalance;


interface IAccountBalanceResponse
{
  public function getBalances(): ?array;
}
