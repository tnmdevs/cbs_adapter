<?php


namespace TNM\CBS\Services\AvailableOffers;


use TNM\CBS\Responses\CbsResponse;

interface IAvailableOffersService
{
    public function query(array $attributes): CbsResponse;
}
