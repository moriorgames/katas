<?php

declare(strict_types=1);

namespace Tests;

use App\Some;
use App\SomeService;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class SomeTest extends TestCase
{
    use ProphecyTrait;

    public function testFoo()
    {
        $someService = $this->prophesize(SomeService::class);
        $someServiceExpectation = $someService->get()->willReturn(true);

        $sut = new Some($someService->reveal());

        $this->assertTrue($sut->foo());
        $someServiceExpectation->shouldBeCalledOnce();
    }
}
