<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Domains\Content\Enums\Level;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Level $resource
 */
final class LevelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->value,
            'description' => $this->resource->description(),
        ];
    }
}
