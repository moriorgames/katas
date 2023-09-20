<?php

declare(strict_types=1);

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private FizzBuzz $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new FizzBuzz();
    }

    public function testReturnNumberNoDivisibleByThreeAndFive()
    {
        $this->assertEquals('2', $this->sut->execute(2));
    }

    public function testDivisibleByThree()
    {
        $this->assertEquals('Fizz', $this->sut->execute(3));
    }

    public function testDivisibleByFive()
    {
        $this->assertEquals('Buzz', $this->sut->execute(5));
    }
}
