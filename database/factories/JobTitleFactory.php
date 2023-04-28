<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\JobTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

final class JobTitleFactory extends Factory
{
    protected $model = JobTitle::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
        ];
    }
}
