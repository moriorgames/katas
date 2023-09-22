<?php

declare(strict_types=1);

namespace App\Domain;

enum MoneyType: string
{
    case Bill = 'bill';
    case Coin = 'coin';
}
