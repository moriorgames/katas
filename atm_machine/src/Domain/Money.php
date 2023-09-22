<?php

declare(strict_types=1);

namespace App\Domain;

class Money
{
    public readonly MoneyType $type;

    /**
     * @param int $quantity
     * @param AllowedAmount $amount
     */
    public function __construct(public readonly int $quantity, public readonly AllowedAmount $amount)
    {
        $this->setType($this->amount);
    }

    private function setType(AllowedAmount $amount): void
    {
        if ($amount->value >= AllowedAmount::AMOUNT_10->value) {
            $this->type = MoneyType::Bill;
            return;
        }
        $this->type = MoneyType::Coin;
    }
}
