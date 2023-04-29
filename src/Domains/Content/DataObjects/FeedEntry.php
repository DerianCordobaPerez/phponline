<?php

declare(strict_types=1);

namespace Domains\Content\DataObjects;

use Carbon\CarbonInterface;
use Domains\Content\Enums\Category;
use Domains\Content\Enums\Level;
use Illuminate\Support\Str;

final readonly class FeedEntry
{
    public function __construct(
        public string               $title,
        public string               $description,
        public string               $url,
        public array                $payload,
        public null|CarbonInterface $createdAt,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'summary' => Str::limit(
                value: $this->description,
                limit: 160,
            ),
            'content' => $this->description,
            'level' => Level::EXTERNAL,
            'category' => Category::EXTERNAL,
            'canonical_url' => $this->url,
            'original' => false,
        ];
    }
}
