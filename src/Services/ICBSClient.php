<?php


namespace TNM\CBS\Services;

use TNM\CBS\Responses\CbsResponse;

interface ICBSClient
{
    public function query(): CbsResponse;
}
