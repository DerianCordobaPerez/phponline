<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Company;
use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::factory()->create([
            'name' => 'Treblle',
        ]);

        $jobTitle = JobTitle::factory()->create([
            'name' => 'Developer Advocate',
        ]);

        $user = User::factory()->create([
            'name' => 'Steve McDougall',
            'email' => 'juststevemcd@gmail.com',
            'username' => 'JustSteveKing',
            'github' => 'JustSteveKing',
            'twitter' => 'JustSteveKing',
            'company_id' => $company->getKey(),
            'job_title_id' => $jobTitle->getKey(),
        ]);

        Article::factory()->for($user)->count(20)->create();
        Article::factory()->count(30)->create();
    }
}
