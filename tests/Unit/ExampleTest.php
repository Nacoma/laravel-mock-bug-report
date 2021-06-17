<?php

namespace Tests\Unit;

use App\FooContract;
use Mockery\MockInterface;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testFoo1()
    {
        // Works as expected
        $result = resolve(FooContract::class, ['baz' => 'baz'])->bar(); // "qux"

        $this->assertEquals('qux', $result);
    }

    public function testFoo2()
    {
        // Would expect to get "corge"...
        $this->mock(FooContract::class, function (MockInterface $mock) {
            $mock->shouldReceive('bar')->once()->andReturn('corge');
        });

        $result = resolve(FooContract::class, ['baz' => 'baz'])->bar(); // ... but still getting "qux"

        $this->assertEquals('corge', $result);
    }

    public function testFoo3()
    {
        $this->mock(FooContract::class, function (MockInterface $mock) {
            $mock->shouldReceive('bar')->once()->andReturn('corge');
        });

        // I just remove the constructor arguments...
        $result = resolve(FooContract::class)->bar(); // ... and I now get "corge" as expected

        $this->assertEquals('corge', $result);
    }
}
