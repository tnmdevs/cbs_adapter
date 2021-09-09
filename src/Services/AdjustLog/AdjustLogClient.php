<?php


namespace TNM\CBS\Services\AdjustLog;


use Carbon\Carbon;
use TNM\CBS\Responses\AdjustLog\AdjustLogResponse;
use TNM\CBS\Services\ICBSClient;

class AdjustLogClient implements ICBSClient
{

    private string $msisdn;
    private ?string $start_time;
    private ?string $end_time;
    private IAdjustLogService $service;

    public function __construct(string $msisdn, string $start_time=null, string $end_time=null)
    {
        $this->msisdn = $msisdn;
        $this->start_time = $start_time??cbs_time(Carbon::now()->subMonths(3)->firstOfMonth());
        $this->end_time = $end_time??cbs_time(Carbon::now());
        $this->service = app(IAdjustLogService::class);
    }

    public function query(): AdjustLogResponse
    {
        return $this->service->query(['msisdn' => msisdn($this->msisdn)->toCbsFormat(),
            'start_time' => $this->start_time,
            'end_time'=>$this->end_time],
            AdjustLogResponse::class
        );
    }
}
