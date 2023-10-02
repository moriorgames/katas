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
        for ($y = 1; $y <= $height; $y++) {
            print $this->emptySpace($height, $y);
            print $this->fillTree($y);
            print $this->emptySpace($height, $y);
            print PHP_EOL;
        }

        print $this->emptySpace($height, 1);
        print self::TREE_BASE;
        print $this->emptySpace($height, 1);
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
