<?php

declare(strict_types=1);

namespace Tests\Services;

use App\Domain\AllowedAmount;
use App\Domain\Money;
use App\Services\BreakDownService;
use PHPUnit\Framework\TestCase;

class BreakDownServiceTest extends TestCase
{
    private BreakDownService $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new BreakDownService();
    }

    public function testGivenOneWillReturnOneCoinOfOne()
    {
        $quantity = 1;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_1), $result[0]);
    }

    public function testGivenTwoWillReturnOneCoinOfTwo()
    {
        $quantity = 2;
        $result = $this->sut->break($quantity);

        $this->assertEquals(new Money(1, AllowedAmount::AMOUNT_2), $result[0]);
    }
}
