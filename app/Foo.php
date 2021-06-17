<?php

namespace App;

class Foo implements FooContract
{
    public function __construct(public string $baz)
    {
    }

    public function bar(): string
    {
        return 'qux';
    }
}
