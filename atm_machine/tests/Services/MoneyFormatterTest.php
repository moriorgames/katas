<?php

declare(strict_types=1);

namespace Tests\Services;

use App\Domain\AllowedAmount;
use App\Domain\Money;
use App\Services\MoneyFormatter;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    private MoneyFormatter $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new MoneyFormatter();
    }

    public function testGivenAListOfMoneyWithOneSingularBillIsAbleToFormatIntoString()
    {
        $quantity = 1;
        $money = new Money($quantity, AllowedAmount::AMOUNT_200);
        $listOfMoney = [
            $money,
        ];
        $result = $this->sut->format($listOfMoney);

        $expectedResult = '1 bill of 200.' . PHP_EOL;
        $this->assertEquals($expectedResult, $result);
    }

    public function testGivenAListOfMoneyWithMultipleBillIsAbleToFormatIntoString()
    {
        $quantity = 2;
        $money = new Money($quantity, AllowedAmount::AMOUNT_200);
        $listOfMoney = [
            $money,
        ];
        $result = $this->sut->format($listOfMoney);

        $expectedResult = '2 bills of 200.' . PHP_EOL;
        $this->assertEquals($expectedResult, $result);
    }

    public function testGivenAListOfMoneyWithBillsAndCoinsShouldFormatIntoString()
    {
        $quantity = 2;
        $money1 = new Money($quantity, AllowedAmount::AMOUNT_200);
        $quantity = 1;
        $money2 = new Money($quantity, AllowedAmount::AMOUNT_20);
        $quantity = 1;
        $money3 = new Money($quantity, AllowedAmount::AMOUNT_10);
        $quantity = 2;
        $money4 = new Money($quantity, AllowedAmount::AMOUNT_2);
        $listOfMoney = [
            $money1, $money2, $money3, $money4,
        ];
        $result = $this->sut->format($listOfMoney);

        $expectedResult = '2 bills of 200.' . PHP_EOL
            . '1 bill of 20.' . PHP_EOL
            . '1 bill of 10.' . PHP_EOL
            . '2 coins of 2.' . PHP_EOL;
        $this->assertEquals($expectedResult, $result);
    }
}
