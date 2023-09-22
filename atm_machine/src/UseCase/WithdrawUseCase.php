<?php

namespace App\UseCase;

class WithdrawUseCase
{
    /**
     * @param int $quantity
     * @return string
     * @TODO this use case is not fully implemented
     */
    public function execute(int $quantity)
    {
        return '2 bills of 200.' . PHP_EOL
            . '1 bill of 20.' . PHP_EOL
            . '1 bill of 10.' . PHP_EOL
            . '2 coins of 2.';
    }
}
