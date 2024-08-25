<?php

namespace Cheba\PhpUnit\Tests\AreaAndPerimeterOfFigures\Services;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Interfaces\Shape;
use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Services\ShapeCalculator;
use PHPUnit\Framework\TestCase;

class ShapeCalculatorWithStubTest extends TestCase
{
    public function testCalculateArea()
    {
        $shapeStub = $this->createStub(Shape::class);

        $shapeStub->method('getArea')
            ->willReturn(25.0);

        $shapeStub->method('getPerimeter')
            ->willReturn(20.0);

        $calculator = new ShapeCalculator();
        $result = $calculator->calculate($shapeStub);

        $this->assertEquals(25.0, $result['area']);
        $this->assertEquals(20.0, $result['perimeter']);
    }
}
