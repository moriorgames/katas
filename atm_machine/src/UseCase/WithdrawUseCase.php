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
        return $this->moneyFormatter->format(
            $this->breakDownService->break($quantity)
        );
    }
}
