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
            $output .= $this->emptySpace($padding);
            $output .= $this->fillTree($fill);
            $output .= 'X';
            $output .= $this->fillTree($fill);
            $output .= $this->emptySpace($padding);
            $output .= PHP_EOL;
        }

        $padding = $height - 1;
        $output .= $this->emptySpace($padding);
        $output .= '|';
        $output .= $this->emptySpace($padding);

        print  $output;
    }

    private function emptySpace(int $padding): string
    {
        return str_repeat(' ', $padding);
    }

    private function fillTree(int $fill): string
    {
        return str_repeat('X', $fill);
    }
}
