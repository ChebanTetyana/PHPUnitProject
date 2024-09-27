<?php

namespace Cheba\PhpUnit\Tests\AreaAndPerimeterOfFigures\Models;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Models\Triangle;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
    public function testArea(): void
    {
        $triangle = new Triangle(3, 4, 5);
        $this->assertEquals(6, $triangle->getArea());
    }

    public function testPerimeter(): void
    {
        $triangle = new Triangle(3, 4, 5);
        $this->assertEquals(12, $triangle->getPerimeter());
    }
}
