<?php

declare(strict_types=1);

namespace App\Http\Payloads\Web\Sources;

use JustSteveKing\BusinessProcess\Contracts\ProcessPayload;
use PHPOnline\Contracts\Http\Payloads\PayloadContract;

final readonly class SourcePayload implements PayloadContract, ProcessPayload
{
    /**
     * @param string $name
     * @param string $website
     * @param string $feedUrl
     */
    public function __construct(
        public string $name,
        public string $website,
        public string $feedUrl,
    ) {}

    /**
     * @return array{name:string,website:string,feed_url:string}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'website' => $this->website,
            'feed_url' => $this->feedUrl,
        ];
    }

    /**
     * @param array{name:string,website:string,feed_url:string} $data
     * @return SourcePayload
     */
    public static function fromArray(array $data): SourcePayload
    {
        return new SourcePayload(
            name: $data['name'],
            website: $data['website'],
            feedUrl: $data['feed_url'],
        );
    }
}
