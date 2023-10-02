<?php

declare(strict_types=1);

namespace Tests;

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @return void
     * @dataProvider productsData
     */
    public function testProductPricePerUnitIsCalculatedBasedOnProductCostPlusPercentageOfRevenue(
        $name,
        $cost,
        $revenue,
        $pricePerUnit,
        $tax,
    )
    {
        // @TODO in order to have more consistent data on prices we can apply Money Pattern
        $sut = new Product($name, $cost, $revenue, $tax);

        $result = $sut->calculatePricePerUnit();

        $this->assertEquals($pricePerUnit, $result);
    }

    public function productsData(): array
    {
        return [
            // Name | Cost | % Revenue | Price per unit | Tax | Final price |
            ['Iceberg 🥬', 1.55, 15, 1.79, 21, 2.17],
            ['Tomato 🍅', 0.52, 15, 0.60, 21, 0.73],
            ['Chicken 🍗', 1.34, 12, 1.51, 21, 1.83],
            ['Bread 🍞', 0.71, 12, 0.80, 10, 0.88],
            ['Corn 🌽', 1.21, 12, 1.36, 10, 1.50],
        ];

    }
}
