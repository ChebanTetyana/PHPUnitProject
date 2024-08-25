<?php

namespace Cheba\PhpUnit\Tests\AreaAndPerimeterOfFigures\Models;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Models\Square;
use PHPUnit\Framework\TestCase;

class SquareTest extends TestCase
{
    public function testArea()
    {
        $square = new Square(4);
        $this->assertEquals(16, $square->getArea());
    }

    public function testPerimeter()
    {
        $square = new Square(4);
        $this->assertEquals(16, $square->getPerimeter());
    }
}
