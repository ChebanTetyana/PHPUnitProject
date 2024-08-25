<?php

namespace Cheba\PhpUnit\Calculator;

class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function multiplication($a, $b): int
    {
        return $a * $b;
    }

    public function division($a, $b): int
    {
        if ($b === 0) {
            throw new \InvalidArgumentException('Division by zero');
        }
        return $a / $b;
    }
}
