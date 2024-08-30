<?php

namespace Cheba\PhpUnit\Tests\FiguresCalculatorTaskIntoPoints;

use Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Models\Point;
use Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Models\Polygon;
use Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Services\ShapeCalculator;
use PHPUnit\Framework\TestCase;

class PolygonTest extends TestCase
{
    public function testPointCreation()
    {
        $point = new Point(3.0, 4.0);

        $this->assertEquals(3.0, $point->getX());
        $this->assertEquals(4.0, $point->getY());
    }

    public function testTriangleArea()
    {
        $points = [
            new Point(0, 0),
            new Point(4, 0),
            new Point(4, 3),
        ];

        $polygon = new Polygon($points);
        $this->assertEquals(12.0, $polygon->getPerimeter());
    }

    public function testShapeCalculator()
    {
        $points = [
            new Point(0, 0),
            new Point(4, 0),
            new Point(4, 3),
        ];

        $polygon = new Polygon($points);
        $calculator = new ShapeCalculator();

        $result = $calculator->calculate($polygon);

        $this->assertEquals(6.0, $result['area']);
        $this->assertEquals(12.0, $result['perimeter']);
    }
}
