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

    /**
     * @param int $quantity
     * @return Money[]
     */
    public function break(int $quantity): array
    {
        $return = [];
        /** @var AllowedAmount $order */
        foreach (self::BREAK_ORDER as $order) {
            if ($quantity === $order->value) {
                $quantity = $quantity / $order->value;
                $return[] = new Money($quantity, $order);
            }
        }

        return $return;
    }
}
