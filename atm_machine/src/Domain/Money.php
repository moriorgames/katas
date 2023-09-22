<?php

declare(strict_types=1);

namespace App\Domain;

class Money
{
    /**
     * @param int $quantity
     * @param MoneyType $type
     * @param AllowedAmount $amount
     */
    public function __construct(
        public readonly int           $quantity,
        public readonly MoneyType     $type,
        public readonly AllowedAmount $amount
    )
    {
        // @TODO here we can create a rule that says Only amount equal or greater than 10 can be of type bill
    }
}
