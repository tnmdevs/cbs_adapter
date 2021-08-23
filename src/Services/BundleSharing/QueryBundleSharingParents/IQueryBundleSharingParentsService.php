<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingParents;


use TNM\CBS\Responses\CbsResponse;

interface IQueryBundleSharingParentsService
{
    public function query(array $attributes): CbsResponse;
}
