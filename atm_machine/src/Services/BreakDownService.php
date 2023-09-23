<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Amount;
use App\Domain\Money;

class BreakDownService
{
    private const BREAK_ORDER_AMOUNT = [
        Amount::AMOUNT_500,
        Amount::AMOUNT_200,
        Amount::AMOUNT_100,
        Amount::AMOUNT_50,
        Amount::AMOUNT_20,
        Amount::AMOUNT_10,
        Amount::AMOUNT_5,
        Amount::AMOUNT_2,
        Amount::AMOUNT_1,
    ];

    private int $times = 0;

    /**
     * @param int $quantity
     * @return Money[]
     */
    public function break(int $quantity): array
    {
        $return = [];
        $remainingQuantity = $quantity;
        while ($remainingQuantity > 0) {

            /** @var Amount $amount */
            foreach (self::BREAK_ORDER_AMOUNT as $amount) {
                $this->times = 0;
                if ($remainingQuantity >= $amount->value) {
                    $quantity = $this->countQuantityRecursive($remainingQuantity, $amount);
                    $remainingQuantity -= $amount->value * $quantity;
                    $return[] = new Money($quantity, $amount);

                    break;
                }
            }
        }

        return $return;
    }

    private function countQuantityRecursive(int $quantity, Amount $amount): int
    {
        if ($quantity >= $amount->value * ($this->times + 1)) {
            $this->times++;
            $this->countQuantityRecursive($quantity, $amount);
        }

        return $this->times;
    }
}
