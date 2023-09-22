<?php

declare(strict_types=1);

namespace Tests\Services;

use App\Domain\Money;
use App\Services\MoneyFormatter;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class MoneyFormatterTest extends TestCase
{
    use ProphecyTrait;

    public function testGivenAListOfMoneyWithOneSingularBillIsAbleToFormatIntoString()
    {
        $sut = new MoneyFormatter();

        $quantity = 1;
        $type = 'bill';
        $amount = 200;
        $money = new Money($quantity, $type, $amount);
        $listOfMoney = [
            $money,
        ];
        $result = $sut->format($listOfMoney);

        $expectedResult = '1 bill of 200.' . PHP_EOL;
        $this->assertEquals($expectedResult, $result);
    }
}
