<?php

declare(strict_types=1);

namespace App;

class FizzBuzz
{
    public function execute(int $int): string
    {
        if ($int % 3 === 0) {
            return 'Fizz';
        }
        if ($int % 5 === 0) {
            return 'Buzz';
        }
        return (string)$int;
    }
}
