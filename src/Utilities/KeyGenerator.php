<?php

namespace TNM\CBS\Utilities;

class KeyGenerator
{
    private int $length;
    private string $prefix;

    public function __construct(int $length = 16, string $prefix = 'CSR')
    {
        $this->length = $length;
        $this->prefix = $prefix;
    }

    public function generate()
    {
        return substr(sprintf("%s%s%s", $this->prefix, time(), strtolower(strrev(uniqid()))), 0, $this->length);
    }
}
