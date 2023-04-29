<?php

declare(strict_types=1);

namespace Domains\Content\Processes\Tasks;

use App\Models\User;
use App\Notifications\Sources\NewSourceRegistered;
use Closure;
use Domains\Content\Processes\Payloads\AddSourcePayload;
use JustSteveKing\BusinessProcess\Contracts\ProcessPayload;
use JustSteveKing\BusinessProcess\Contracts\TaskContract;

final class NotifyUserOfSourceBeingAdded implements TaskContract
{
    public function __invoke(AddSourcePayload|ProcessPayload $payload, Closure $next): mixed
    {
        /**
         * @var User $user
         */
        $user = User::query()->find(
            id: $payload->user,
        );

        $user->notify(new NewSourceRegistered(
            source: $payload->payload,
        ));

        return $next($payload);
    }
}
