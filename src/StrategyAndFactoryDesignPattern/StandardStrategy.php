<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

class StandardStrategy implements DiscountStrategy
{
    public function calculateTotal(int $items, int $totalPrice): int
    {
        return $totalPrice;
    }
}