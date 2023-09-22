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
            // @TODO we have to deal with singular plural
            $output .= $money->quantity . ' ' . $money->type . ' of ' . $money->amount . '.' . PHP_EOL;
        }

        return $output;
    }
}
