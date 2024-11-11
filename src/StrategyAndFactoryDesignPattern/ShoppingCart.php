<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

class ShoppingCart
{
    private array $items = [];
    private DiscountStrategy $strategy;

    public function __construct(DiscountStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function addProduct(string $productName, int $price): void
    {
        $this->items[] = ['name' => $productName, 'price' => $price];
    }

    public function getSummary(): array
    {
        return [
            'item_count' => count($this->items),
            'total_price' => array_sum(array_column($this->items, 'price')),
            'discounted_price' => $this->strategy->calculateTotal($this->items),
        ];
    }
}