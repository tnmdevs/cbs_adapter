<?php


namespace TNM\CBS\Responses\BundleSharing\QueryBundleSharing;

use TNM\CBS\Responses\CbsResponse;

class QueryBundleSharingResponse extends CbsResponse implements IQueryBundleSharingResponse
{
    public function getRelations(): array
    {
        if ($this->hasNoContent()) return [];

        $hasRelations = isset($this->content['RscRelation']);
        $hasOne = isset($this->content['RscRelation']['PayRelationKey']);

        return $hasRelations ? $hasOne ? [$this->content['RscRelation']] : $this->content['RscRelation'] : [];
    }
}
