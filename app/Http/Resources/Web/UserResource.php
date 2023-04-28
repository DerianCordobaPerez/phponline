<?php

declare(strict_types=1);

namespace App\Http\Resources\Web;

use App\Http\Resources\DateResource;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read string $id
 * @property-read string $name
 * @property-read string $email
 * @property-read string $username
 * @property-read string $github
 * @property-read string $twitter
 * @property-read bool $available
 * @property-read string $avatar
 * @property-read CarbonInterface $created_at
 */
final class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'social' => [
                'github' => $this->github,
                'twitter' => $this->twitter,
            ],
            'available' => $this->available,
            'avatar' => $this->avatar,
            'created' => new DateResource(
                resource: $this->created_at,
            ),
            'work' => [
                'jobTitle' => new JobTitleResource(
                    resource: $this->whenLoaded(
                        relationship: 'jobTitle',
                    ),
                ),
                'company' => new CompanyResource(
                    resource: $this->whenLoaded(
                        relationship: 'company',
                    ),
                )
            ],
        ];
    }
}
