<?php

declare(strict_types=1);

namespace Tests\Domain;

use App\Domain\AllowedAmount;
use App\Domain\Money;
use App\Domain\MoneyType;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testOneWillCreateMoneyTypeCoin()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_1);

        $this->assertEquals(MoneyType::Coin, $sut->type);
    }

    public function testTwoWillCreateMoneyTypeCoin()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_2);

        $this->assertEquals(MoneyType::Coin, $sut->type);
    }

    public function testFiveWillCreateMoneyTypeCoin()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_5);

        $this->assertEquals(MoneyType::Coin, $sut->type);
    }

    public function testTwentyWillCreateMoneyTypeBill()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_20);

        $this->assertEquals(MoneyType::Bill, $sut->type);
    }

    public function testFiftyWillCreateMoneyTypeBill()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_50);

        $this->assertEquals(MoneyType::Bill, $sut->type);
    }

    public function testOneHundredWillCreateMoneyTypeBill()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_100);

        $this->assertEquals(MoneyType::Bill, $sut->type);
    }

    public function testTwoHundredWillCreateMoneyTypeBill()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_200);

        $this->assertEquals(MoneyType::Bill, $sut->type);
    }

    public function testFiveHundredWillCreateMoneyTypeBill()
    {
        $sut = new Money(1, AllowedAmount::AMOUNT_500);

        $this->assertEquals(MoneyType::Bill, $sut->type);
    }
}
