<?php


namespace TNM\CBS\Responses\AdjustLog;


use TNM\CBS\Responses\CbsResponse;

class AdjustLogResponse extends CbsResponse implements IAdjustLogResponse
{

    public function getLogs(): array
    {

        if ($this->hasNoContent() || !isset($this->getContents()['AdjustInfo'])) return [];

        $hasOne=isset($this->getContents()['AdjustInfo']['TransID']);

        return $hasOne?[$this->getContents()['AdjustInfo']]:$this->getContents()['AdjustInfo'];
    }

    public function getAdjustmentType(array $adjustment): string
    {
//       TODO implement
        return '';
    }
}
