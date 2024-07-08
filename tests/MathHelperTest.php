<?php

namespace Cheba\PhpUnit\tests;

use Cheba\PhpUnit\MathHelper;
use PHPUnit\Framework\TestCase;

class MathHelperTest extends TestCase
{
    public function testIsPrime()
    {
        $mathHelper = new MathHelper();
        $result = $mathHelper->isPrime(11);
        $this->assertTrue($result);
    }

    public function testGcd()
    {
        $mathHelper = new MathHelper();
        $result = $mathHelper->gcd(56, 98);
        $this->assertEquals(14, $result);
    }

    public function testCoprime()
    {
        $mathHelper = new MathHelper();
        $result = $mathHelper->coprime(35, 64);
        $this->assertTrue($result);
    }
}
