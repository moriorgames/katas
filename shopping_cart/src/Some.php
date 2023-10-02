<?php

declare(strict_types=1);

namespace App;

class Some
{
    public function __construct(private readonly SomeService $someService)
    {
    }

    public function foo(): bool
    {
        return $this->someService->get();
    }
}
