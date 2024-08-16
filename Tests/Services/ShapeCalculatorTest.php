<?php

namespace Cheba\PhpUnit\Tests\Services;

use Cheba\PhpUnit\Models\Rectangle;
use Cheba\PhpUnit\Services\ShapeCalculator;
use PHPUnit\Framework\TestCase;

class ShapeCalculatorTest extends TestCase
{
    public function testCalculateArea()
    {
        $calculator = new ShapeCalculator();

        $rectangle = new Rectangle(4, 5);
        $this->assertEquals(20, $calculator->calculate($rectangle)['area']);
    }

    public function testCalculatePerimeter()
    {
        $calculator = new ShapeCalculator();

        $rectangle = new Rectangle(4, 5);
        $this->assertEquals(18, $calculator->calculate($rectangle)['perimeter']);
    }
}
