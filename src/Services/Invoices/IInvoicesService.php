<?php


namespace TNM\CBS\Services\Invoices;


use TNM\CBS\Responses\CbsResponse;

interface IInvoicesService
{
    public function query(array $attributes,string $responseClass = CbsResponse::class): CbsResponse;
}
