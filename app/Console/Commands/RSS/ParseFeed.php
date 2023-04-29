<?php

declare(strict_types=1);

namespace App\Console\Commands\RSS;

use App\Services\RSS\Reader;
use Domains\Content\DataObjects\FeedEntry;
use Illuminate\Console\Command;

final class ParseFeed extends Command
{
    protected $signature = 'rss:parse { url : The URL for the feed }';

    protected $description = 'Parse an RSS Feed.';

    public function handle(Reader $reader): int
    {
        $url = $this->argument(
            key: 'url',
        );

        $this->components->info(
            string: "Fetching Feed for [$url]",
        );
        $feed = $reader->convertToArray(
            xml: $reader->fetch(
                url: (string) $url,
            ),
        );

        $this->components->info(
            string: 'Parsing Feed ....',
        );

        $channel = $reader->resolveChannel(
            array: $feed,
        );

        $this->components->info(
            string: "Parsed feed, found channel {$channel->title}.",
        );

        $this->components->info(
            string: 'Parsing entries.',
        );

        $items = $reader->resolveItems(
            array: $feed,
        )->map(fn (array $item) => new FeedEntry(
            title: $reader->resolveTitle($item),
            description: $reader->resolveDescription($item),
            url: $reader->resolveUrl($item),
            payload: $item,
            createdAt: $reader->resolveCreated($item),
        ));

        dd($items);

        $this->components->info(
            string: "Found {$items->count()} entries.",
        );

        return Command::SUCCESS;
    }
}
