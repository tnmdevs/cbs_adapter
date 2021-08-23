<?php


namespace TNM\CBS\Services\SubscriberValidity;


use TNM\CBS\Responses\CbsResponse;

interface ISubscriberValidityService
{
    public function query(array $attributes): CbsResponse;
}
