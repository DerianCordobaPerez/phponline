<?php

declare(strict_types=1);

namespace Domains\Content\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Content\Queries\FetchUserSourcesContract;

final class FetchUserSources implements FetchUserSourcesContract
{
    public function handle(string $user): Collection
    {
        return Source::query()
            ->where('user_id', $user)
            ->get();
    }
}
