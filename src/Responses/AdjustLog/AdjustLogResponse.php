<?php


namespace TNM\CBS\Responses\AdjustLog;


use TNM\CBS\Responses\CbsResponse;

class AdjustLogResponse extends CbsResponse implements IAdjustLogResponse
{

    public function getLogs(): array
    {

        if ($this->hasNoContent() || !isset($this->getContents()['AdjustInfo'])) return [];

        $hasOne = isset($this->getContents()['AdjustInfo']['TransID']);

        return $hasOne ? [$this->getContents()['AdjustInfo']] : $this->getContents()['AdjustInfo'];
    }

    static function getAdjustmentType(array $adjustment): string
    {
        if (!isset($adjustment['Reason'][0])) return 'CR';
        return $adjustment['Reason'][0] == 'D' ? 'DR' : 'CR';
    }


    static function getAdjustmentAmount(array $adjustment): int
    {
        if(!isset($adjustment['BalanceAdjustmentInfo']['AdjustmentAmt'])) return 0;
        return self::getAdjustmentType($adjustment) == 'DR'
            ? (int)$adjustment['BalanceAdjustmentInfo']['AdjustmentAmt'] * -1
            : (int)$adjustment['BalanceAdjustmentInfo']['AdjustmentAmt'];
    }
}
