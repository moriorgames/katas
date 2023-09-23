<?php

declare(strict_types=1);

namespace App\Domain;

enum Amount: int
{
    case AMOUNT_500 = 500;
    case AMOUNT_200 = 200;
    case AMOUNT_100 = 100;
    case AMOUNT_50 = 50;
    case AMOUNT_20 = 20;
    case AMOUNT_10 = 10;
    case AMOUNT_5 = 5;
    case AMOUNT_2 = 2;
    case AMOUNT_1 = 1;
}
