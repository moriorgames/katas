<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Money;

class MoneyFormatter
{
    /**
     * @param Money[] $listOfMoney
     * @return string
     */
    public function format(array $listOfMoney): string
    {
        $output = '';
        foreach ($listOfMoney as $money) {
            $plural = '';
            if ($money->quantity > 1) {
                $plural = 's';
            }
            $output .= $money->quantity . ' ' . $money->type . $plural . ' of ' . $money->amount . '.' . PHP_EOL;
        }

        return $output;
    }
}
