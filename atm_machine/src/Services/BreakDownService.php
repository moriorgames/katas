<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\AllowedAmount;
use App\Domain\Money;
use App\Domain\MoneyType;

class BreakDownService
{
    private const BREAK_ORDER = [
        [AllowedAmount::AMOUNT_1]
    ];

    /**
     * @param int $quantity
     * @return Money[]
     */
    public function break(int $quantity): array
    {
        return [new Money($quantity, MoneyType::Coin, AllowedAmount::AMOUNT_1)];
    }
}
