<?php

declare(strict_types=1);

namespace Domains\Accounts\Commands;

use App\Models\User;
use App\Http\Payloads\Web\Auth\RegistrationPayload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Accounts\Commands\CreateUserAccountContract;

final class CreateUserAccount implements CreateUserAccountContract
{
    public function handle(RegistrationPayload $payload): Model|User
    {
        return DB::transaction(
            callback: static fn () => User::query()->create(
                attributes: $payload->toArray(),
            ),
            attempts: 2,
        );
    }
}
