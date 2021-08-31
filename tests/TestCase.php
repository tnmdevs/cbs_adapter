<?php

namespace TNM\CBS\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as BaseTestCase;
use TNM\CBS\CbsServiceProvider;


class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [CbsServiceProvider::class];
    }

}
