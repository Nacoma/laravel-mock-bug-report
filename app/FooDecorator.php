<?php

namespace App;

class FooDecorator implements FooContract
{
    public function __construct(private FooContract $parent)
    {}

    public function bar(): string
    {
        return strrev($this->parent->bar());
    }
}
