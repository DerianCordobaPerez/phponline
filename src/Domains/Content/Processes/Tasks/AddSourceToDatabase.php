<?php

declare(strict_types=1);

namespace Domains\Content\Processes\Tasks;

use Closure;
use Domains\Content\Processes\Exceptions\CouldNotAddSourceToDatabase;
use Domains\Content\Processes\Payloads\AddSourcePayload;
use Infrastructure\Content\Commands\RegisterNewSourceContract;
use JustSteveKing\BusinessProcess\Contracts\ProcessPayload;
use JustSteveKing\BusinessProcess\Contracts\TaskContract;
use Throwable;

final readonly class AddSourceToDatabase implements TaskContract
{
    /**
     * @param RegisterNewSourceContract $command
     */
    public function __construct(
        private RegisterNewSourceContract $command,
    ) {}

    /**
     * @param AddSourcePayload|ProcessPayload<AddSourcePayload> $payload
     * @param Closure $next
     * @return mixed
     * @throws CouldNotAddSourceToDatabase
     */
    public function __invoke(AddSourcePayload|ProcessPayload $payload, Closure $next): mixed
    {
        try {
            $source = $this->command->handle(
                payload: $payload->payload,
                user: $payload->user,
            );
        } catch (Throwable $exception) {
            throw new CouldNotAddSourceToDatabase(
                message: $exception->getMessage(),
            );
        }

        $payload->source = $source;

        return $next($payload);
    }
}
