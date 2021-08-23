<?php


namespace TNM\CBS\Requests;


abstract class BaseRequest
{
    protected \stdClass $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = json_decode(json_encode($attributes));
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this->attributes),true);
    }

    public function validate(): bool
    {
//        TODO implement validation
        return true;
    }
}
