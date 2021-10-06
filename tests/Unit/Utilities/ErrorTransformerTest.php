<?php


namespace Unit\Utilities;


use TNM\CBS\Tests\TestCase;
use TNM\CBS\Utilities\ErrorMessageTransformer;

class ErrorTransformerTest extends TestCase
{

    public function test_error_transformer_default_message()
    {
        $message = 'The free unit payment relationship CBS3000207053 already exists.';
        $transformer = new ErrorMessageTransformer($message);

        $this->assertEquals('The free unit payment relationship  already exists.', $transformer->getMessage());
    }

    public function test_error_transformer_custom_message()
    {
        $message = 'The entrusting subscriber in the new free unit entrusted payment relationship has another entrusted subscriber.';
        $transformer = new ErrorMessageTransformer($message);

        $this->assertEquals('The child belongs to another sharing group.', $transformer->getMessage());
    }
}