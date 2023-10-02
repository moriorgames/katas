<?php

declare(strict_types=1);

namespace App;

class ChristmasTreePrinter
{
    public function print(int $height): void
    {
        $output = '';
        for ($y = 1; $y <= $height; $y++) {
            $output .= $this->emptySpace($height, $y);
            $output .= $this->fillTree($y);
            $output .= $this->emptySpace($height, $y);
            $output .= PHP_EOL;
        }

        $output .= $this->emptySpace($height, 1);
        $output .= '|';
        $output .= $this->emptySpace($height, 1);

        print  $output;
    }

    private function emptySpace(int $height, int $y): string
    {
        $padding = $height - $y;
        return str_repeat(' ', $padding);
    }

    private function fillTree(int $y): string
    {
        $fill = ($y - 1) * 2 + 1;
        return str_repeat('X', $fill);
    }
}
