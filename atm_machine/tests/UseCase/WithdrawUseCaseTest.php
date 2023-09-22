<?php

declare(strict_types=1);

use App\Services\BreakDownService;
use App\Services\MoneyFormatter;
use App\UseCase\WithdrawUseCase;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\MethodProphecy;

class WithdrawUseCaseTest extends TestCase
{
    use ProphecyTrait;

    public function testUserWithdrawSomeQuantityAndReturnsStringContainingMoney()
    {
        $breakDownService = $this->prophesize(BreakDownService::class);
        $moneyFormatter = $this->prophesize(MoneyFormatter::class);
        $sut = new WithdrawUseCase(
            $breakDownService->reveal(),
            $moneyFormatter->reveal(),
        );

        /** @var MethodProphecy $breakDownServiceExpectation */
        $breakDownServiceExpectation = $breakDownService->break(Argument::type('int'));
        /** @var MethodProphecy $moneyFormatterExpectation */
        $moneyFormatterExpectation = $moneyFormatter->format();

        $quantity = 434;
        $result = $sut->execute($quantity);

        $expectedResult = '2 bills of 200.' . PHP_EOL
            . '1 bill of 20.' . PHP_EOL
            . '1 bill of 10.' . PHP_EOL
            . '2 coins of 2.';
        $this->assertEquals($expectedResult, $result);

        $breakDownServiceExpectation->shouldBeCalledOnce();
        $moneyFormatterExpectation->shouldBeCalledOnce();
    }
}
