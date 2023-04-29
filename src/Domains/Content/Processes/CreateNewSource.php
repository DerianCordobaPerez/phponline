<?php

declare(strict_types=1);

namespace Domains\Content\Processes;

use Domains\Content\Processes\Tasks\AddSourceToDatabase;
use Domains\Content\Processes\Tasks\NotifyUserOfSourceBeingAdded;
use JustSteveKing\BusinessProcess\Process;

final class CreateNewSource extends Process
{
    protected array $tasks = [
        AddSourceToDatabase::class,
        NotifyUserOfSourceBeingAdded::class,
    ];
}
