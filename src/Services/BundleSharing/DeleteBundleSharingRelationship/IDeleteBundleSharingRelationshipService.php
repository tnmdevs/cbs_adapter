<?php


namespace TNM\CBS\Services\BundleSharing\DeleteBundleSharingRelationship;


use TNM\CBS\Responses\CbsResponse;

interface IDeleteBundleSharingRelationshipService
{
    public function query(array $attributes): CbsResponse;
}
