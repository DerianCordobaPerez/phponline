<?php

declare(strict_types=1);

namespace Infrastructure\Content\Queries;

use Illuminate\Database\Eloquent\Collection;

interface FetchUserSourcesContract
{
    public function handle(string $user): Collection;
}
