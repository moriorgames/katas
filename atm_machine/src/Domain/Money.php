<?php

declare(strict_types=1);

namespace App\Domain;

class Money
{

    /**
     * @param int $quantity
     * @param string $type
     * @param int $amount
     * @TODO $type AND $amount feels more like an Enum than raw values to protect data consistency
     */
    public function __construct(
        public readonly int    $quantity,
        public readonly string $type,
        public readonly int    $amount
    )
    {
    }
}
