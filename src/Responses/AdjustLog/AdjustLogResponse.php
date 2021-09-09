<?php


namespace TNM\CBS\Responses\AdjustLog;


use TNM\CBS\Responses\CbsResponse;

class AdjustLogResponse extends CbsResponse implements IAdjustLogResponse
{

    public function getLogs(): array
    {
        if ($this->hasNoContent()) return [];

        return isset($this->getContents()['AdjustInfo'])?$this->getContents()['AdjustInfo']:[];
    }
}
