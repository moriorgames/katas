<?php

declare(strict_types=1);

namespace Tests\Services;

use App\Domain\AllowedAmount;
use App\Domain\Money;
use App\Services\BreakDownService;
use PHPUnit\Framework\TestCase;

class BreakDownServiceTest extends TestCase
{
    private BreakDownService $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new BreakDownService();
    }

    public function testGivenOneWillReturnOneCoinOfOne()
    {
        $quantity = 1;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_1), $result[0]);
    }

    public function testGivenTwoWillReturnOneCoinOfTwo()
    {
        $quantity = 2;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_2), $result[0]);
    }

    public function testGivenFourWillReturnTwoCoinsOfTwo()
    {
        $quantity = 4;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(2, AllowedAmount::AMOUNT_2), $result[0]);
    }

    public function testGivenFortyWillReturnTwoBillsOfTwenty()
    {
        $quantity = 40;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(2, AllowedAmount::AMOUNT_20), $result[0]);
    }

    public function testGivenOneHundredWillReturnOneBillOfOneHundred()
    {
        $quantity = 100;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_100), $result[0]);
    }

    public function testGivenFourHundredWillReturnTwoBillsOfTwoHundred()
    {
        $quantity = 400;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(2, AllowedAmount::AMOUNT_200), $result[0]);
    }

    public function testGivenThousandWillReturnTwoBillsOfFiveHundred()
    {
        $quantity = 1000;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(2, AllowedAmount::AMOUNT_500), $result[0]);
    }

    public function testGivenFourHundredFiftySixWillReturnCorrectListOfMoney()
    {
        $quantity = 456;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(2, AllowedAmount::AMOUNT_200), $result[0]);
        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_50), $result[1]);
        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_5), $result[2]);
        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_1), $result[3]);
        $this->assertArrayNotHasKey(4, $result);
    }
}
