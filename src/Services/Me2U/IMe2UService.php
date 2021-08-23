<?php


namespace TNM\CBS\Services\Me2U;


use TNM\CBS\Responses\CbsResponse;

interface IMe2UService
{
    public function query(array $attributes): CbsResponse;
}
