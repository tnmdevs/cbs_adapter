<?php


namespace TNM\CBS\Responses\LoanInfo;

use TNM\CBS\Responses\CbsResponse;

class LoanInfoResponse extends CbsResponse
{
    public function getLoanInfo(): array
    {
        if ($this->hasNoContent()) return [];

        return isset($this->getContents()['LoanLogSummary']) ? $this->getContents()['LoanLogSummary'] : [];
    }
}
