<?php

namespace Cheba\PhpUnit\StrategyAndFactoryDesignPattern;

use Cheba\PhpUnit\Enums\ClientType;

class StrategyFactory
{
    public static function createStrategy(ClientType $clientType): DiscountStrategy
    {
        return match ($clientType) {
            ClientType::Wholesale => new WholesaleStrategy(),
            ClientType::Standard => new StandardStrategy(),
        };
    }
}