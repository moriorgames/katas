<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\AllowedAmount;
use App\Domain\Money;

class BreakDownService
{
    private const BREAK_ORDER = [
        AllowedAmount::AMOUNT_2,
        AllowedAmount::AMOUNT_1,
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

            /** @var AllowedAmount $order */
            foreach (self::BREAK_ORDER as $order) {
                $this->times = 0;
                if ($remainingQuantity >= $order->value) {
                    $quantity = $this->countQuantity($remainingQuantity, $order);
                    $remainingQuantity -= $order->value * $quantity;
                    $return[] = new Money($quantity, $order);

                    break;
                }
            }
        }

        return $return;
    }

    private function countQuantity(int $quantity, AllowedAmount $amount): int
    {
        if ($quantity >= $amount->value * ($this->times + 1)) {
            $this->times++;
            $this->countQuantity($quantity, $amount);
        }

        return $this->times;
    }
}
