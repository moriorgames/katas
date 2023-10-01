<?php

declare(strict_types=1);

namespace App;

class ChristmasTreePrinter
{
    public function print(int $height): void
    {
        $output = '';
        for ($y = 1; $y <= $height; $y++) {
            $padding = $height - $y;
            $fill = $y - 1;
            for ($x = 0; $x < $padding; $x++) {
                $output .= ' ';
            }
            for ($x = 0; $x < $fill; $x++) {
                $output .= 'X';
            }
            $output .= 'X';
            for ($x = 0; $x < $fill; $x++) {
                $output .= 'X';
            }
            for ($x = 0; $x < $padding; $x++) {
                $output .= ' ';
            }
            $output .= PHP_EOL;
        }

        $padding = $height - 1;
        for ($x = 0; $x < $padding; $x++) {
            $output .= ' ';
        }
        $output .= '|';
        for ($x = 0; $x < $padding; $x++) {
            $output .= ' ';
        }

        print  $output;
    }
}
