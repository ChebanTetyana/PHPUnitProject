<?php

namespace Cheba\PhpUnit\Tests\StrategyAndFactoryDesignPattern;

use Cheba\PhpUnit\Enums\ClientType;
use Cheba\PhpUnit\StrategyAndFactoryDesignPattern\StandardStrategy;
use Cheba\PhpUnit\StrategyAndFactoryDesignPattern\StrategyFactory;
use Cheba\PhpUnit\StrategyAndFactoryDesignPattern\WholesaleStrategy;
use PHPUnit\Framework\TestCase;

class StrategyFactoryTest extends TestCase
{
    public function testFactoryCreatesStandardStrategy()
    {
        $strategy = StrategyFactory::createStrategy(ClientType::Standard);
        $this->assertInstanceOf(StandardStrategy::class, $strategy,
            "Factory should create a StandardStrategy clients");
    }

    public function testFactoryCreatesWholesaleStrategy()
    {
        $strategy = StrategyFactory::createStrategy(ClientType::Wholesale);
        $this->assertInstanceOf(WholesaleStrategy::class, $strategy,
            "Factory should create a WholesaleStrategy clients");
    }
}