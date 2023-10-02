<?php

declare(strict_types=1);

namespace App;

class Product
{
    private string $name;
    private float $cost;
    private int $revenue;
    private int $tax;

    public function __construct(string $name, float $cost, int $revenue, int $tax)
    {
        $this->name = $name;
        $this->cost = $cost;
        $this->revenue = $revenue;
        $this->tax = $tax;
    }

    public function calculatePricePerUnit(): float
    {
        $pricePerUnit = ceil($this->cost * (1 + $this->revenue / 100) * 100);

        return $pricePerUnit / 100;
    }
}
