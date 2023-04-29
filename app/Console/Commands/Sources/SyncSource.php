<?php

declare(strict_types=1);

namespace App\Console\Commands\Sources;

use App\Models\Source;
use App\Services\RSS\FeedService;
use App\Services\RSS\Reader;
use Domains\Content\DataObjects\FeedEntry;
use Domains\Content\Enums\Status;
use Illuminate\Console\Command;
use Infrastructure\Content\Commands\PublishNewArticleContract;

final class SyncSource extends Command
{
    protected $signature = 'sources:sync';

    protected $description = 'Sync the Source RSS Feed to Articles.';

    public function handle(FeedService $service): int
    {
        $this->components->info(
            string: 'Fetching Sources.',
        );

        /**
         * @var Source $source
         */
        foreach (Source::query()->where('status', Status::ACCEPTED)->get() as $source) {
            $this->components->info(
                string: "Starting to sync source {$source->name}.",
            );

            $service->parseFeed(
                source: $source,
            );
        }

        return Command::SUCCESS;
    }

    private function buildArticlesForSource(Source $source): void
    {
        $reader = new Reader();

    }
}
