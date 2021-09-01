<?php

namespace TNM\CBS\Tests\Unit\Utilities;

use PHPUnit\Framework\TestCase;
use TNM\CBS\Utilities\KeyGenerator;

class CustomerKeyGeneratorTest extends TestCase
{

    public function testGenerate()
    {
        $prefix = 'CKYC';
        $length = 24;

        $key = (new KeyGenerator($length, $prefix))->generate();

        $this->assertEquals($length, strlen($key));

        $this->assertEquals('CKYC', substr($key, 0, strlen($prefix)));
    }
}
