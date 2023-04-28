<?php

declare(strict_types=1);

namespace App\Http\Resources\Web;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\DateResource;
use App\Http\Resources\LevelResource;
use App\Http\Resources\StatusResource;
use Carbon\CarbonInterface;
use Domains\Content\Enums\Category;
use Domains\Content\Enums\Level;
use Domains\Content\Enums\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read string $id
 * @property-read string $title
 * @property-read string $slug
 * @property-read string $summary
 * @property-read string $content
 * @property-read Status $status
 * @property-read Level $level
 * @property-read Category $category
 * @property-read string $canonical_url
 * @property-read bool $original
 * @property-read CarbonInterface $published_at
 */
final class ArticleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'content' => $this->content,
            'original' => $this->original,
            'canonical_url' => $this->canonical_url,
            'user' => new UserResource(
                resource: $this->whenLoaded(
                    relationship: 'user',
                ),
            ),
            'status' => new StatusResource(
                resource: $this->status,
            ),
            'level' => new LevelResource(
                resource: $this->level,
            ),
            'category' => new CategoryResource(
                resource: $this->category,
            ),
            'published' => new DateResource(
                resource: $this->published_at,
            )
        ];
    }
}
