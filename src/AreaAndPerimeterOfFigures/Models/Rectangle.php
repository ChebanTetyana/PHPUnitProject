<?php

namespace Cheba\PhpUnit\AreaAndPerimeterOfFigures\Models;

use Cheba\PhpUnit\AreaAndPerimeterOfFigures\Interfaces\Shape;

class Rectangle implements Shape
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }

    public function getPerimeter(): float
    {
        return 2 * ($this->width + $this->height);
    }
}
