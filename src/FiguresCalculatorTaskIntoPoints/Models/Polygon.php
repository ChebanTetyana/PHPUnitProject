<?php

namespace Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Models;

use Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Interfaces\Shape;

class Polygon implements Shape
{
    private array $points;

    public function __construct(array $points)
    {
        $this->points = $points;
    }

    public function getArea(): float
    {
        $area = 0.0;
        $numPoints = count($this->points);

        for ($i = 0; $i < $numPoints; $i++) {
            $j = ($i + 1) % $numPoints;
            $area += $this->points[$i]->getX() * $this->points[$j]->getY();
            $area -= $this->points[$j]->getX() * $this->points[$i]->getY();
        }

        return abs($area / 2.0);
    }

    public function getPerimeter():float
    {
        $perimeter = 0.0;
        $numPoints = count($this->points);

        for ($i = 0; $i < $numPoints; $i++) {
            $j = ($i + 1) % $numPoints;
            $dx = $this->points[$j]->getX() - $this->points[$i]->getX();
            $dy = $this->points[$j]->getY() - $this->points[$i]->getY();
            $perimeter += sqrt($dx * $dx + $dy * $dy);
        }

        return $perimeter;
    }

    public function getPoints(): array
    {
        return $this->points;
    }
}
