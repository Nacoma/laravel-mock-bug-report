<?php

namespace Tests\Unit;

use App\FooContract;
use Mockery\MockInterface;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testFoo2()
    {
        $result = resolve(FooContract::class, ['baz' => 'baz'])->bar();

        $this->assertEquals('xuq', $result);
    }

    public function testFoo3()
    {
        $result = resolve(FooContract::class)->bar();

        $this->assertEquals('xuq', $result);
    }
}
