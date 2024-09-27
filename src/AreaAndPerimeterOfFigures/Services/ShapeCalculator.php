<?php

namespace Cheba\PhpUnit\AreaAndPerimeterOfFigures\Services;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Interfaces\Shape;

class ShapeCalculator
{
    public function calculate(Shape $shape): array
    {
        return [
            'area' => $shape->getArea(),
            'perimeter' => $shape->getPerimeter()
        ];
    }
}
