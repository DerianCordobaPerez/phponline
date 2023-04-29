<?php

declare(strict_types=1);

namespace Domains\Content\Commands;

use App\Models\Article;
use Domains\Content\DataObjects\FeedEntry;
use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Content\Commands\PublishNewArticleContract;

final class PublishNewArticle implements PublishNewArticleContract
{
    public function handle(FeedEntry $entry, string $source, string $user): Model|Article
    {
        return DB::transaction(
            callback: static fn () => Article::query()->updateOrCreate(
                attributes: [
                    'canonical_url' => $entry->url,
                ],
                values: [
                    ...$entry->toArray(),
                    'status' => Status::PUBLISHED,
                    'source_id' => $source,
                    'user_id' => $user,
                ]
            ),
            attempts: 2,
        );
    }
}
