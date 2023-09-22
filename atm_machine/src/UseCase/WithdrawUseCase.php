<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Services\BreakDownService;

class WithdrawUseCase
{
    public function __construct(private readonly BreakDownService $breakDownService)
    {
    }

    /**
     * @param int $quantity
     * @return string
     * @TODO this use case is not fully implemented
     */
    public function execute(int $quantity)
    {
        $this->breakDownService->break();

        return '2 bills of 200.' . PHP_EOL
            . '1 bill of 20.' . PHP_EOL
            . '1 bill of 10.' . PHP_EOL
            . '2 coins of 2.';
    }
}
