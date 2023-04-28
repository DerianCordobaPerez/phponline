<?php

declare(strict_types=1);

namespace Domains\Accounts\Commands;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Infrastructure\Accounts\Commands\UpdateAccountContract;

final class UpdateAccount implements UpdateAccountContract
{
    public function handle(string $user, array $attributes): bool
    {
        return DB::transaction(
            callback: static fn () => (bool) User::query()->where(
                'id',
                $user,
            )->update($attributes),
            attempts: 2,
        );
    }
}
