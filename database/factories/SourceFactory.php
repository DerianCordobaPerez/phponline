<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Source;
use App\Models\User;
use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

final class SourceFactory extends Factory
{
    protected $model = Source::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'website' => $url = $this->faker->url(),
            'feed_url' => "$url/feed.xml",
            'status' => Arr::random(Status::cases()),
            'user_id' => User::factory(),
        ];
    }
}
