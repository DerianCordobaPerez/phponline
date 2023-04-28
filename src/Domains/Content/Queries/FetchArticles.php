<?php

declare(strict_types=1);

namespace Domains\Content\Queries;

use App\Models\Article;
use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Infrastructure\Content\Queries\FetchArticlesContract;

final class FetchArticles implements FetchArticlesContract
{
    public function handle(Status $status): Builder
    {
        return Article::query()->where('status', $status);
    }
}
