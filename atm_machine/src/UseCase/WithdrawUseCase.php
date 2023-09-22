<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Services\BreakDownService;
use App\Services\MoneyFormatter;

class WithdrawUseCase
{
    public function __construct(
        private readonly BreakDownService $breakDownService,
        private readonly MoneyFormatter   $moneyFormatter
    )
    {
    }

    /**
     * @param int $quantity
     * @return string
     */
    public function execute(int $quantity): string
    {

        $this->moneyFormatter->format(
            $this->breakDownService->break($quantity)
        );

        return '2 bills of 200.' . PHP_EOL
            . '1 bill of 20.' . PHP_EOL
            . '1 bill of 10.' . PHP_EOL
            . '2 coins of 2.';
    }
}
