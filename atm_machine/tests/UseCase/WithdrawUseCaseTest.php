<?php

declare(strict_types=1);

use App\UseCase\WithdrawUseCase;
use PHPUnit\Framework\TestCase;

class WithdrawUseCaseTest extends TestCase
{
    public function testUserWithdrawSomeQuantityAndReturnsStringContainingMoney()
    {
        $sut = new WithdrawUseCase();

        $quantity = 434;
        $result = $sut->execute($quantity);

        $expectedResult = '2 bills of 200.' . PHP_EOL
            . '1 bill of 20.' . PHP_EOL
            . '1 bill of 10.' . PHP_EOL
            . '2 coins of 2.';
        $this->assertEquals($expectedResult, $result);
    }
}
