<?php


namespace TNM\CBS\Responses\AdjustLog;


interface IAdjustLogResponse
{
    public function getLogs(): array;

    static function getAdjustmentType(array $adjustment): string;

    static function getAdjustmentAmount(array $adjustment):int;
}
