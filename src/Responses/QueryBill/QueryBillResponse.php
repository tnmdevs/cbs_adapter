<?php

namespace TNM\CBS\Responses\QueryBill;

use TNM\CBS\Responses\CbsResponse;

class QueryBillResponse extends CbsResponse implements IQueryBillResponse
{

    public function getFilePath(): string
    {
        if ($this->hasNoContent() || !isset($this->getContents()['FileNameList'])) return '';


        return $this->getContents()['FileNameList']['FileName'];
    }
}