<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Domains\Content\Enums\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Status $resource
 */
final class StatusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->value,
        ];
    }
}
