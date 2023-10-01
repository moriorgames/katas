<?php

declare(strict_types=1);

namespace Tests;

use App\ChristmasTreePrinter;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class ChristmasTreePrinterTest extends TestCase
{
    use ProphecyTrait;

    private ChristmasTreePrinter $sut;

    protected function setUp():void
    {
        parent::setUp();
        $this->sut = new ChristmasTreePrinter();
    }

    public function testPrintChristmasTreeOfHeight1()
    {
        $height = 1;
        $this->sut->print($height);

        $expectedString = <<< PRINT
X
|
PRINT;
        $this->expectOutputString($expectedString);
    }

//    public function testPrintChristmasTreeOfHeight2()
//    {
//        $height = 2;
//        $this->sut->print($height);
//
//        $expectedString = <<< PRINT
// X
//XXX
// |
//PRINT;
//        $this->expectOutputString($expectedString);
//    }
//
//    public function testPrintChristmasTreeOfHeight3()
//    {
//        $this->sut->print();
//
//        $expectedString = <<< PRINT
//  X
// XXX
//XXXXX
//  |
//PRINT;
//        $this->expectOutputString($expectedString);
//    }
}
