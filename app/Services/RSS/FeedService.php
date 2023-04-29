<?php

declare(strict_types=1);

namespace App\Services\RSS;

use App\Models\Source;
use Domains\Content\DataObjects\FeedEntry;
use Infrastructure\Content\Commands\PublishNewArticleContract;

final readonly class FeedService
{
    public function __construct(
        private Reader $reader,
        private PublishNewArticleContract $command,
    ) {}

    public function parseFeed(Source $source): void
    {
        $this->reader->resolveItems(
            array: $this->reader->convertToArray(
                xml: $this->reader->fetch(
                    url: $source->feed_url,
                ),
            ),
        )->map(fn ($item) => $this->command->handle(
            entry: new FeedEntry(
                title: $this->reader->resolveTitle($item),
                description: $this->reader->resolveDescription($item),
                url: $this->reader->resolveUrl($item),
                payload: $item,
                createdAt: $this->reader->resolveCreated($item),
            ),
            source: $source->getKey(),
            user: $source->user_id,
        ));
    }
}
