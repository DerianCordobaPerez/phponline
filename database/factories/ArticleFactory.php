<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Article;
use App\Models\Source;
use App\Models\User;
use Domains\Content\Enums\Category;
use Domains\Content\Enums\Level;
use Domains\Content\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

final class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'summary' => $this->faker->text(
                maxNbChars: 160,
            ),
            'content' => $this->faker->paragraphs(
                asText: true,
            ),
            'status' => Arr::random(Status::cases()),
            'level' => Arr::random(Level::cases()),
            'category' => Arr::random(Category::cases()),
            'original' => $original = $this->faker->boolean(),
            'canonical_url' => $original
                ? null : $this->faker->url(),
            'source_id' => Source::factory(),
            'user_id' => User::factory(),
            'published_at' => now(),
        ];
    }
}
