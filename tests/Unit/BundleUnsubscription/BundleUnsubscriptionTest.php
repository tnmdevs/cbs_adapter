<?php

namespace TNM\CBS\Tests\Unit\BundleUnsubscription;

use Illuminate\Support\Facades\Http;
use TNM\CBS\Responses\CbsResponse;
use TNM\CBS\Services\BundleUnsubscription\BundleUnsubscriptionClient;
use TNM\CBS\Tests\TestCase;

class BundleUnsubscriptionTest extends TestCase
{
    public function test_can_unsubscribe_to_a_bundle()
    {
        $stub = file_get_contents(__DIR__ . '/bundle.unsubscription.response.xml');
        Http::fake(['*' => Http::response($stub)]);
        $result = (new BundleUnsubscriptionClient('888800900','C_500'))->query();

        $this->assertInstanceOf(CbsResponse::class, $result);
    }
}