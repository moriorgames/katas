<?php

declare(strict_types=1);

namespace Tests\UseCase;

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
        $breakDownServiceExpectation = $breakDownService
            ->break(Argument::type('int'))
            ->willReturn([]);
        /** @var MethodProphecy $moneyFormatterExpectation */
        $moneyFormatterExpectation = $moneyFormatter->format(Argument::type('array'));

        $quantity = 434;
        $sut->execute($quantity);

        $breakDownServiceExpectation->shouldBeCalledOnce();
        $moneyFormatterExpectation->shouldBeCalledOnce();
    }
}
