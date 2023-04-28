<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('twitter')->unique()->nullable();
            $table->string('github')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->boolean('available')->default(false);

            $table
                ->foreignUlid('job_title_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete();

            $table
                ->foreignUlid('company_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete();

            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
