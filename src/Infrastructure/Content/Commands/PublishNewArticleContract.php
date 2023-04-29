<?php

declare(strict_types=1);

namespace Infrastructure\Content\Commands;

use App\Models\Article;
use Domains\Content\DataObjects\FeedEntry;
use Illuminate\Database\Eloquent\Model;

interface PublishNewArticleContract
{
    public function handle(FeedEntry $entry, string $source, string $user): Model|Article;
}
