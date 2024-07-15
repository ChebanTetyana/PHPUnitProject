<?php

namespace Cheba\PhpUnit\Tests;

use Cheba\PhpUnit\MathHelper;
use PHPUnit\Framework\TestCase;

class MathHelperTest extends TestCase
{
    public function testIsPrime()
    {
        $mathHelper = new MathHelper();

        $result = $mathHelper->isPrime(11);
        $this->assertTrue($result);

        $result = $mathHelper->isPrime(12);
        $this->assertFalse($result);
    }

    public function testGcd()
    {
        $mathHelper = new MathHelper();

        $result = $mathHelper->gcd(56, 98);
        $this->assertEquals(14, $result);

        $result = $mathHelper->gcd(72, 27);
        $this->assertEquals(9, $result);
    }

    public function testCoprime()
    {
        $mathHelper = new MathHelper();

        $result = $mathHelper->coprime(35, 64);
        $this->assertTrue($result);

        $result = $mathHelper->coprime(14, 21);
        $this->assertFalse($result);
    }
}
