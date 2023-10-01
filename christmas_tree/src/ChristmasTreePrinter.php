<?php

declare(strict_types=1);

namespace App;

class ChristmasTreePrinter
{
    public function print(int $height): void
    {
        $output = '';
        for ($y = 0; $y < $height; $y++) {
            $output .= 'X';
            $output .= PHP_EOL;
        }
        $output .= '|';

        print  $output;
    }
}
