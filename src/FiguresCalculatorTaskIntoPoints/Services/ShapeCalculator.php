<?php

namespace Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Services;

use Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Models\Polygon;

class ShapeCalculator
{
    public function calculate(Polygon $polygon): array
    {
        return [
            'area'=>$polygon->getArea(),
            'perimeter'=>$polygon->getPerimeter()
        ];
    }
}
