<?php

declare(strict_types=1);

namespace App\Domain;

class Money
{
    public readonly MoneyType $type;

    /**
     * @param int $quantity
     * @param Amount $amount
     */
    public function __construct(public readonly int $quantity, public readonly Amount $amount)
    {
        $this->setType($this->amount);
    }

    private function setType(Amount $amount): void
    {
        if ($amount->value >= Amount::AMOUNT_10->value) {
            $this->type = MoneyType::Bill;
            return;
        }
        $this->type = MoneyType::Coin;
    }
}
