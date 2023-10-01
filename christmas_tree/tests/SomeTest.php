<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class SomeTest extends TestCase
{
    use ProphecyTrait;

    public function testPrintChristmasTreeOfHeight2()
    {
        print 'X';

        $expectedString = <<< PRINT
X
PRINT;


        $this->expectOutputString($expectedString);
    }
}
