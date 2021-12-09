<?php


namespace TNM\CBS\Responses\AdjustLog;


interface IAdjustLogResponse
{
    public function getLogs(): array;

    public function getAdjustmentType(array $adjustment): string;
}
