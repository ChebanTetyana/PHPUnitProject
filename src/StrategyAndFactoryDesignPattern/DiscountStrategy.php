<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

interface DiscountStrategy
{
    public function calculateTotal(array $items): float;
}