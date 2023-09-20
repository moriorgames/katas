<?php

declare(strict_types=1);

namespace App;

class FizzBuzz
{
    public function execute(int $int): string
    {
        if ($this->isDivisibleByThreeAndFive($int)) {
            return 'FizzBuzz';
        }
        if ($this->isDivisibleByThree($int)) {
            return 'Fizz';
        }
        if ($this->isDivisibleByFive($int)) {
            return 'Buzz';
        }

        return (string)$int;
    }

    private function isDivisibleByThree(int $int): bool
    {
        return $int % 3 === 0;
    }

    private function isDivisibleByFive(int $int): bool
    {
        return $int % 5 === 0;
    }

    private function isDivisibleByThreeAndFive(int $int): bool
    {
        return $int % 15 === 0;
    }
}
