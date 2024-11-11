<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

class WholesaleStrategy implements DiscountStrategy
{
    public function calculateTotal(array $items): float
    {
        if (empty($items)) {
            return 0;
        }

        if (count($items) > 15) {
            return (int) array_sum(array_column($items, 'price')) * 0.8;
        }
        return (int) array_sum(array_column($items, 'price')) * 0.9;
    }
}