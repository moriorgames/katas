<?php

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testDivisibleByThree()
    {
        $this->assertEquals("Fizz", fizzbuzz(3));
    }
}
