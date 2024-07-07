<?php

namespace Cheba\PhpUnit\tests;

use Cheba\PhpUnit\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $result = $calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function testMultiplication()
    {
        $calculator = new Calculator();
        $result = $calculator->multiplication(2, 3);
        $this->assertEquals(6, $result);
    }

    public function testIsPrime()
    {
        $calculator = new Calculator();
        $result = $calculator->isPrime(11);
        $this->assertTrue($result);
    }

    public function testGcd()
    {
        $calculator = new Calculator();
        $result = $calculator->gcd(56, 98);
        $this->assertEquals(14, $result);
    }

    public function testCoprime()
    {
        $calculator = new Calculator();
        $result = $calculator->coprime(35, 64);
        $this->assertTrue($result);
    }
}
