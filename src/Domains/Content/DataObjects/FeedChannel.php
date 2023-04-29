<?php

declare(strict_types=1);

namespace Domains\Content\DataObjects;

final class FeedChannel
{
    public function __construct(
        public readonly string $title,
        public readonly string $url,
        public readonly null|string $description,
        public readonly string $language,
        public readonly null|string $image,
    ) {}
}
