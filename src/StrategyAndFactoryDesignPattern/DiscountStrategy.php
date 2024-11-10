<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

interface DiscountStrategy
{
    public function calculateTotal(int $items, int $totalPrice): int;
}