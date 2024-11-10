<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

class WholeSaleStrategy implements DiscountStrategy
{
    public function calculateTotal(int $items, int $totalPrice): int
    {
        if ($items > 15) {
            return $totalPrice * 0.8;
        }
        return $totalPrice * 0.9;
    }
}