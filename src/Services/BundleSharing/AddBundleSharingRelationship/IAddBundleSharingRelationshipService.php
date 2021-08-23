<?php


namespace TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship;


use TNM\CBS\Responses\CbsResponse;

interface IAddBundleSharingRelationshipService
{
    public function query(array $attributes): CbsResponse;
}
