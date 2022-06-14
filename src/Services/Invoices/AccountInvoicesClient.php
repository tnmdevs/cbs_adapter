<?php

namespace TNM\CBS\Services\Invoices;

use Carbon\Carbon;
use TNM\CBS\Responses\Invoices\InvoicesResponse;

class AccountInvoicesClient
{
    private string $account;
    private ?string $start_time;
    private ?string $end_time;
    private IInvoicesService $service;

    public function __construct(string $account, string $start_time=null, string $end_time=null)
    {
        $this->account = $account;
        $this->start_time = $start_time??cbs_time(Carbon::now()->subMonths(3)->firstOfMonth());
        $this->end_time = $end_time??cbs_time(Carbon::now()->addDay());
        $this->service = app(IInvoicesService::class);
    }

    public function query(): InvoicesResponse
    {
        return $this->service->query(['msisdn' =>$this->account,
            'account'=>sprintf('<arc:AccountCode>%s</arc:AccountCode>',$this->account),
            'start_time' => $this->start_time,
            'end_time'=>$this->end_time],
            InvoicesResponse::class
        );
    }
}