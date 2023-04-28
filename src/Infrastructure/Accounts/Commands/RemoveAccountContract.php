<?php

declare(strict_types=1);

namespace Infrastructure\Accounts\Commands;

interface RemoveAccountContract
{
    public function handle(string $user): bool;
}
