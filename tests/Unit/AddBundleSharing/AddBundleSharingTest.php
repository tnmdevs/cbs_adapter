<?php


namespace TNM\CBS\Tests\Unit\AddBundleSharing;


use TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship\AddBundleSharingRelationshipClient;
use TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship\FakeAddBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship\IAddBundleSharingRelationshipService;
use TNM\CBS\Tests\TestCase;

class AddBundleSharingTest extends TestCase
{
    public function test_can_add_bundle_sharing_relation()
    {
        $this->app->bind(IAddBundleSharingRelationshipService::class, FakeAddBundleSharingRelationshipService::class);

        $response = (new AddBundleSharingRelationshipClient('0888800900','0888800800','C_4500',50,1108))->query();

        $this->assertTrue($response->success());
    }
}