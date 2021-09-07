<?php


namespace TNM\CBS\Services\UpdateAccountInfo;


use TNM\CBS\Responses\CbsResponse;

interface IUpdateAccountInfoService
{
    public function query(array $attributes): CbsResponse;
}
