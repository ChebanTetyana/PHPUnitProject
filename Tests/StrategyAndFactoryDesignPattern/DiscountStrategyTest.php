<?php

namespace Cheba\PhpUnit\Tests\StrategyAndFactoryDesignPattern;

use Cheba\PhpUnit\Enums\ClientType;
use Cheba\PhpUnit\StrategyAndFactoryDesignPattern\StrategyFactory;
use PHPUnit\Framework\TestCase;

class DiscountStrategyTest extends TestCase
{
    public function testStandardStrategyAppliesNoDiscount()
    {
        $strategy = StrategyFactory::createStrategy(ClientType::Standard);
        $items = [
            ['price' => 1000]
        ];

        $calculatedTotal = $strategy->calculateTotal($items);

        $this->assertEquals(1000, $calculatedTotal, "Standard client pay the full price");
    }

    public function testWholeSaleStrategyApplies10PercentDiscount()
    {
        $strategy = StrategyFactory::createStrategy(ClientType::Wholesale);
        $items = [
            ['price' => 1000]
        ];

        $calculatedTotal = $strategy->calculateTotal($items);

        $this->assertEquals(900, $calculatedTotal,
            "WholeSale client with 10 Items should receive a 10% discount");
    }

    public function testWholeSaleStrategyApplies20PercentDiscount()
    {
        $strategy = StrategyFactory::createStrategy(ClientType::Wholesale);
        $items = array_fill(0, 20, ['price' => 100]);

        $calculatedTotal = $strategy->calculateTotal($items);

        $this->assertEquals(1600, $calculatedTotal,
            "WholeSale client with more 15 Items should receive a 20% discount");
    }
}