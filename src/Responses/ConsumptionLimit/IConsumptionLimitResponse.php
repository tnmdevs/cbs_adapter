<?php

namespace TNM\CBS\Responses\ConsumptionLimit;

interface IConsumptionLimitResponse
{
    public function getAmount():string;
    public function getUsageAmount():string;
}