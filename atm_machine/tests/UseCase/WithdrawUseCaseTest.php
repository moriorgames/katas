<?php

declare(strict_types=1);

use App\Services\BreakDownService;
use App\UseCase\WithdrawUseCase;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\MethodProphecy;

class WithdrawUseCaseTest extends TestCase
{
    use ProphecyTrait;

    public function testUserWithdrawSomeQuantityAndReturnsStringContainingMoney()
    {
        $breakDownService = $this->prophesize(BreakDownService::class);
        $sut = new WithdrawUseCase($breakDownService->reveal());

        /** @var MethodProphecy $breakDownServiceExpectation */
        $breakDownServiceExpectation = $breakDownService->break();

        $quantity = 434;
        $result = $sut->execute($quantity);

        $expectedResult = '2 bills of 200.' . PHP_EOL
            . '1 bill of 20.' . PHP_EOL
            . '1 bill of 10.' . PHP_EOL
            . '2 coins of 2.';
        $this->assertEquals($expectedResult, $result);

        $breakDownServiceExpectation->shouldBeCalledOnce();

//        $moneyFormatterExpectation->shouldBeCalledOnce();
    }
}
