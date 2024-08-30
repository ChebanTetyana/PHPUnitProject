<?php

namespace Cheba\PhpUnit\FiguresCalculatorTaskIntoPoints\Interfaces;

interface Shape
{
    public function getArea(): float;
    public function getPerimeter():float;
    public function getPoints(): array;
}
