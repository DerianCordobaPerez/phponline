<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class,RefreshDatabase::class)->in('Feature');

function createUser(): User|Model
{
    return User::factory()->create();
}
