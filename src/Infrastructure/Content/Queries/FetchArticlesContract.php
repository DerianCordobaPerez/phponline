<?php

declare(strict_types=1);

namespace Infrastructure\Content\Queries;

use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Builder;

interface FetchArticlesContract
{
    public function handle(Status $status): Builder;
}
