<?php

namespace Cheba\PhpUnit\Tests\AreaAndPerimeterOfFigures\Models;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Models\Circle;
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
