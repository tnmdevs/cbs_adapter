<?php


namespace TNM\CBS\Services\BundleSharing\QueryBundleSharingChildren;


use TNM\CBS\Responses\CbsResponse;

interface IQueryBundleSharingChildrenService
{
    public function query(array $attributes): CbsResponse;
}
