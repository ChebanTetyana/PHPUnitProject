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
        $totalPrice = array_sum(array_column($this->items, 'price'));
        $itemCount = count($this->items);
        $discountedTotal = $this->strategy->calculateTotal($itemCount, $totalPrice);

        return [
            'item_count' => $itemCount,
            'total_price'=> $totalPrice,
            'discounted_price'=>$discountedTotal
        ];
    }
}