<?php

declare(strict_types=1);

namespace App\Services\RSS;

use Carbon\CarbonInterface;
use Domains\Content\DataObjects\FeedChannel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

final class Reader
{
    public function fetch(string $url): string
    {
        return (string) file_get_contents(
            filename: $url,
        );
    }

    public function convertToArray(string $xml): array
    {
        $json = json_encode(
            value: simplexml_load_string(
                data: $xml,
                options: LIBXML_NOCDATA,
            ),
        );

        return (array) json_decode(
            json: (string) $json,
            associative: true,
        );
    }

    public function convertJsonToArray(string $json): array
    {
        return (array) json_decode(
            json: $json,
            associative: true,
        );
    }

    public function resolveChannel(array $array): FeedChannel
    {
        return new FeedChannel(
            title: $this->resolveTitle($array['channel']),
            url: $this->resolveUrl($array['channel']),
            description: $this->resolveDescription($array['channel']),
            language: $this->resolveLanguage($array['channel']),
            image: $this->resolveImage($array['channel']),
        );
    }

    public function resolveItems(array $array): Collection
    {
        return new Collection(
            $array['entry']
            ?? $array['entries']
            ?? $array['item']
            ?? $array['items']
            ?? $array['channel']['item']
        );
    }

    public function resolveImage(array $item): null|string
    {
        return $item['image']['link'] ?? null;
    }

    public function resolveLanguage(array $item): string
    {
        return $item['language'] ?? 'en-US';
    }

    public function resolveDescription(array $item): null|string
    {
        return $item['description'] ?? null;
    }

    public function resolveTitle(array $item): string
    {
        $title = $item['title'] ?? null;

        if (! $title) {
            $meta = get_meta_tags($item['id']);

            return $meta['title']
                ?? $meta['twitter:title']
                ?? $meta['og:title']
                ?? $item['id'];
        }

        $title = preg_replace_callback("/(&#[0-9]+;)/", function ($match) {
            return mb_convert_encoding($match[1], "UTF-8", "HTML-ENTITIES");
        }, $title);

        return html_entity_decode($title);
    }

    public function resolveUrl(array $item): string
    {
        $id = $item['id'] ?? null;

        if (filter_var($id, FILTER_VALIDATE_URL)) {
            return $id;
        }

        return $item['link']['@attributes']['href'] ?? $item['link'];
    }

    public function resolveCreated(array $item): null|CarbonInterface
    {
        $updated = $item['published']
            ?? $item['pubDate']
            ?? $item['updated']
            ?? $item['timestamp'];

        return Carbon::make($updated);
    }
}
