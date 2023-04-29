<?php

declare(strict_types=1);

use Domains\Content\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sources', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name');
            $table->string('website')->unique();
            $table->string('feed_url')->unique();
            $table->string('status')->default(Status::DRAFT->value);

            $table->json('meta')->nullable();

            $table
                ->foreignUlid('user_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sources');
    }
};
