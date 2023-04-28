<?php

declare(strict_types=1);

namespace Infrastructure\Accounts\Commands;

use App\Models\User;
use App\Http\Payloads\Web\Auth\RegistrationPayload;
use Illuminate\Database\Eloquent\Model;

interface CreateUserAccountContract
{
    public function handle(RegistrationPayload $payload): Model|User;
}
