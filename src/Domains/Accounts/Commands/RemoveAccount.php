<?php

declare(strict_types=1);

namespace Domains\Accounts\Commands;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Infrastructure\Accounts\Commands\RemoveAccountContract;

final class RemoveAccount implements RemoveAccountContract
{
    public function handle(string $user): bool
    {
        return DB::transaction(
            callback: static fn () => (bool) User::query()->where(
                'id',
                $user
            )->delete(),
            attempts: 2,
        );
    }
}
