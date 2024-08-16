<?php

namespace Cheba\PhpUnit\Tests\Models;

use Cheba\PhpUnit\Models\Circle;
use Cheba\PhpUnit\Models\Rectangle;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    public function testArea()
    {
        $circle = new Circle(4);
        $this->assertEqualsWithDelta(50.27, $circle->getArea(), 0.01);
    }

    public function testPerimeter()
    {
        $circle = new Circle(4);
        $this->assertEqualsWithDelta(25.13, $circle->getPerimeter(), 0.01);
    }
}