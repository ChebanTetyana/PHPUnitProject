<?php

namespace Cheba\PhpUnit;

class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function multiplication($a, $b):int
    {
        return $a * $b;
    }

    public function division($a, $b):int
    {
        if ($b === 0) {
            throw new \InvalidArgumentException('Division by xero');
        }
        return $a / $b;
    }
}
