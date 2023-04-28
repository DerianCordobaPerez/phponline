<?php

declare(strict_types=1);

namespace Infrastructure\Accounts\Commands;

interface UpdateAccountContract
{
    public function handle(string $user, array $attributes): bool;
}
