<?php


namespace TNM\CBS\Services\PaymentLog;


use Carbon\Carbon;
use TNM\CBS\Responses\PaymentLog\PaymentLogResponse;
use TNM\CBS\Services\ICBSClient;

class PaymentLogClient implements ICBSClient
{
    private string $msisdn;
    private ?string $start_time;
    private ?string $end_time;
    private IPaymentLogService $service;

    public function __construct(string $msisdn, string $start_time=null, string $end_time=null)
    {
        $this->msisdn = $msisdn;
        $this->start_time = $start_time??cbs_time(Carbon::now()->subMonths(3)->firstOfMonth());
        $this->end_time = $end_time??cbs_time(Carbon::now()->addDay());
        $this->service = app(IPaymentLogService::class);
    }

    public function query(): PaymentLogResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'start_time' => $this->start_time,
            'end_time'=>$this->end_time],
            PaymentLogResponse::class
        );
    }
}
