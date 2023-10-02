<?php

declare(strict_types=1);

namespace App;

class ChristmasTreePrinter
{
    private const EMPTY = ' ';
    private const TREE = 'X';
    private const TREE_BASE = '|';

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
        $output .= self::TREE_BASE;
        $output .= $this->emptySpace($height, 1);

        print  $output;
    }

    private function emptySpace(int $height, int $y): string
    {
        $padding = $height - $y;
        return str_repeat(self::EMPTY, $padding);
    }

    private function fillTree(int $y): string
    {
        $fill = ($y - 1) * 2 + 1;
        return str_repeat(self::TREE, $fill);
    }
}
