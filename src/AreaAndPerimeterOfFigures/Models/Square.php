<?php

namespace Cheba\PhpUnit\AreaAndPerimeterOfFigures\Models;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Interfaces\Shape;

class Square implements Shape
{
    private $side;

    public function __construct(float $side)
    {
        $this->side = $side;
    }

    public function getArea(): float
    {
        return pow($this->side, 2);
    }

    public function getPerimeter(): float
    {
        return 4 * $this->side;
    }
}
