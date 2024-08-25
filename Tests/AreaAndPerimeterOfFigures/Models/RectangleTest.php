<?php

namespace Cheba\PhpUnit\Tests\AreaAndPerimeterOfFigures\Models;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Models\Rectangle;
use PHPUnit\Framework\TestCase;

class RectangleTest extends TestCase
{
    public function testArea()
    {
        $rectangle = new Rectangle(4, 5);
        $this->assertEquals(20, $rectangle->getArea());
    }

    public function testPerimeter()
    {
        $rectangle = new Rectangle(4, 5);
        $this->assertEquals(18, $rectangle->getPerimeter());
    }
}
