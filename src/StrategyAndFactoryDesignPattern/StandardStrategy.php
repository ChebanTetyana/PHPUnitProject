<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

class StandardStrategy implements DiscountStrategy
{
    public function calculateTotal(array $items): float
    {
        if (empty($items)) {
            return 0;
        }

        return (int) array_sum(array_column($items, 'price'));
    }
}