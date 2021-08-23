<?php


namespace TNM\CBS\Services\BundleSharing\ModifyBundleSharingRelationship;


use TNM\CBS\Responses\CbsResponse;

interface IModifyBundleSharingRelationshipService
{
    public function query(array $attributes): CbsResponse;
}
