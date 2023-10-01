<?php

declare(strict_types=1);

namespace Tests;

use App\ChristmasTreePrinter;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class ChristmasTreePrinterTest extends TestCase
{
    use ProphecyTrait;

    public function testPrintChristmasTreeOfHeight2()
    {
        $sut = new ChristmasTreePrinter();

        $sut->print();

        $expectedString = <<< PRINT
 X
XXX
 |
PRINT;
        $this->expectOutputString($expectedString);
    }
}
