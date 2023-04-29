<?php

declare(strict_types=1);

namespace Domains\Content\DataObjects;

use Carbon\CarbonInterface;

final class FeedEntry
{
    public function __construct(
        private readonly string $title,
        private readonly string $url,
        private readonly array $payload,
        private readonly null|CarbonInterface $createdAt,
    ) {}
}
